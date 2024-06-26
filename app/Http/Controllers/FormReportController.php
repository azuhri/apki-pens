<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Map;
use App\Models\ReportDoc;
use App\Models\User;
use App\Repositories\ReportRepository\ReportRepositoryInterface;
use App\Services\EmailService\EmailServiceInterface;
use App\Services\FileService\FileServiceInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FormReportController extends Controller
{
    private $fileService, $reportRepo, $email;

    public function __construct(
        FileServiceInterface $fileService,
        ReportRepositoryInterface $reportRepo,
        EmailServiceInterface $email,
    ) {
        $this->fileService = $fileService;
        $this->reportRepo = $reportRepo;
        $this->email = $email;
    }

    public function create()
    {
        return view("pages.form-report.create", [
            "maps" => Map::all(),
            "locations" => Location::orderBy("location_name", "ASC")->get(),
        ]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                "category" => ["required"],
                "title" => ["required", "max:70"],
                "location_id" => ["required", "numeric"],
                "description" => ["required", "min:10"],
            ], [
                "*.required" => "Pastikan data-data terisi dengan baik",
                "title.max" => "Judul laporan terlalu panjang",
                "description.min" => "Keterangan tidak boleh terlalu singkat",
            ]);

            if (!$request->file("doc0") && !$request->file("doc1") && !$request->file("doc2")) {
                throw new Exception("Silahkan upload minimal 1 foto kerusakan");
            }

            DB::beginTransaction();
            $newReport = $this->reportRepo->createOrUpdate([
                "user_id" => Auth::id(),
                "status" => "BARU",
                ...$request->toArray(),
            ]);

            $dataImage = [];

            for ($i = 0; $i < 3; $i++) {
                $file = $request->file("doc".$i);
                if ($file) {
                    $path = $this->fileService->storeFile(
                        $file,
                        "data_file/reports",
                        \str_replace(" ", "-", $request->title),
                    );
                    $newArray["report_id"] = $newReport->id;
                    $newArray["path"] = $path;
                    $dataImage[] = $newArray;
                }
            }

            $saprasAdmins = User::where("type_role", 1)->pluck("email");

            $this->email->sendEmail([
                "subject" => "Laporan Masuk Dari ".Auth::user()->type_user." a.n ".Auth::user()->name." Pada Web APKI PENS",
                "receiver" => [
                    Auth::user()->email,
                    ...$saprasAdmins->toArray()
                ],
                "view" => "email.notif-email-report",
                "withData" => [
                    "reporterName" => Auth::user()->name,   
                    "statusPelapor" => Auth::user()->type_user,   
                    "title" => $newReport->title,   
                    "description" => $newReport->description,   
                ]
            ]);

            ReportDoc::insert($dataImage);
            DB::commit();
            return \response()->json(["status" => true]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return \response()->json(["error" => $th->getMessage()], 400);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Repositories\ReportRepository\ReportRepositoryInterface;
use App\Services\JsonService\JsonServiceInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    private $reportRepo, $json;

    public function __construct(
        ReportRepositoryInterface $reportRepo,
        JsonServiceInterface $json,
    ) {
        $this->reportRepo = $reportRepo;
        $this->json = $json;
    }

    public function index()
    {
        return view("pages.report.index");
    }

    public function getDatalist(Request $request)
    {
        $datas = $this->reportRepo->getAll([
            "user_id" => Auth::id(),
            ...$request->toArray(),
        ]);
        $html = view("pages.report.partials.list", compact("datas"))->render();
        return $this->json->responseData([
            "raw_data" => $datas,
            "html" => $html,
        ]);
    }

    public function detailData($id)
    {
        $data = $this->reportRepo->getDataById($id, ["docs","user","approvedBy", "location"]);
        $html = view("pages.report.partials.detail", compact("data"))->render();
        return $this->json->responseData([
            "raw_data" => $data,
            "html" => $html,
        ]);
    }

    public function indexAdmin()
    {
        return view("pages.report.admin.index", [
            "locations" => Location::orderBy("location_name", "ASC")->get(),
        ]);
    }

    public function getDatalistAdmin(Request $request)
    {
        $datas = $this->reportRepo->getAll($request->toArray());
        $html = view("pages.report.admin.partials.list", compact("datas"))->render();
        return $this->json->responseData([
            "raw_data" => $datas,
            "html" => $html,
        ]);
    }

    public function detailDataAdmin($id)
    {
        $data = $this->reportRepo->getDataById($id, ["docs","user","approvedBy", "location"]);
        $html = view("pages.report.admin.partials.detail", compact("data"))->render();
        return $this->json->responseData([
            "raw_data" => $data,
            "html" => $html,
        ]);
    }

    public function update(Request $request, $id) {
        try {
            if($request->status == "DIPROSES") {
                $request->validate([
                    "estimation_date" => ["required"],
                ], [
                    "estimation_date.required" => "Silahkan isi perkiraan waktu penyelesaian laporan ini",
                ]);
            }

            $findData = $this->reportRepo->getDataById($id);
            if(!$findData) {
                throw new Exception("Report not valid!");
            }

            $additionalParams = [];
            if($request->estimation_date) {
                $additionalParams["estimation_date"] = date("Y-m-d", strtotime($request->estimation_date));
                $dateNow = Carbon::now()->format("Y-m-d");
                $estimationDate = Carbon::parse($additionalParams["estimation_date"]);
                if($dateNow > $estimationDate) {
                    throw new Exception("Estimasi penyelesain tidak boleh hari yang telah berlalu");
                }
            }

            $data = $this->reportRepo->createOrUpdate([
                "status" => $request->status,
                "approved_by" => $request->approved_by,
                ...$additionalParams,
            ], $findData->id);
        return $this->json->responseDataWithMessage($data, "Berhasil submit data");
        } catch (\Throwable $th) {
            return $this->json->responseError($th->getMessage());
        }
    }
}

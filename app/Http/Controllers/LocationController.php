<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Repositories\LocationRepository\LocationRepositoryInterface;
use App\Services\JsonService\JsonServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Throwable;

class LocationController extends Controller
{
    private $locationRepo, $json;

    public function __construct(
        LocationRepositoryInterface $locationRepo,
        JsonServiceInterface $jsonService,
    ) {
        $this->locationRepo = $locationRepo;
        $this->json = $jsonService;
    }

    public function index()
    {
        return view("pages.location.index");
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                "location_name" => ["required", "max:50",
                Rule::unique('locations', 'location_name')->ignore($request->id),
            ],
            ], [
                "location_name.required" => "Silahkan isi nama lokasi dahulu",
                "location_name.max" => "Nama lokasi terlalu panjang",
                "location_name.unique" => "Nama lokasi sudah terbuat sebelumnya",
            ]);

            $data = $this->locationRepo->createOrUpdate([
                "updated_by" => Auth::id(),
                ...$request->toArray(),
            ], $request->id);
            return $this->json->responseDataWithMessage($data, "Berhasil menambahkan denah baru");
        } catch (\Throwable $th) {
            return $this->json->responseError($th->getMessage());
        }
    }

    public function destroy($id) {
    
        try {
            $isDeleted = $this->locationRepo->deleteById($id);

            return $this->json->responseDataWithMessage(["is_deleted" => $isDeleted], "Berhasil menghapus denah!");
        } catch(Throwable $th) {
            return $this->json->responseError($th->getMessage());
        }
    }

    public function getDatalist(Request $request)  {
        $datas = Location::with(["updateBy"])->get();
        $component = view("pages.location.partials.list", \compact("datas"))->render();
        return $this->json->responseData($component);
    }
}

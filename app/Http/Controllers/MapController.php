<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Repositories\MapRepository\MapRepositoryInterface;
use App\Services\FileService\FileServiceInterface;
use App\Services\JsonService\JsonServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;
use Throwable;

class MapController extends Controller
{
    private $mapRepo,
            $fileService,
            $json;

    public function __construct(
        MapRepositoryInterface $mapRepo,
        FileServiceInterface $fileService,
        JsonServiceInterface $json,
    )
    {
        $this->mapRepo = $mapRepo;
        $this->fileService = $fileService;
        $this->json = $json;
    }

    public function index() {
        return view("pages.map.index", [
            "maps" => Map::all(),
        ]);
    }

    public function store(Request $request) {
        try {
            $mustUnique = $request->map_id ? "": "unique:maps,name";
            $request->validate([
                "name" => ["required", "max:50", $mustUnique],
                "map" => ["required_without:map_id"], 
            ], [
                "name.required" => "Silahkan isi nama denah dahulu",
                "map.required_without" => "Silahkan upload gambar denah dahulu",
                "map.unique" => "Nama denah sudah dibuat sebelumnya",
            ]);

            $params = [
                "updated_by" => Auth::id(),
                ...$request->toArray(),
            ];

            if($request->file("map")) {
                $path = $this->fileService->storeFile(
                    $request->file("map"),
                    "data_file/maps",
                    \str_replace(" ","-",$request->name),
                );
                $params["path"] = $path;
            }


            $map = $this->mapRepo->createOrUpdate($params, $request->map_id);


            return $this->json->responseDataWithMessage($map, "Berhasil menambahkan denah baru");
        } catch (\Throwable $th) {
            return $this->json->responseError($th->getMessage());
        }
    }

    public function destroy($id) {
    
        try {
            $isDeleted = $this->mapRepo->deleteDenahById($id);

            return $this->json->responseDataWithMessage($isDeleted, "Berhasil menghapus denah!");
        } catch(Throwable $th) {
            return $this->json->responseError($th->getMessage());
        }
    }

    public function getDatalist(Request $request)  {
        $datas = Map::with(["updateBy"])->get();
        $component = view("pages.map.partials.list", \compact("datas"))->render();
        return $this->json->responseData($component);
    }
}

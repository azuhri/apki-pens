<?php

namespace App\Repositories\MapRepository;

use App\Models\Map;
use App\Services\FileService\FileServiceInterface;

class MapRepository implements MapRepositoryInterface {
    private $fileService;

    public function __construct(
        FileServiceInterface $fileService,
    )
    {
        $this->fileService = $fileService;
    }

    public function createOrUpdate($request, $id = 0) {
        if($id) {
            $findMap = Map::find($id);
            if($findMap && $request["map"]) {
                $this->fileService->destroyFile($findMap->path);
            } 

            if($request["map"]) {
                $request["map"] = $findMap->path;
            }
        }

        return Map::updateOrCreate(
            ["id" => $id],
            $request,
        );
    }

    public function deleteDenahById($id) {
        $findData = Map::find($id);
        if($findData) {
            $this->fileService->destroyFile($findData->path);
            $findData->delete();
            return true;
        }
        return false;
    }
}
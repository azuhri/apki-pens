<?php

namespace App\Repositories\LocationRepository;

use App\Models\Location;
use App\Models\Map;

class LocationRepository implements LocationRepositoryInterface {

    public function createOrUpdate($request, $id = 0) {
        return Location::updateOrCreate(
            ["id" => $id],
            $request,
        );
    }

    public function deleteById($id) {
        $findData = Location::find($id);
        if($findData) {
            $findData->delete();
        }
        return false;
    }
    
}
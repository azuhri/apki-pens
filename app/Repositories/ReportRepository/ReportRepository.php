<?php

namespace App\Repositories\ReportRepository;

use App\Models\Report;

class ReportRepository implements ReportRepositoryInterface {

    public function getAll($filters = []) {
        $query = Report::with(["docs", "location", "user", "approvedBy"]);

        if(!empty($filters["user_id"])) {
            $query->where("user_id", $filters["user_id"]);
        }

        if(!empty($filters["type_user"])) {
            $query->whereHas("user", function ($q) use ($filters) {
               $q->where("type_user", $filters["type_user"]);
            });
        }

        if(!empty($filters["location_id"])) {
            $query->where("location_id", $filters["location_id"]);
        }

        if(!empty($filters["status"])) {
            $query->where("status", $filters["status"]);
        }

        if(!empty($filters["approved_by"])) {
            $query->where("approved_by", $filters["approved_by"]);
        }

        if(!empty($filters["search"])) {
            $query->where("title",'like', "%".$filters["search"]."%");
        }

        if(!empty($filters["order_by"]) && !empty($filters["sort_by"])) {
            $query->orderBy($filters["order_by"], $filters["sort_by"]);
        } else {
            $query->orderBy("created_at", "DESC");
        }

        return $query->get()->map(function($data) {
            $mappingData = clone $data;
            $mappingData = $mappingData->toArray();
            $mappingData["created_at"] = date("d F Y H:i", strtotime($data->created_at));
            $mappingData["updated_at"] = date("d F Y H:i", strtotime($data->updated_at));
            return $mappingData;
        });
    }

    public function createOrUpdate($request, $id = 0) {
        return Report::updateOrCreate(
            ["id" => $id],
            $request,
        );
    }

    public function deleteById($id) {
        $findData = $this->getDataById($id);
        if($findData) {
            $findData->delete();
        }
        return false;
    }
    
    public function getDataById($id, $relations = []) {
        return Report::with($relations)->find($id);
    }
}
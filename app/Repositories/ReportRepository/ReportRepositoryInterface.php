<?php

namespace App\Repositories\ReportRepository;

interface ReportRepositoryInterface {
    public function getAll($filters = []);
    public function createOrUpdate($request, $id = 0);
    public function deleteById($id);
    public function getDataById($id, $relations = []);
}
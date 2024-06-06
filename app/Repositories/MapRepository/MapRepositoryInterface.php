<?php

namespace App\Repositories\MapRepository;

interface MapRepositoryInterface {
    public function createOrUpdate($request, $id = 0);
    public function deleteDenahById($id);
}
<?php

namespace App\Repositories\LocationRepository;

interface LocationRepositoryInterface {
    public function createOrUpdate($request, $id = 0);
    public function deleteById($id);
}
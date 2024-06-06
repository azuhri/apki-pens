<?php 

namespace App\Services\FileService; 

interface FileServiceInterface {
    public function storeFile($requestFile, $path, $fileName);
    public function destroyFile($path);
}
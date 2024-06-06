<?php


namespace App\Services\FileService;;

use Exception;

class FileService implements FileServiceInterface
{
    public function storeFile($requestFile, $path, $fileName)
    {   
        $fileName = \date("YmdHis") . "-" . $fileName.".{$requestFile->extension()}";
        $newPath = $path."/".$fileName;
        $requestFile->move($path, $fileName);
        return $newPath;
    }
    public function destroyFile($path)
    {
        if (\file_exists(public_path($path))) {
            \unlink($path);
            return true;
        }
        \false;
    }
}

<?php

namespace App\Services\JsonService;

interface JsonServiceInterface
{
    public function responseError($errors);
    public function responseData($data);
    public function responseDataWithMessage($data, $message);
}

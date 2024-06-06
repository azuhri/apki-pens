<?php

namespace App\Services\LoginService;

interface LoginServiceInterface {
    public function loginByEmail($email, $password);
    public function loginByPhonenumber($phonenumber, $password);
}
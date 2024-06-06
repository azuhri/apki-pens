<?php

namespace App\Services\LoginService;

use App\Repositories\iUserRepository\iUserRepository;
use App\Repositories\UserRepository\UserRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginService implements LoginServiceInterface
{
    private $userRepo;

    public function __construct(
        UserRepositoryInterface $userRepo,
    ) {
        $this->userRepo = $userRepo;
    }

    public function loginByEmail($email, $password)
    {
        $findUserByEmail = $this->userRepo->getUserByEmail($email);
        if (!$findUserByEmail) {
            throw new Exception("Email atau password salah..");
        }
        
        if (!Hash::check($password, $findUserByEmail->password)) {
            throw new Exception("Email atau password salah..");
        }

        return Auth::loginUsingId($findUserByEmail->id, true);
    }

    public function loginByPhonenumber($phonenumber, $password)
    {
        $findUserByPhonenumber = $this->userRepo->getUserByPhonenumber($phonenumber);
        if (!$findUserByPhonenumber) {
            throw new Exception("Nomoh HP atau password salah..");
        }

        if (!Hash::check($password, $findUserByPhonenumber->password)) {
            throw new Exception("Nomoh HP atau password salah..");
        }

        return Auth::loginUsingId($findUserByPhonenumber->id, true);
    }
}

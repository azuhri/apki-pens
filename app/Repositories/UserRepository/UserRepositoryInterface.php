<?php

namespace App\Repositories\UserRepository;

use Illuminate\Http\Request;
use App\Models\User;

interface UserRepositoryInterface
{
    public function createUser(Request $request);
    public function getUserById($userId);
    public function getUserLogin();
    public function getUserByPhonenumber($phonenumber);
    public function getUserByEmail($email);
    public function getAllUser();
    public function updateUser(Request $request, $userId);
    public function isExistPhonenumber($userId, $phonenumber);
    public function isExistEmail($userId, $email);
    public function isPhonenumberlAvailable($phonenumber);
    public function isEmailAvailable($email);
    public function deleteById($id);

}

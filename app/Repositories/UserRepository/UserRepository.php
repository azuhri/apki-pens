<?php

namespace App\Repositories\UserRepository;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface {

    public function createUser(Request $request)
    {
        return User::create([
            "name" => $request->name,
            "type_role" => $request->type_role,
            "type_user" => $request->type_user,
            "email" => $request->email, 
            "phonenumber" => $request->phonenumber,
            "password" => $request->password,
        ]);   
    }

    public function getUserById($userId)
    {
        return User::find($userId);   
    }

    public function getUserLogin()
    {
        return Auth::user();
    }

    public function getUserByPhonenumber($phonenumber)
    {
        return User::where("phonenumber", $phonenumber)->first();
    }

    public function getUserByEmail($email) {
        return User::where("email", $email)->first();
    }


    public function getAllUser()
    {
        return User::all(); 
    }

    public function updateUser(Request $request, $userId)
    {
        $user = User::find($userId);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phonenumber = $request->phonenumber;
        $user->save();
        return $user;   
    }

    public function isExistPhonenumber($userId, $phonenumber)
    {
        return User::where("id","!=", $userId)->where("phonenumber", $phonenumber)->first();
    }

    public function isExistEmail($userId, $email)
    {
        return User::where("id","!=", $userId)->where("email", $email)->first();
    }

    public function isPhonenumberlAvailable($phonenumber)
    {
        return User::where("phonenumber", $phonenumber)->first();
    }

    public function isEmailAvailable($email)
    {
        return User::where("email", $email)->first();
    }

    public function deleteById($id) {
        $findData = User::find($id);
        if($findData) {
            $findData->delete();
            return true;
        }

        return \false;
    }
}

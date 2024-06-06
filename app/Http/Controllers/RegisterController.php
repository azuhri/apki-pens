<?php

namespace App\Http\Controllers;

// use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Repositories\UserRepository\UserRepositoryInterface;
use Exception;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    private $userRepo;

    public function __construct(
        UserRepositoryInterface $userRepo,
    )
    {
        $this->userRepo = $userRepo;    
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|max:255|min:2',
                'type_user' => 'required|max:255|min:2',
                'email' => 'required|email|max:255|unique:users,email',
                'phonenumber' => 'required|min:2|numeric|unique:users,phonenumber',
                'password' => 'required|min:5|max:255',
                'confirm_password' => 'required|min:5|max:255',
            ],[
                "name.required" => "Maaf Anda harus memasukan nama",
                "email.required" => "Maaf Anda harus memasukan email",
                "email.unique" => "Maaf email Anda telah digunakan",
                "phonenumber.unique" => "Maaf No WA Anda telah digunakan",
                "password.required" => "Maaf Anda harus memasukan password",
                "confirm_password.required" => "Maaf Anda harus memasukan konfirmasi password",
                "phonenumber.required" => "Maaf Anda harus memasukan No WA",
                "phonenumber.numeric" => "Maaf No WA Anda tidak valid",
                "type_user.required" => "Maaf Anda harus memilih status Anda",
            ]);

            if($request->password != $request->confirm_password) {
                throw new Exception("Konfirmasi password tidak sesuai!");
            }
            $request->type_role = 0;
            $user = $this->userRepo->createUser($request);
            auth()->login($user);
            return redirect('/dashboard');
        } catch (\Throwable $th) {
            return back()->with("error",$th->getMessage())->withInput();
        }
    }
}

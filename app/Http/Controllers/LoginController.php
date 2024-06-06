<?php

namespace App\Http\Controllers;

use App\Services\LoginService\LoginServiceInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private $loginService;
    public function __construct(
        LoginServiceInterface $loginService
    )
    {
        $this->loginService = $loginService;
    }
    /**
     * Display login page.
     *
     * @return Renderable
     */
    public function show()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'user_identity' => ['required'],
                'password' => ['required'],
            ], [
                "user_identity.required" => "Masukan email atau No HP Anda",
                "password.required" => "Masukan password Anda",
            ]);
    
            if(is_numeric($request->user_identity) == true) {
                $auth = $this->loginService->loginByPhonenumber($request->user_identity, $request->password);
            } else {
                $auth = $this->loginService->loginByEmail($request->user_identity, $request->password);
            }
            
            if($auth) {
                return \redirect()->to("dashboard");
            }
            
            throw new Exception("Email atau password salah");
        } catch (\Throwable $th) {
            return back()->with("error", str_replace("(and 1 more error)", "",$th->getMessage()));
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepository\UserRepository;
use App\Services\JsonService\JsonServiceInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Throwable;

class AdminManagementController extends Controller
{
    private $userRepo, $json;

    public function __construct(
        UserRepository $userRepo,
        JsonServiceInterface $jsonService,
    ) {
        $this->userRepo = $userRepo;
        $this->json = $jsonService;
    }

    public function index()
    {
        return view("pages.admin-management.index");
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                "name" => ["required", "max:50", Rule::unique('users', 'email')->ignore($request->id)],
                "email" => ["required", "max:50"],
                "phonenumber" => ["required", "max:15"],
                "password" => ["required", "max:15"],
                "confirm_password" => ["required", "max:15"],
            ], []);

            if($request->password != $request->confirm_password) {
                throw new Exception("Konfirmasi password tidak cocok!");
            }

            $request->type_role = 1;
            $request->type_user = "SAPRAS";
            $data = $this->userRepo->createUser($request);

            // $data = $this->userRepo->createOrUpdate([
            //     "updated_by" => Auth::id(),
            //     ...$request->toArray(),
            // ], $request->id);
            return $this->json->responseDataWithMessage($data, "Berhasil menambahkan denah baru");
        } catch (\Throwable $th) {
            return $this->json->responseError($th->getMessage());
        }
    }

    public function destroy($id) {
    
        try {
            $isDeleted = $this->userRepo->deleteById($id);

            return $this->json->responseDataWithMessage(["is_deleted" => $isDeleted], "Berhasil menghapus denah!");
        } catch(Throwable $th) {
            return $this->json->responseError($th->getMessage());
        }
    }

    public function getDatalist(Request $request)  {
        $datas = User::where("type_role", 1)->where("id", "!=", Auth::id())->orderBy("name","ASC")->get();
        $component = view("pages.admin-management.partials.list", \compact("datas"))->render();
        return $this->json->responseData($component);
    }
}

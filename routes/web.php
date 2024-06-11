<?php

use App\Http\Controllers\AdminManagementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\FormReportController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
	return redirect('/dashboard');
})->middleware('auth');
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');

Route::group(['middleware' => 'auth'], function () {
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
	
	Route::get("dashboard", [PageController::class, "dashboard"])->name("home");

	Route::prefix("user")
		// ->middleware("admin.check")
		->name("user.")
		->group(function () {
			Route::prefix("form-report")
				->controller(FormReportController::class)
				->name("form-report.")
				->group(function () {
					Route::get("/create", "create")->name("create");
					Route::post("store", "store")->name("store");
				});

			Route::prefix("my-report")
				->controller(ReportController::class)
				->name("my-report.")
				->group(function () {
					Route::get("/", "index")->name("index");
					Route::get("/datalist", "getDatalist")->name("list");
					Route::get("detail/{id}", "detailData")->name("detail");
				});
		});

	Route::prefix("admin")
		->middleware("admin.check")
		->name("admin.")
		->group(function () {
			Route::prefix("map")
				->controller(MapController::class)
				->name("map.")
				->group(function () {
					Route::get("/", "index")->name("index");
					Route::get("/datalist", "getDatalist")->name("list");
					Route::post("store", "store")->name("store");
					Route::delete("destroy/{id}", "destroy")->name("destroy");
				});

			Route::prefix("location")
				->controller(LocationController::class)
				->name("location.")
				->group(function () {
					Route::get("/", "index")->name("index");
					Route::get("/datalist", "getDatalist")->name("list");
					Route::post("store", "store")->name("store");
					Route::delete("destroy/{id}", "destroy")->name("destroy");
				});

			Route::prefix("management")
				->controller(AdminManagementController::class)
				->name("management.")
				->group(function () {
					Route::get("/", "index")->name("index");
					Route::get("/datalist", "getDatalist")->name("list");
					Route::post("store", "store")->name("store");
					Route::post("update", "update")->name("update");
					Route::delete("destroy/{id}", "destroy")->name("destroy");
				});

			Route::prefix("reports")
				->controller(ReportController::class)
				->name("report.")
				->group(function () {
					Route::get("/", "indexAdmin")->name("index");
					Route::get("/datalist", "getDatalistAdmin")->name("list");
					Route::post("/update/{id}", "update")->name("update");
					Route::get("detail/{id}", "detailDataAdmin")->name("detail");
				});
		});
});

<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Map;
use App\Models\Report;
use App\Models\User;
use App\Repositories\ReportRepository\ReportRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    private $reportRepo;
    public function __construct(
        ReportRepositoryInterface $reportRepo,
    )
    {
        $this->reportRepo = $reportRepo;
    }
    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(string $page)
    {
        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}");
        }

        return abort(404);
    }

    public function dashboard()
    {   
        if(Auth::user()->type_role) {
            $params = [
                "maps" => Map::all(),
                "reports" => $this->reportRepo->getAll([
                    "status" => "BARU",
                ]),
                "reporter" => Report::selectRaw('DISTINCT user_id')->get(),
                "finishedReport" => $this->reportRepo->getAll([
                    "status" => "SELESAI",
                ]),
                "locations" => Location::with("newReports")->orderBy("location_name", "ASC")->get(),
            ];
        } else {
            $params  = [
                "myReport" => count($this->reportRepo->getAll()),
                "myFinishedReport" => count($this->reportRepo->getAll([
                    "status" => "SELESAI",
                ])),
                "myApprovedReport" => count($this->reportRepo->getAll([
                    "status" => "DIPROSES",
                ])),
            ];
        }
        return view('pages.dashboard', $params);
    }

    public function vr()
    {
        return view("pages.virtual-reality");
    }

    public function rtl()
    {
        return view("pages.rtl");
    }

    public function profile()
    {
        return view("pages.profile-static");
    }

    public function signin()
    {
        return view("pages.sign-in-static");
    }

    public function signup()
    {
        return view("pages.sign-up-static");
    }
}

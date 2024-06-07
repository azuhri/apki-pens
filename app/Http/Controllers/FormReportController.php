<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Map;
use Illuminate\Http\Request;

class FormReportController extends Controller
{
    public function create() {
        return view("pages.form-report.create", [
            "maps" => Map::all(),
            "locations" => Location::orderBy("location_name", "ASC")->get(),
        ]);
    }

    public function index() {
        return view("pages.form-report.index");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Report;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\Truck;
use Illuminate\Http\Request;


class LevelController extends Controller
{
    public function level2()
    {
        $reports = Report::all();
        return view('level2', compact('reports'));
    }

    public function level3()
    {
        $customers = Customer::all();

        $weekDays = ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];

        return view('level3', compact(['customers',"weekDays"]));
    }




}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TravelPackage;
use App\Transaction;

class DashboardController extends Controller
{
    public function index(Request $request){
        return view("pages.admin.dashboard",[
            "travel_package" => TravelPackage::count(),
            "transaction" => Transaction::count(),
            "pending" => Transaction::where("transactional_status","PENDING")->count(),
            "sukses" => Transaction::where("transactional_status","SUCCESS")->count()
        ]);
    }
}

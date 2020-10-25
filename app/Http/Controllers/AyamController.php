<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illumontae\Support\Facades\Auth;

use App\Transaction;
use App\TransactionDetail;
use App\TravelPackage;
use Carbon\Carbon; #buat format tanggal

class AyamController extends Controller
{
    public function index(Request $request, $id){

        //$item = Transaction::with(["details", "user", "travel_package"])->findOrFail($id);

        return view("pages.ayam");
    }

    public function process(Request $request, $id){

        $travel_package = TravelPackage::findOrFail($id);

        $transaction = Transaction::create([
            "travel_packages_id" => $id,
            "users_id" => Auth::user()->id,
            "additional_visa" => 0,
            "transaction_total" => $travel_package->price, 
            "transaction_status" => "IN_CART"
        ]);

        $transaction_detail = TransactionDetail::create([
            "transaction_id" => $transaction->id,
            "username" => Auth::user()->username,
            "nationality" => "ID",
            "is_visa" => false,
            "doe_passpord" => Carbon::now()->addYears(5)
        ]);

        return redirect()->route("ayam", $transaction->id);
    
    }

    public function create(Request $request, $id){
        $request->validate([
            "username" => "required|string|exists:users,username",
            "is_visa" => "required|boolean",
            "doe_passpord" => "required"
        ]);

        $data = $request->all();
        $data["transaction_id"] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(["travel_package", "user", "details"])->find($id);

        if ($request->is_visa){
            $transaction->transaction_total += 190;
            $transaction->additional_visa += 190;
        }

        $transaction->transaction_total += $transaction->travel_package->price;

        $transaction->save();

        return redirect()->route("ayam", $id);
    }

    public function remove(Request $request, $detail_id){
        
        $item = TransactionDetail::findOrFail($detail_id);

        $transaction = Transaction::with(["travel_package", "details"])
            ->findOrFail($item->transaction_id);

        if ($request->is_visa){
            $transaction->transaction_total -= 190;
            $transaction->additional_visa -= 190;
        }

        $transaction->transaction_total -= $transaction->travel_package->price;

        $transaction->save();
        $item->delete();

        return redirect()->route("ayam", $item->transaction_id);

    }

    
    public function success(Request $request, $id){

        $transaction = Transaction::findOrFail($id);
        $transaction->transaction_status = "SUCESS";

        $transaction->save();

        return view("pages.succes");
    
    }


}

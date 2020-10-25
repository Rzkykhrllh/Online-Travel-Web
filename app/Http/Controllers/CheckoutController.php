<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; #libary buat auth

use App\Transaction;
use App\TransactionDetail;
use App\TravelPackage;
use Carbon\Carbon; #buat format tanggal

class CheckoutController extends Controller
{
    public function index(Request $request, $id){

        $item = Transaction::with(["details", "user", "travel_package"])->findOrFail($id);

        return view("pages.checkout",[
            "item" => $item
        ]);
    }

    public function process(Request $request, $id){

        $travel_package = TravelPackage::findOrFail($id);

        $transaction = Transaction::create([
            "travel_packages_id" => $id,
            "users_id" => Auth::user()->id,
            "additional_visa" => 0,
            "transactional_total" => $travel_package->price, 
            "transactional_status" => "IN_CART"
        ]);

        $transaction_detail = TransactionDetail::create([
            "transaction_id" => $transaction->id,
            "username" => Auth::user()->username,
            "nationality" => "ID",
            "is_visa" => false,
            "doe_passport" => Carbon::now()->addYears(5)
        ]);

        return redirect()->route("checkout", $transaction->id);
    
    }

    public function create(Request $request, $id){
        $request->validate([
            "username" => "required|string|exists:users,username",
            "is_visa" => "required|boolean",
            "doe_passport" => ""
        ]);

        $data = $request->all();
        $data["transaction_id"] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(["travel_package", "user", "details"])->find($id);

        if ($request->is_visa){
            $transaction->transactional_total += 190;
            $transaction->additional_visa += 190;
        }

        $transaction->transactional_total += $transaction->travel_package->price;

        $transaction->save();

        return redirect()->route("checkout", $id);
    }

    public function remove(Request $request, $detail_id){
        
        $item = TransactionDetail::findOrFail($detail_id);

        $transaction = Transaction::with(["travel_package", "details"])
            ->findOrFail($item->transaction_id);

        if ($request->is_visa){
            $transaction->transactional_total -= 190;
            $transaction->additional_visa -= 190;
        }

        $transaction->transactional_total -= $transaction->travel_package->price;

        $transaction->save();
        $item->delete();

        return redirect()->route("checkout", $transaction->id);

    }

    
    public function success(Request $request, $id){

        $transaction = Transaction::findOrFail($id);
        $transaction->transactional_status = "PENDING";

        $transaction->save();

        return view("pages.success");
    
    }


}

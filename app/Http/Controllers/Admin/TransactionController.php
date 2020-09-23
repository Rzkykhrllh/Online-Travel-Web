<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionRequest; //import requestnya travelpackage;
use Illuminate\Http\Request;
use App\Transaction; //import travelpackage
use Illuminate\Support\Str; //make stringnya larvel

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dalam array with adalah nama method relasi, methodnya ada di model transaction
        $items = Transaction::with([
            "details","travel_package","user"
        ])->get();


        //mengembalikan view index yang berada di folder travvel-package dan variabel items yg berisi nilai dari $items
        return view("pages.admin.transaction.index", [
            "items" => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //parameternya bukan tipe data reqeust tapi travelpackage yg kita import
    public function store(TransactionRequest $request)
    {
        $data = $request->all();
        $data["slug"] = Str::slug($request->title);

        Transaction::create($data);
        return redirect()->route("transaction.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item  = Transaction::with([
            "details","travel_package","user"    
        ])->findorFail($id);
        
        return view("pages.admin.transaction.detail",[
            "item" => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item  = Transaction::findorFail($id);
        return view("pages.admin.transaction.edit",[
            "item" => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $data = $request->all();

        $item = Transaction::findorFail($id);
        
        $item->transactional_status= $request->transactional_status;
        $item->save();
        // $item->update($data);

        return redirect()->route("transaction.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Transaction::findorFail($id);
        $item->delete();

        return redirect()->route("transaction.index");
    }
}

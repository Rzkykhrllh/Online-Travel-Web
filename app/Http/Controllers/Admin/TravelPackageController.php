<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TravelPackageRequest; //import requestnya travelpackage;
use Illuminate\Http\Request;
use App\TravelPackage; //import travelpackage
use Illuminate\Support\Str; //make stringnya larvel

class TravelPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TravelPackage::all(); //ambil semua data TravelPackage


        //mengembalikan view index yang berada di folder travvel-package dan variabel items yg berisi nilai dari $items
        return view("pages.admin.travel-package.index", [
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
        return view("pages.admin.travel-package.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //parameternya bukan tipe data reqeust tapi travelpackage yg kita import
    public function store(TravelPackageRequest $request)
    {
        $data = $request->all();
        $data["slug"] = Str::slug($request->title);

        TravelPackage::create($data);
        return redirect()->route("travel-package.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item  = TravelPackage::findorFail($id);
        return view("pages.admin.travel-package.edit",[
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
        $data = $request->all();
        $data["slug"] = Str::slug($request->title);

        $item = TravelPackage::findorFail($id);
        $item->update($data);

        return redirect()->route("travel-package.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

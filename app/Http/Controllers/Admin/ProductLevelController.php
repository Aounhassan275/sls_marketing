<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductLevel;
use Illuminate\Http\Request;

class ProductLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        ProductLevel::create($request->all());
        toastr()->success('Product Level Created Successfully!.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductLevel  $productLevel
     * @return \Illuminate\Http\Response
     */
    public function show(ProductLevel $productLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductLevel  $productLevel
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductLevel $productLevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductLevel  $productLevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $productLevel = ProductLevel::find($id);
        $productLevel->update($request->all());
        toastr()->success('Product Level Informations Updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductLevel  $productLevel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productLevel = ProductLevel::find($id);
        $productLevel->delete();
        toastr()->success('Product Level Deleted Successfully');
        return redirect()->back();
    }
}

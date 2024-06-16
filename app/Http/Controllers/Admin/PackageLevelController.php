<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PackageLevel;
use Illuminate\Http\Request;

class PackageLevelController extends Controller
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
        PackageLevel::create($request->all());
        toastr()->success('Package Level Created Successfully!.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PackageLevel  $packageLevel
     * @return \Illuminate\Http\Response
     */
    public function show(PackageLevel $packageLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PackageLevel  $packageLevel
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageLevel $packageLevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PackageLevel  $packageLevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $packageLevel = PackageLevel::find($id);
        $packageLevel->update($request->all());
        toastr()->success('Package Level Informations Updated successfully');
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PackageLevel  $packageLevel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $packageLevel = PackageLevel::find($id);
        $packageLevel->delete();
        toastr()->success('Package Level Deleted Successfully');
        return redirect()->back();
    }
}

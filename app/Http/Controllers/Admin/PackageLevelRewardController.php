<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PackageLevelReward;
use Illuminate\Http\Request;

class PackageLevelRewardController extends Controller
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
        PackageLevelReward::create($request->all());
        toastr()->success('Package Level Reward Created Successfully!.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PackageLevelReward  $packageLevelReward
     * @return \Illuminate\Http\Response
     */
    public function show(PackageLevelReward $packageLevelReward)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PackageLevelReward  $packageLevelReward
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageLevelReward $packageLevelReward)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PackageLevelReward  $packageLevelReward
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $reward = PackageLevelReward::find($id);
        $reward->update($request->all());
        toastr()->success('Package Level Reward Informations Updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PackageLevelReward  $packageLevelReward
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reward = PackageLevelReward::find($id);
        $reward->delete();
        toastr()->success('Package Level Reward Deleted Successfully');
        return redirect()->back();
    }
}

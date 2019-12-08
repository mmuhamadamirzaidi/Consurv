<?php

namespace App\Http\Controllers;

use App\Http\Requests\RigStore;
use App\Rig;
use Illuminate\Http\Request;

class RigController extends Controller
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
    public function store(RigStore $request)
    {
        Rig::create([
            'company_id' => $request->company_id,
            'name' => $request->name,
        ]);

        return redirect()->route('company.show', $request->company_id)->withSuccess('Rig has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rig  $rig
     * @return \Illuminate\Http\Response
     */
    public function show(Rig $rig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rig  $rig
     * @return \Illuminate\Http\Response
     */
    public function edit(Rig $rig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rig  $rig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rig $rig)
    {
        $rig->update([
            'name' => $request->name,
        ]);

        return redirect()->route('company.show', $rig->company)->withSuccess('Rig name has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rig  $rig
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rig $rig)
    {
        $rig->delete();

        return redirect()->back()->withSuccess('Rig has been deleted.');
    }

    public function rigsByCompany(Request $request)
    {
        $rigs = Rig::where('company_id', $request->company_id)->get();

        return response()->json([
            'rigs' => $rigs,
            'company_id' => $request->company_id,
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\HealthInformation;
use Illuminate\Http\Request;

class HealthInformationController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HealthInformation  $healthInformation
     * @return \Illuminate\Http\Response
     */
    public function show(HealthInformation $healthInformation)
    {
        return view('health-information.show')->with(compact('healthInformation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HealthInformation  $healthInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(HealthInformation $healthInformation)
    {
        return view('health-information.edit')->with(compact('healthInformation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HealthInformation  $healthInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HealthInformation $healthInformation)
    {
        $healthInformation->update([
            'weight' => $request->weight,
            'height' => $request->height,
            'hdlc' => $request->hdlc,
            'blood_pressure' => $request->blood_pressure,
            'treatment' => $request->treatment,
            'total_cholesterol' => $request->total_cholesterol,
            'diabetes' => $request->diabetes,
            'smoker' => $request->smoker,
            'family_history' => $request->family_history,
            'medical_history' => $request->medical_history,
        ]);

        return redirect()->route('user.show', $healthInformation->patient)->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HealthInformation  $healthInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(HealthInformation $healthInformation)
    {
        $healthInformation->delete();

        return redirect()->back()->withSuccess('History has been deleted.');
    }
}

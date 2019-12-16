<?php

namespace App\Http\Controllers;

use App\HealthInformation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (auth()->user()->is_patient) {
            return view('dashboard.patient');
        } else {
            $totalLow = HealthInformation::where('risk_level', 1)->count();
            $totalIntermediate = HealthInformation::where('risk_level', 2)->count();
            $totalHigh = HealthInformation::where('risk_level', 3)->count();
            return view('dashboard')->with(compact([
                'totalLow', 'totalIntermediate', 'totalHigh',
            ]));
        }
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function riskLevel(Request $request)
    {
        return view('statistic.risk-level');
    }
}

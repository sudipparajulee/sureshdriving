<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalvisits = Visit::sum('no_of_visits');
        $date = \Carbon\Carbon::today()->subDays(30);
        $visitdate = Visit::where('visit_date','>=',$date)->pluck('visit_date');
        $visits = Visit::where('visit_date','>=',$date)->pluck('no_of_visits');
        return view('dashboard',compact('totalvisits','visitdate','visits'));
    }
}

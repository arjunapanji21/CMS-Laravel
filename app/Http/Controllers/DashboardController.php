<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;

class DashboardController extends Controller
{
    public function dashboard(){
        //fetch the most visited pages for today and the past week
        Analytics::fetchMostVisitedPages(Period::days(7));
        Analytics::fetchVisitorsAndPageViews(Period::days(7));
        
        return view('admin.dashboard', [
            'pageTitle' => 'Dashboard',
        ]);
    }
}

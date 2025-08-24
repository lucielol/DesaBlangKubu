<?php

namespace App\Http\Controllers;

use App\Models\Complaint; 
use \App\Models\Resident;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalResidents = Resident::count();
        $totalComplains = Complaint::count();

        return view('pages.dashboard.index', compact('totalResidents', 'totalComplains'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Placeholder stats
        $stats = [
            'total_employees' => \App\Models\User::count(),
        ];
        
        return view('dashboard', compact('stats'));
    }
}

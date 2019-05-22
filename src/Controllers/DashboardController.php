<?php

namespace RB28DETT\Dashboard\Controllers;

use App\Http\Controllers\Controller;
use RB28DETT\Dashboard\Widgets;

class DashboardController extends Controller
{
    public function index()
    {
        $widgets = Widgets::get();

        return view('rb28dett_dashboard::dashboard', ['widgets' => $widgets]);
    }
}

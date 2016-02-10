<?php namespace App\Http\Controllers\Ragnarok;

use App\Http\Controllers\Controller;
use App\Ragnarok\SecApps\SecApp;

class DashboardController extends Controller
{
    public function getIndex()
    {
        $data = SecApp::wherestatus(1)->get();
        return  view('ragnarok.dashboard.dashboard', compact('data'));
    }
}
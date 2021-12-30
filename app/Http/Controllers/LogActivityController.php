<?php

namespace App\Http\Controllers;

use App\Traits\ActivityLog;

class LogActivityController extends Controller
{
    public function index()
    {
        $logs = ActivityLog::logActivityLists();
        return view('logActivity',compact('logs'));
    }

    public function myTestAddToLog()
    {
        ActivityLog::successLog('Log Added');
        dd('Log Added');
    }
}

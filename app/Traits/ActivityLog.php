<?php

namespace App\Traits;

use App\Models\LogActivity;
use Request;

class ActivityLog
{
    public static function addLog($type, $subject)
    {

        $log = [];
        $log['subject'] = $subject;
        $log['url'] = Request::fullUrl();
        $log['method'] = Request::method();
        $log['ip'] = Request::ip();
        $log['agent'] = Request::header('user-agent');;
        $log['user_id'] = auth()->check() ? auth()->id() : null;
        LogActivity::create($log);
    }

    public static function successLog($message)
    {
        $type = 1;
        $subject = $message;
        self::addLog($type, $subject);
    }

    public static function logActivityLists()
    {
        return LogActivity::latest()->get();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

class LogController extends Controller
{
    public function showLogs()
    {
        // Read the log file
        $logFile = storage_path('logs/laravel.log');
        $logContent = File::get($logFile);

        return view('logs.show', ['logContent' => $logContent]);
    }

    public function deleteLogs()
    {
        // Delete log files
        $logFiles = glob(storage_path('logs/*.log'));

        foreach ($logFiles as $file) {
            unlink($file);
        }

        return redirect()->route('logs.show')->with('success', 'Log files deleted successfully.');
    }
}

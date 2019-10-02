<?php

namespace App\Http\Controllers;


class MiscellenousController
{
    public function downloadReport()
    {
        $user = auth()->user();
        return view('download_report', ['expenses' => $user->expenses]);
    }
}

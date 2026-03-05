<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    public function index()
    {
        // Pimpinan needs to see all disposisis for global monitoring
        $disposisis = Disposisi::with('teams', 'creator')->latest()->paginate(15);
        return view('monitor.index', compact('disposisis'));
    }
}

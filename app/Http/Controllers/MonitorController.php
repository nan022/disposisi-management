<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\Agenda;
use App\Models\Team;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    public function index()
    {
        $disposisis = Disposisi::with('teams', 'creator')->latest()->paginate(15);
        return view('monitor.index', compact('disposisis'));
    }

    public function agenda()
    {
        $agendas = Agenda::latest()->paginate(15);
        return view('monitor.agenda', compact('agendas'));
    }

    public function disposisiByTeam(Team $team)
    {
        $disposisis = Disposisi::whereHas('teams', function($q) use ($team) {
            $q->where('teams.id', $team->id);
        })->with('teams', 'creator')->latest()->paginate(15);

        return view('monitor.disposisi-team', compact('disposisis', 'team'));
    }
}

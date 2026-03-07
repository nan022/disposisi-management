<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Disposisi;
use App\Models\Team;
use App\Models\User;
use App\Models\Agenda;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $stats = [
            'total_users' => 0,
            'total_teams' => 0,
            'total_disposisi' => 0,
        ];

        // Data untuk Pimpinan
        $teamDisposisiCounts = [];
        $teams = Team::all();
        $upcomingAgendas = [];

        if ($user->isAdmin()) {
            $stats['total_users'] = User::count();
            $stats['total_teams'] = Team::count();
        }

        if ($user->isPimpinan()) {
            $stats['total_disposisi'] = Disposisi::count();

            // Agenda terdekat (yang akan datang)
            $upcomingAgendas = Agenda::where('tanggal_agenda', '>=', now())
                ->orderBy('tanggal_agenda')
                ->limit(5)
                ->get();

            // Hitung disposisi per tim
            foreach ($teams as $team) {
                $count = Disposisi::whereHas('teams', function($q) use ($team) {
                    $q->where('teams.id', $team->id);
                })->count();
                $teamDisposisiCounts[] = [
                    'id' => $team->id,
                    'name' => $team->name,
                    'count' => $count,
                ];
            }
        } elseif ($user->isKetuaTim()) {
            $stats['total_disposisi'] = Disposisi::whereHas('teams', function($q) use ($user) {
                $q->where('teams.id', $user->team_id);
            })->count();
        } else {
            $stats['total_disposisi'] = Disposisi::count();
            $stats['total_teams'] = Team::count();
        }

        return view('dashboard.index', compact('stats', 'teamDisposisiCounts', 'teams', 'upcomingAgendas'));
    }
}

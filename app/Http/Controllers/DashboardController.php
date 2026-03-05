<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Disposisi;
use App\Models\Team;
use App\Models\User;

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

        if ($user->isAdmin()) {
            $stats['total_users'] = User::count();
            $stats['total_teams'] = Team::count();
        }

        if ($user->isKetuaTim()) {
            $stats['total_disposisi'] = Disposisi::whereHas('teams', function($q) use ($user) {
                $q->where('teams.id', $user->team_id);
            })->count();
        } else {
            $stats['total_disposisi'] = Disposisi::count();
            $stats['total_teams'] = Team::count();
        }

        return view('dashboard.index', compact('stats'));
    }
}

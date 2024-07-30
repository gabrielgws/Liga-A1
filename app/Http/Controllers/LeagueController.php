<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class LeagueController extends Controller
{
    public function show()
    {
        $players = Player::with('user')->orderBy('score', 'desc')->get();
        return view('liga.index', compact('players'));
    }
}

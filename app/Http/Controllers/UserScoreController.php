<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class UserScoreController extends Controller
{
    public function showScores()
    {
        // Supondo que você esteja autenticado e o usuário tenha um ID associado a ele
        $user = auth()->user();

        // Obtenha o jogador correspondente ao usuário atual
        $player = Player::where('user_id', $user->id)->first();

        // Verifique se o player é nulo
        if (!$player) {
            return view('pages.user.not_approved');
        }

        // Carregar as regras e pontuações do jogador
        $rulesWithScores = $player->rules()->withPivot('custom_description')->get();

        // Calcular o total de pontos
        $totalPoints = $rulesWithScores->sum('points');

        return view('pages.user.scores', compact('player', 'rulesWithScores', 'totalPoints'));
    }
}

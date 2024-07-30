<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    public function index()
    {
        // Buscar todos os jogadores ordenados por pontuação
        $players = Player::orderBy('score', 'desc')->get();

        //Retornar a view com os jogadores
        return view('liga.index', compact('players'));
    }

    public function removeRule(Request $request, $playerId, $ruleId)
    {
        // Verificar se o jogador existe
        $player = Player::findOrFail($playerId);

        // Buscar a regra específica na tabela player_rules
        $playerRule = DB::table('player_rules')
            ->where('player_id', $playerId)
            ->where('rule_id', $ruleId)
            ->first();

        if ($playerRule) {
            // Deletar a entrada específica
            DB::table('player_rules')
                ->where('id', $playerRule->id)
                ->delete();

            $this->updatePlayerScore($player);

            return redirect()->back()->with('success', 'Regra removida com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Regra não encontrada para este jogador.');
        }
    }

    private function updatePlayerScore(Player $player)
    {
        // Calcular a nova pontuação total
        $totalScore = $player->rules->sum(function ($rule) {
            return $rule->points;
        });

        // Atualizar a pontuação do jogador
        $player->score = $totalScore;
        $player->save();
    }
}

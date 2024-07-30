<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\PlayerRule;
use App\Models\Rule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Exibe o dashboard admin
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Método para exibir a lista de usuários
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Método para alternar o status de jogador de um usuário
    public function togglePlayerStatus(Request $request, User $user)
    {
        // Verifica o status atual do usuário
        if ($user->is_player) {
            // Remoiver da tabela de players
            $user->is_player = false;
            Player::where('user_id', $user->id)->delete();
        } else {
            // Adicionar na tabela players
            $user->is_player = true;
            Player::updateOrCreate(
                ['user_id' => $user->id],
                ['score' => 0]
            );
        }

        //Altera o status do jogador
        // $user->is_player = !$user->is_player;
        $user->save();

        // Redireciona com uma mensagem de sucesso
        return redirect()->route('admin.users')->with('success', 'Status de jogador atualizado com sucesso.');
    }

    // Método para listar jogadores
    public function listPlayers()
    {
        $players = Player::with('rules')->get();
        $rules = Rule::all();

        return view('admin.players', compact('players', 'rules'));
    }

    // Método para adicionar regras ao jogador
    public function showAddRulesForm($playerId)
    {
        $player = Player::with('rules')->findOrFail($playerId);
        $rules = Rule::all();
        return view('admin.players.add-rules', compact('player', 'rules'));
    }

    public function addRuleToPlayer(Request $request, $playerId)
    {
        $request->validate([
            'rule_id' => 'required|exists:rules,id',
        ]);

        $player = Player::findOrFail($playerId);
        $ruleId = $request->input('rule_id');

        // Verifica se a regra já foi adicionada ao jogador
        if (!$player->rules->contains($ruleId)) {
            $player->rules()->attach($ruleId);
        }

        // Atualiza a pontuação do jogador
        $player->calculateScore(); // Método para recalcular a pontuação
        $player->save();

        return redirect()->route('admin.players.list')->with('success', 'Regra adicionada com sucesso.');
    }


    public function showAddRuleForm(Player $player)
    {
        $rules = Rule::all(); // Obtém todas as regras disponíveis

        return view('admin.add-rule', compact('player', 'rules'));
    }

    public function addRule(Request $request, $playerId)
    {
        $player = Player::findOrFail($playerId);

        // Valida os dados recebidos
        $request->validate([
            'rule_id' => 'required|exists:rules,id',
            'custom_description' => 'required|string|max:255',
        ]);

        // Adiciona a regra ao jogador com a descrição personalizada
        $player->rules()->attach($request->rule_id, [
            'custom_description' => $request->custom_description
        ]);

        $this->updatePlayerScore($player);

        return redirect()->back()->with('success', 'Regra adicionada com sucesso!');
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

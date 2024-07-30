<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RuleController extends Controller
{
    public function index()
    {
        // Buscar todas as regras e agrupá-las por pontos
        $rules = Rule::orderBy('points', 'desc')->get()->groupBy('points');

        // Retornar a view com as regras agrupadas
        return view('pages.rules.index', compact('rules'));
    }

    /**
     * Display a listing of the rules.
     *
     * @return \Illuminate\View\View
     */
    public function indexAdmin()
    {
        $rules = Rule::orderBy('points', 'desc')->get(); // Obtém todas as regras ordenadas por pontos
        return view('admin.rules.index', compact('rules'));
    }

    /**
     * Show the form for creating a new rule.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.rules.create');
    }

    /**
     * Store a newly created rule in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'points' => 'required|integer',
            'type' => 'required|string', // Adicione a validação para o campo 'type'
        ]);

        Rule::create($validatedData);

        return redirect()->route('admin.rules.list')->with('success', 'Regra criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified rule.
     *
     * @param \App\Models\Rule $rule
     * @return \Illuminate\View\View
     */
    public function edit(Rule $rule)
    {
        return view('admin.rules.edit', compact('rule'));
    }

    /**
     * Update the specified rule in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Rule $rule
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Rule $rule)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'points' => 'nullable|integer|min:0',
            'type' => 'required|string', // Adicione a validação para o campo 'type'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Atualização da regra
        $rule->update($request->only('name', 'description', 'points', 'type'));

        // Atualizar pontuações dos jogadores, se necessário
        $this->updatePlayerScores($rule);

        return redirect()->route('admin.rules.list')->with('success', 'Regra atualizada com sucesso!');
    }

    /**
     * Remove the specified rule from storage.
     *
     * @param \App\Models\Rule $rule
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Rule $rule)
    {
        // Remova a regra
        $rule->delete();

        // Atualize a pontuação dos jogadores
        $this->updatePlayerScores();

        return redirect()->route('admin.rules.list')->with('success', 'Regra excluída com sucesso!');
    }

    protected function updatePlayerScores()
    {
        // Atualize a pontuação dos jogadores com base nas regras restantes
        $players = Player::all();

        foreach ($players as $player) {
            // Recalcule a pontuação com base nas regras restantes
            $player->score = $this->calculateScoreForPlayer($player);
            $player->save();
        }
    }

    protected function calculateScoreForPlayer(Player $player)
    {
        // Calcule a pontuação do jogador baseada nas regras restantes
        // Exemplo básico: Some os pontos das regras associadas ao jogador

        // Obtém todas as regras restantes para o jogador
        $totalPoints = $player->rules()->sum('points');
        return $totalPoints;
    }
}

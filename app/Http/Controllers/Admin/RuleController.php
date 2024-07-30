<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    /**
     * Display a listing of the rules.
     *
     * @return \Illuminate\View\View
     */
    public function index()
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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'points' => 'required|integer',
        ]);

        $rule->update($validatedData);

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
        $rule->delete();

        return redirect()->route('admin.rules.list')->with('success', 'Regra excluída com sucesso!');
    }
}

<x-header />

<div class="container mx-auto mt-5 p-5 max-w-4xl">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-primary">Minhas Pontuações</h1>
        <p class="text-lg text-primary mt-2">Veja suas pontuações e regras aplicadas.</p>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full table-auto bg-gray-50 rounded-lg shadow-md">
            <thead class="bg-primary text-black">
                <tr>
                    <th class="px-4 py-2 text-left">Regra</th>
                    <th class="px-4 py-2 text-left">Pontuação</th>
                    <th class="px-4 py-2 text-left">Descrição</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rulesWithScores as $rule)
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $rule->name }}</td>
                    <td class="px-4 py-2">{{ $rule->points }}</td>
                    <td class="px-4 py-2">{{ $rule->pivot->custom_description }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-8 text-center bg-primary text-black py-4 rounded-lg shadow-md">
        <h4 class="text-xl font-semibold">Total de Pontos: {{ $totalPoints }}</h4>
    </div>
</div>

<x-menu-bars />

</div>
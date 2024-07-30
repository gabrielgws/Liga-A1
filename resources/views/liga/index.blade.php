<x-header />

<div class="container mx-auto pt-12 px-5 max-w-3xl">
    <h1 class="text-3xl font-bold text-center text-primary mb-8">Ranking da Liga</h1>

    <div class="overflow-x-auto rounded-lg">
        <table class="min-w-full bg-white rounded-lg shadow-md">
            <thead>
                <tr class="bg-primary text-black">
                    <th class="px-6 py-3 text-left font-semibold">Posição</th>
                    <th class="px-6 py-3 text-left font-semibold">Nome do Jogador</th>
                    <th class="px-6 py-3 text-left font-semibold">Pontuação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($players as $index => $player)
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">
                            {{ $index + 1 }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">
                            {{ $player->user->name }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">
                            {{ $player->score }}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<x-menu-bars />
<x-footer />
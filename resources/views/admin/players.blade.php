<x-header />

<div class="container mx-auto pt-12 px-5 max-w-[700px]">
    <h1 class="text-3xl font-bold text-center mb-6 text-primary">Lista de Jogadores</h1>

    @if(session('success'))
    <div class="bg-green-100 text-green-500 p-4 mb-4 rounded">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto rounded">
        <table class="min-w-full bg-white rounded-lg shadow-md">
            <thead>
                <tr class="bg-primary text-black">
                    <!-- <th class="px-3 py-3 text-left font-semibold">ID</th> -->
                    <th class="px-3 py-3 text-left font-semibold">Nome</th>
                    <th class="px-3 py-3 text-left font-semibold">Pontuação</th>
                    <th class="px-3 py-3 text-left font-semibold">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($players as $player)
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <!-- <td class="px-3 py-3 text-sm font-medium text-gray-900">{{ $player->id }}</td> -->
                    <td class="px-3 py-3 text-sm font-medium text-gray-900">{{ $player->user->name }}</td>
                    <td class="px-3 py-3 text-sm text-gray-600">{{ $player->score }}</td>
                    <td class="px-3 py-3 text-sm">
                        <form action="{{ route('admin.players.addRule', $player->id) }}" method="POST" class="mb-2">
                            @csrf
                            <div class="mb-2">
                                <select name="rule_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>
                                    @foreach ($rules as $rule)
                                    <option value="{{ $rule->id }}">{{ $rule->name }} - {{ $rule->points }} pontos</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <input type="text" name="custom_description" class="w-full border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" placeholder="Descrição personalizada" required>
                            </div>
                            <button type="submit" class="px-4 py-2 text-black font-semibold bg-primary rounded-full transition-all hover:scale-105">
                                Adicionar Regra
                            </button>
                        </form>

                        <!-- Botão para abrir o modal -->
                        <button type="button" class="px-4 py-2 text-black font-semibold bg-primary rounded-full transition-all hover:scale-105" onclick="openModal({{ $player->id }})">
                            Ver Regras
                        </button>

                        <!-- Modal usando Tailwind CSS Dialog -->
                        <div id="rulesModal-{{ $player->id }}" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden z-50">
                            <div class="bg-white rounded-lg shadow-lg max-w-lg w-full mx-4">
                                <div class="flex justify-between items-center p-4 border-b">
                                    <h5 class="text-lg font-semibold">Regras - {{ $player->user->name }}</h5>
                                    <button type="button" class="text-black transition-all hover:scale-110" onclick="closeModal({{ $player->id }})">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="p-4">
                                    <ul class="list-disc pl-5">
                                        @foreach ($player->rules as $rule)
                                        <li class="flex justify-between items-start mb-2">
                                            <div>
                                                <strong>{{ $rule->name }}</strong> - {{ $rule->points }} pontos
                                                <br>
                                                <small>Descrição: {{ $rule->pivot->custom_description }}</small>
                                            </div>
                                            <form action="{{ route('admin.players.removeRule', ['player' => $player->id, 'rule' => $rule->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-600 text-white rounded-lg py-1 px-2 text-sm font-semibold transition-transform transform hover:scale-105">
                                                    Remover
                                                </button>
                                            </form>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="p-4 border-t text-right">
                                    <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md" onclick="closeModal({{ $player->id }})">Fechar</button>
                                </div>
                            </div>
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

<script>
    function openModal(playerId) {
        document.getElementById(`rulesModal-${playerId}`).classList.remove('hidden');
    }

    function closeModal(playerId) {
        document.getElementById(`rulesModal-${playerId}`).classList.add('hidden');
    }
</script>
<x-header />
<div class="container mx-auto pt-12 px-5 max-w-[700px]">
    <h1 class="text-3xl font-bold text-center mb-6 text-primary">Lista de Usuários</h1>
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
                    <th class="px-3 py-3 text-left font-semibold">Email</th>
                    <th class="px-3 py-3 text-left font-semibold">Status</th>
                    <th class="px-3 py-3 text-left font-semibold">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <!-- <td class="px-6 py-3 text-sm font-medium text-gray-900">{{ $user->id }}</td> -->
                    <td class="px-3 py-3 text-sm font-medium text-gray-900">{{ $user->name }}</td>
                    <td class="px-3 py-3 text-sm text-gray-600">{{ $user->email }}</td>
                    <td class="px-3 py-3 text-sm text-gray-600">{{ $user->is_player ? 'Jogador' : 'Não é Jogador' }}</td>
                    <td class="px-3 py-3 text-sm">
                        <button onclick="showConfirmationModal({{ $user->id }}, '{{ $user->is_player ? 'Remover' : 'Adicionar' }}')" class="px-4 py-2 text-white rounded-full {{ $user->is_player ? 'bg-red-600 hover:bg-red-700' : 'bg-green-600 hover:bg-green-700' }}">
                            {{ $user->is_player ? 'Remover da Liga' : 'Adicionar à Liga' }}
                        </button>
                        <form id="togglePlayerForm-{{ $user->id }}" action="{{ route('admin.users.togglePlayer', $user->id) }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal de Confirmação -->
<dialog id="confirmationModal" class="mt-12 bg-transparent w-full h-full mx-auto">
    <div class="max-w-[700px] mx-auto bg-white rounded-lg p-5 border border-gray-300 shadow-lg">
        <div class="flex flex-col items-center">
            <h3 class="text-xl font-semibold mb-4">Confirmação</h3>
            <p class="mb-6">Você tem certeza de que deseja <span id="actionType"></span> este usuário da liga?</p>
            <div class="flex space-x-4">
                <button id="confirmButton" class="px-4 py-2 bg-primary text-white rounded-full hover:bg-primary-dark">Confirmar</button>
                <button onclick="closeConfirmationModal()" class="px-4 py-2 bg-gray-500 text-white rounded-full hover:bg-gray-600">Cancelar</button>
            </div>
        </div>
    </div>
</dialog>

<x-menu-bars />

<x-footer />

<script>
    let currentUserId = null;

    function showConfirmationModal(userId, actionType) {
        currentUserId = userId;
        document.getElementById('actionType').innerText = actionType.toLowerCase();
        document.getElementById('confirmationModal').showModal();
    }

    function closeConfirmationModal() {
        document.getElementById('confirmationModal').close();
    }

    document.getElementById('confirmButton').addEventListener('click', function() {
        if (currentUserId) {
            document.getElementById(`togglePlayerForm-${currentUserId}`).submit();
        }
    });
</script>
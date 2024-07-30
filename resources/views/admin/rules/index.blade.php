<x-header />

<div class="container mx-auto pt-12 px-5 w-full max-w-[800px]">
    <h1 class="text-3xl font-bold text-primary text-center mb-8">Gerenciamento de Regras</h1>

    @if(session('success'))
    <div class="bg-green-100 text-green-500 p-4 mb-4 rounded">
        {{ session('success') }}
    </div>
    @endif

    <div class="mb-4 flex justify-end">
        <a href="{{ route('admin.rules.create') }}">
            <button type="submit" class="mt-4 w-full min-h-10 text-center bg-primary rounded-full font-semibold transition-all hover:scale-105 btn-shadow
             text-black px-4 py-2
            ">
                Nova Regra
            </button>

        </a>
    </div>

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">Nome</th>
                <th class="px-4 py-2">Descrição</th>
                <th class="px-4 py-2">Pontos</th>
                <th class="px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rules as $rule)
            <tr class="border-t">
                <td class="px-4 py-2 text-white font-semibold">{{ $rule->name }}</td>
                <td class="px-4 py-2 text-white ">{{ $rule->description }}</td>
                <td class="px-4 py-2 text-white ">{{ $rule->points }}</td>
                <td class="px-4 py-2 flex gap-2">
                    <a href="{{ route('admin.rules.edit', $rule) }}" class="text-blue-500 hover:underline">Editar</a>
                    <form action="{{ route('admin.rules.destroy', $rule) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta regra?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<x-menu-bars />

<x-footer />
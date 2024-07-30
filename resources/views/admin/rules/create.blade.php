<!-- resources/views/admin/rules/create.blade.php -->

<x-header />

<div class="container mx-auto pt-12 px-5 w-full max-w-[500px]">
    <h1 class="text-3xl font-bold text-primary text-center mb-8">Criar Nova Regra</h1>

    @if($errors->any())
    <div class="bg-red-100 text-red-800 p-4 mb-4 rounded">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('admin.rules.store') }}" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-white mb-2">Nome</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full min-h-10 pl-3 border-none transition-all rounded-full focus-visible:outline-2 focus-visible:outline-primary">
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-white mb-2">Descrição</label>
            <textarea name="description" id="description" class="w-full min-h-10 pl-3 border-none transition-all rounded-full focus-visible:outline-2 focus-visible:outline-primary">{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="points" class="block text-sm font-medium text-white mb-2">Pontos</label>
            <input type="number" name="points" id="points" value="{{ old('points') }}" class="w-full min-h-10 pl-3 border-none transition-all rounded-full focus-visible:outline-2 focus-visible:outline-primary">
        </div>

        <div>
            <label for="type" class="block text-sm font-medium text-white mb-2">Tipo</label>
            <input type="text" name="type" id="type" value="{{ old('type') }}" class="w-full min-h-10 pl-3 border-none transition-all rounded-full focus-visible:outline-2 focus-visible:outline-primary">
        </div>

        <button type="submit" class="mt-4 w-full min-h-10 text-center bg-primary rounded-full font-semibold transition-all hover:scale-105 btn-shadow">
            Criar Regra
        </button>
    </form>
</div>

<x-footer />
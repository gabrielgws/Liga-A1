<x-header />

<div class="container mx-auto pt-12 px-5 w-full max-w-[500px]">
    <h1 class="text-3xl font-bold text-primary text-center mb-8">Editar Perfil</h1>

    @if(session('success'))
    <div class="bg-green-100 text-green-500 p-4 mb-4 rounded">
        {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div class="bg-red-100 text-red-500 p-4 mb-4 rounded">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('user.profile.update') }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}" class="w-full min-h-10 pl-3 border-none transition-all rounded-full focus-visible:outline-2 focus-visible:outline-primary">
        </div>

        <div>
            <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}" class="w-full min-h-10 pl-3 border-none transition-all rounded-full focus-visible:outline-2 focus-visible:outline-primary">
        </div>

        <div>
            <input placeholder="senha" type="password" name="password" id="password" class="w-full min-h-10 pl-3 border-none transition-all rounded-full focus-visible:outline-2 focus-visible:outline-primary">
        </div>

        <div>
            <input placeholder="Confirmar Nova Senha" type="password" name="password_confirmation" id="password_confirmation" class="w-full min-h-10 pl-3 border-none transition-all rounded-full focus-visible:outline-2 focus-visible:outline-primary">
            <small class="text-primary">Deixe em branco se não quiser alterar a senha.</small>
        </div>

        <button type="submit" class="mt-4 w-full min-h-10 text-center bg-primary rounded-full font-semibold transition-all hover:scale-105 btn-shadow">
            Atualizar Perfil
        </button>
    </form>
</div>

<x-menu-bars />
<x-footer />
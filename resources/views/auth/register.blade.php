<x-header />
<div class="w-full max-w-[500px] mx-auto py-12 px-5 flex flex-col items-center justify-center">
    <img src="{{ asset('images/logo/logo_A1_1.svg' )}}" alt="Logo - A1 - Masculino" title="Logo - A1 - Masculino" class="w-20">
    <h1 class="mt-12 text-white text-2xl font-semibold">Cadastro de Usuário</h1>
    <form action="{{ route('register.store') }}" method="POST" class="mt-5 w-full">
        @csrf

        <!-- Exibe as mensagens de sucesso e erro -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert-error">
            <ul class="list-none mb-5">
                @foreach($errors->all() as $error)
                <li class="text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="">
            <input placeholder="Nome" type="text" class="form-control w-full min-h-10 pl-3 border-none transition-all rounded-full focus-visible:outline-2 focus-visible:outline-primary" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="mt-4">
            <input placeholder="E-mail" type="email" class="form-control w-full min-h-10 pl-3 border-none transition-all rounded-full focus-visible:outline-2 focus-visible:outline-primary" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="mt-4">
            <input placeholder="Senha" type="password" class="form-control w-full min-h-10 pl-3 border-none transition-all rounded-full focus-visible:outline-2 focus-visible:outline-primary" id="password" name="password" required>
        </div>
        <div class="mt-4">
            <input placeholder="Confirme a senha" type="password" class="form-control w-full min-h-10 pl-3 border-none transition-all rounded-full focus-visible:outline-2 focus-visible:outline-primary" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit" class="mt-4 w-full min-h-10 text-center bg-primary rounded-full font-semibold transition-all hover:scale-105 btn-shadow">
            Cadastrar
        </button>
    </form>
</div>
<x-footer />
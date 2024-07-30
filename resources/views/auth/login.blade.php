<x-header />
<div class="w-full max-w-[500px] mx-auto py-12 px-5 flex flex-col items-center justify-center">
    <img src="{{ asset('images/logo/logo_A1_1.svg' )}}" alt="Logo - A1 - Masculino" title="Logo - A1 - Masculino" class="w-20">
    <h1 class="mt-12 text-white text-2xl font-semibold">Login</h1>
    <form action="{{ route('login') }}" method="POST" class="mt-5 w-full">
        @csrf

        <!-- Exibe as mensagens de sucesso e erro -->
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

        <div class="">
            <input placeholder="E-mail" type="email" class="form-control w-full min-h-10 pl-3 border-none transition-all rounded-full focus-visible:outline-2 focus-visible:outline-primary" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="mt-4">
            <input placeholder="Senha" type="password" class="form-control w-full min-h-10 pl-3 border-none transition-all rounded-full focus-visible:outline-2 focus-visible:outline-primary" id="password" name="password" required>
        </div>
        <!-- <button type="submit" class="btn btn-primary w-100">Entrar</button> -->


        <button type="submit" class="mt-4 w-full min-h-10 text-center bg-primary rounded-full font-semibold transition-all hover:scale-105 btn-shadow">
            Entrar
        </button>

    </form>
</div>
<x-footer />
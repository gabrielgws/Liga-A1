<section class="fixed bottom-0 w-full container text-center bg-black z-10">
    <div class="mx-auto flex justify-between py-5 px-5 max-w-[500px]">
        <!-- Início -->
        <a class="flex flex-col items-center justify-center gap-2 transition-transform hover:scale-110" href="{{ Auth::user()->is_admin ? route('admin.dashboard') : route('pages.dashboard') }}" aria-label="Página Inicial">
            <img src="{{ asset(Auth::user()->is_admin ? 'images/icons/icon-home.svg' : 'images/icons/icon-home.svg') }}" alt="Ícone de Início" class="w-[28px]" />
            <p class="text-xs font-light text-white">
                {{ Auth::user()->is_admin ? 'Admin' : 'Dashboard' }}
            </p>
        </a>

        <!-- Regras -->
        <a class="flex flex-col items-center justify-center gap-2 transition-transform hover:scale-110" href="{{ route('pages.rules.index') }}" aria-label="Página de Regras">
            <img src="{{ asset('images/icons/icon-regras.svg') }}" alt="Ícone de Regras" class="w-[28px]" />
            <p class="text-xs font-light text-white">Regras</p>
        </a>

        <!-- Liga -->
        <a class="flex flex-col items-center justify-center gap-2 transition-transform hover:scale-110" href="{{ route('liga.index') }}" aria-label="Página da Liga">
            <img src="{{ asset('images/icons/liga_a1.svg') }}" alt="Ícone da Liga" class="w-[28px]" />
            <p class="text-xs font-light text-white">Liga</p>
        </a>

        <!-- Perfil -->
        <a class="flex flex-col items-center justify-center gap-2 transition-transform hover:scale-110" href="{{ route('user.profile.show') }}" aria-label="Página de Perfil">
            <img src="{{ asset('images/icons/icon-perfil.svg') }}" alt="Ícone de Perfil" class="w-[28px]" />
            <p class="text-xs font-light text-white">Perfil</p>
        </a>

        <!-- Sair -->
        <div class="transition-transform hover:scale-110">
            <form action="{{ route('logout') }}" method="POST" aria-label="Formulário de Logout">
                @csrf
                <button type="submit" class="flex flex-col items-center justify-center gap-2 focus:ring-red-500">
                    <img src="{{ asset('images/icons/icon-sair.svg') }}" alt="Ícone de Sair" class="w-[28px]" />
                    <p class="text-xs font-light text-white">Sair</p>
                </button>
            </form>
        </div>
    </div>
</section>
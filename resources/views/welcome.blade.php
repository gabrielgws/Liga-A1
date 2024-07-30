<x-header />
<div class="pt-5 px-5 w-full flex items-end justify-end">
    <a href="{{ route('login') }}" class="">
        <button class="mt-4 bg-primary rounded-full py-2 px-8 text-center font-semibold transition-all hover:scale-110 items-center flex gap-2 btn-shadow">

            Login
            <img src="{{ asset('images/icons/icon-login.svg') }}" alt="Ícone - Login" class="w-4">
        </button>
    </a>
</div>
<div class="w-full py-12 flex flex-col items-center justify-center">

    <img src="{{ asset('images/logo/logo_A1_1.svg' )}}" alt="Logo - A1 - Masculino" title="Logo - A1 - Masculino">

    <section class="mt-20">
        <h2 class="text-3xl text-white font-bold text-center">Vencedores 1° Semestre 2024</h2>

        <div class="mt-12 flex flex-col items-center justify-center">
            <div class="text-center relative w-36">
                <img src="{{ asset('images/vencedores/diego.webp' )}}" alt="Foto - Diego Coelho" title="Diego Coelho" class="w-36 rounded-full">
                <p class="text-white mt-4 text-xl font-medium">Diego Coelho</p>
                <p class="text-white text-base">28 pontos</p>

                <img src="{{ asset('/images/vencedores/icons/icon-1.svg' )}}" alt="Ícone - Campeão" title="Campeão" class="w-12 absolute top-0 right-0">
            </div>

            <div class="w-full mt-28 px-5 flex items-center justify-evenly gap-2">
                <div class="relative flex flex-col items-center">
                    <img src="{{ asset('images/vencedores/mario.webp' )}}" alt="Foto - Mário Junior" title="Mário Junior" class="w-16 rounded-full">
                    <p class="text-white text-center mt-4 text-base font-medium">Mario Junior</p>
                    <p class="text-white text-sm">20 pontos</p>

                    <img src="{{ asset('images/vencedores/icons/icon-2.svg' )}}" alt="Ícone - Vice Campeão" title="Vice Campeão" class="w-7 absolute top-0 right-0">
                </div>

                <div class="flex text-center gap-1">
                    <div class="relative flex flex-col items-center">
                        <img src="{{ asset('images/vencedores/lucas-maia.webp' )}}" alt="Foto - Lucas Maia" title="Lucas Maia" class="w-16 rounded-full">
                        <p class="text-white mt-4 text-base font-medium">Lucas Maia</p>
                        <p class="text-white text-sm">19 pontos</p>

                        <img src="{{ asset('images/vencedores/icons/icon-3.svg' )}}" alt="Ícone - Terceiro Lugar" title="Terceiro Lugar" class="w-7 absolute top-0 right-0">
                    </div>
                    <div class="relative flex flex-col items-center">
                        <img src="{{ asset('images/vencedores/gabriel-v.webp' )}}" alt="Foto - Gabriel Vital" title="Gabriel Vital" class="w-16 rounded-full">
                        <p class="text-white mt-4 text-base font-medium">Gabriel Vital</p>
                        <p class="text-white text-sm">19 pontos</p>

                        <img src="{{ asset('images/vencedores/icons/icon-3.svg' )}}" alt="Ícone - Terceiro Lugar" title="Terceiro Lugar" class="w-7 absolute top-0 right-0">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="separator"></div>

    <div class="flex flex-col items-center justify-center gap-8 px-5">
        <h3 class="text-xl text-center text-white font-bold">Entre agora na competição do 2° semestre</h3>

        <a href="{{ route('register') }}" class="">
            <button class="bg-primary rounded-full py-4 px-8 text-center font-bold items-center flex bt-pulsar btn-shadow">
                Participar
            </button>
        </a>
    </div>

</div>
<x-footer />
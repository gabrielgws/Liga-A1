<x-header />
<div class="container">
    <div class="pt-12 px-5">
        <div class="text-center">
            <h1 class="text-2xl font-bold text-primary">Bem-vindo ao seu Dashboard</h1>
            <p class="text-primary text-lg">Aqui você pode visualizar suas informações e estatísticas.</p>
        </div>
    </div>

    <div class="flex items-center justify-center flex-wrap">
        <div class="mx-5 p-5 mt-5 bg-white rounded-lg h-min w-full max-w-96 shadow-primary shadow-md flex flex-col items-center justify-center text-center">
            <h5 class="text-lg font-bold">Pontuações</h5>
            <p class="">Veja suas pontuações na competição.</p>
            <a href="{{ route('pages.user.scores') }}" class="mt-4 bg-primary rounded-full py-2 w-full text-center font-semibold transition-all hover:bg-black hover:text-primary">
                Ver Pontuações
            </a>
        </div>
    </div>

    <x-menu-bars />
</div>
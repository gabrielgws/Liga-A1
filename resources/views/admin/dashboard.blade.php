<x-header />

<div class="container mx-auto mt-12 px-5">
    <h1 class="text-2xl text-primary text-center font-bold mb-4">Bem-vindo ao Painel Administrativo</h1>
    <p class="text-primary text-center mb-6">Use as opções abaixo para gerenciar o sistema:</p>

    <div class="flex items-center justify-center flex-wrap">
        <div class="mx-5 p-5 mt-5 bg-white rounded-lg h-min w-full max-w-96 shadow-primary shadow-md flex flex-col items-center justify-center text-center">
            <h5 class="text-lg font-bold">Lista de usuários</h5>
            <p class="">Veja todos os usuários, e adicione eles a liga.</p>
            <a href="{{ route('admin.users') }}" class="mt-4 bg-primary rounded-full py-2 w-full text-center font-semibold transition-all hover:bg-black hover:text-primary">
                Acessar
            </a>
        </div>

        <div class="mx-5 p-5 mt-5 bg-white rounded-lg h-min w-full max-w-96 shadow-primary shadow-md flex flex-col items-center justify-center text-center">
            <h5 class="text-lg font-bold">Lista de Jogadores</h5>
            <p class="">Veja todos os Players, adicione, edite ou remova uma regra.</p>
            <a href="{{ route('admin.players.list') }}" class="mt-4 bg-primary rounded-full py-2 w-full text-center font-semibold transition-all hover:bg-black hover:text-primary">
                Acessar
            </a>
        </div>

        <div class="mx-5 p-5 mt-5 bg-white rounded-lg h-min w-full max-w-96 shadow-primary shadow-md flex flex-col items-center justify-center text-center">
            <h5 class="text-lg font-bold">Lista de Regras</h5>
            <p class="">Gerencie as regras da Liga.</p>
            <a href="{{ route('admin.rules.list') }}" class="mt-4 bg-primary rounded-full py-2 w-full text-center font-semibold transition-all hover:bg-black hover:text-primary">
                Acessar
            </a>
        </div>

        <div class="mx-5 p-5 mt-5 bg-white rounded-lg h-min w-full max-w-96 shadow-primary shadow-md flex flex-col items-center justify-center text-center">
            <h5 class="text-lg font-bold">Cadastrar Novo Usuário</h5>
            <p class="">Cadastre um novo usuário.</p>
            <a href="{{ route('register') }}" class="mt-4 bg-primary rounded-full py-2 w-full text-center font-semibold transition-all hover:bg-black hover:text-primary">
                Acessar
            </a>
        </div>
    </div>
</div>

<x-menu-bars />

<x-footer />
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Jogadores</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Lista de Jogadores</h1>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Pontuação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($players as $player)
                <tr>
                    <td>{{ $player->id }}</td>
                    <td>{{ $player->user->name }}</td>
                    <td>{{ $player->score }}</td>
                    <td>
                        <a href="{{ route('admin.players.addRulesForm', $player->id) }}" class="btn btn-primary">Adicionar Regras</a>
                        <!-- Você pode adicionar outros botões conforme necessário -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>

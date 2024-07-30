<!-- resources/views/admin/add-points.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Pontos</title>
</head>

<body>
    <div class="container">
        <h1>Adicionar Pontos para o Jogador</h1>
        <form action="{{ route('admin.players.addPoints', $player->id) }}" method="POST">
            @csrf
            <div>
                <label for="rules">Selecione as Regras:</label>
                <select name="rules[]" multiple>
                    @foreach($rules as $rule)
                    <option value="{{ $rule->id }}">{{ $rule->name }} ({{ $rule->points }} pontos)</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Adicionar Pontos</button>
        </form>
    </div>
</body>

</html>

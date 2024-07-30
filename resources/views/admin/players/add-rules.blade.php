<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Regras</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Adicionar Regras para {{ $player->user->name }}</h1>
        <form action="{{ route('admin.players.addRules', $player->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="rules" class="form-label">Selecione as Regras:</label>
                <select name="rules[]" multiple class="form-select">
                    @foreach($rules as $rule)
                    <option value="{{ $rule->id }}">{{ $rule->name }} ({{ $rule->points }} pontos)</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Regras</button>
        </form>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Regra ao Jogador</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Adicionar Regra ao Jogador</h1>

        <!-- Formulário para adicionar uma regra ao jogador -->
        <form action="{{ route('admin.players.addRule', $player->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="rule_id" class="form-label">Regra</label>
                <select name="rule_id" id="rule_id" class="form-select" required>
                    <option value="" disabled selected>Selecione uma regra</option>
                    @foreach ($rules as $rule)
                    <option value="{{ $rule->id }}">{{ $rule->name }} - {{ $rule->points }} pontos</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Regra</button>
        </form>
    </div>
</body>

</html>

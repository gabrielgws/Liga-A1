<x-header />
<div class="container mx-auto pt-12 px-5 w-full max-w-[500px]">
    <h1 class="text-3xl text-primary font-bold text-center mb-8">Regras da Liga</h1>

    @forelse ($rules as $points => $rulesGroup)
    <div class="mb-6">
        <div class="bg-primary text-black text-lg font-semibold px-4 py-2 rounded-t">
            {{ $points }} Pontos
        </div>
        <ul class="bg-white shadow-md rounded-b px-4 py-2">
            @foreach ($rulesGroup as $rule)
            <li class="flex items-center gap-4 py-2 border-b last:border-b-0">
                <div class="text-black font-medium">{{ $rule->name }}</div>
                <div class="text-gray-600">{{ $rule->description }}</div>
            </li>
            @endforeach
        </ul>
    </div>
    @empty
    <div class="text-center text-gray-600">
        Não há regras cadastradas no momento.
    </div>
    @endforelse
</div>

<x-menu-bars />
<x-footer />
@php
    use Illuminate\Support\Facades\Auth;
    use App\Models\Column;

    $user = Auth::user();
    $teams = $user->allTeams();

    $teamNames = [];
    $boardCounts = [];

    $onGoingCards = [];

    foreach ($teams as $team) {
        $teamNames[] = $team->name;
        $boardCounts[] = $team->boards()->count();

        foreach ($team->boards as $board) {
            $onGoingColumns = $board->columns()->where('name', 'On Going')->get();

            $cardCount = 0;
            foreach ($onGoingColumns as $column) {
                $cardCount += $column->cards()->count();
            }

            if ($cardCount > 0) {
                $onGoingCards[$team->name][$board->name] = $cardCount;
            }
        }
    }
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-sm font-bold">Statistics Dashboard</h2>
    </x-slot>

    <div class="space-y-4">
        {{-- Greeting --}}
        <div class="p-6 bg-base-100 border border-base-300 rounded-xl shadow">
            <h1 class="text-3xl font-bold text-primary mb-2">Hello {{ $user->name }}!</h1>
            <p class="text-base-content">Here’s your current overview of team boards and ongoing tasks.</p>
        </div>

        {{-- Chart Section --}}
        <div class="p-6 bg-base-100 border border-base-300 rounded-xl shadow text-center">
            <h2 class="text-xl font-semibold mb-4">Board Count Per Team</h2>
            <canvas id="teamBoardsChart" class="w-72 h-72 mx-auto" style="max-height: 300px;"></canvas>
        </div>

        {{-- Ongoing Cards Count --}}
        <div class="p-6 bg-base-100 border border-base-300 rounded-xl shadow">
            <h2 class="text-xl font-semibold mb-4">"On Going" Cards Breakdown</h2>

            @forelse ($onGoingCards as $team => $boards)
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-primary">{{ $team }}</h3>
                    <ul class="list-disc list-inside text-base-content">
                        @foreach ($boards as $boardName => $count)
                            <li>{{ $boardName }}: <strong>{{ $count }}</strong> cards</li>
                        @endforeach
                    </ul>
                </div>
            @empty
                <p class="text-base-content">No ongoing cards found.</p>
            @endforelse
        </div>
    </div>

    {{-- Chart.js Script --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('teamBoardsChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($teamNames) !!},
                datasets: [{
                    label: 'Boards per Team',
                    data: {!! json_encode($boardCounts) !!},
                    backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6']
                }]
            },
        });
    </script>
</x-app-layout>

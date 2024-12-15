<x-base-layout>
    <x-back-button />
    <div class="flex flex-col items-center">
        <h1 class="text-2xl font-semibold">Aankomende Wedstrijden</h1>
        @if ($matches->count() > 1)
            @php
                $upcomingmatches = $matches->sortBy('date');
            @endphp
            @foreach ($upcomingmatches as $game)
                <div class="flex justify-evenly text-center items-center m-2">
                    <div class="flex text-center items-center m-2">
                        <img src="https://placehold.co/50x40" alt="sigma" class="inline-block h-10 w-10 m-2">
                        <h3>{{ \Illuminate\Support\Str::limit($game->team1, 10, '...') }}</h3>
                    </div>
                    <span class="m-2">vs</span>
                    <div class="flex text-center items-center m-2">
                        <h3>{{ \Illuminate\Support\Str::limit($game->team2, 10, '...') }}</h3>
                        <img src="https://placehold.co/50x40" alt="sigma" class="inline-block h-10 w-10 m-2">
                    </div>
                </div>
            @endforeach
        @else
            <p>Geen aankomende wedstrijden</p>
        @endif  
    </div>
</x-base-layouts>

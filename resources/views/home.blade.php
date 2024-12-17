<x-base-layout>
    @php
        $upcomingGame = $games->sortBy('date')->firstWhere('is_active', false);
        $a = $games->sortBy('date')->firstWhere('is_active', true);
    @endphp
    <div class="flex justify-center mt-10">
        <div class="bg-white border border-gray-400 p-10 justify-center text-center m-5">
            <h2 class="text-lg mb-2 font-semibold">Aankomende wedstrijden</h2>
            @if ($games->isNotEmpty())
            <div>
                <div class="flex justify-evenly text-center items-center">
                    <div class="flex text-center items-center">
                        <img src="https://placehold.co/50x40" alt="sigmaboy" class="inline-block h-10 w-10 m-2">
                        <h3>{{ \Illuminate\Support\Str::limit($upcomingGame->team1, 10, '...') }}</h3>
                    </div>
                    <span>vs</span>
                    <div class="flex text-center items-center">
                        <h3>{{ \Illuminate\Support\Str::limit($upcomingGame->team2, 10, '...') }}</h3>
                        <img src="https://placehold.co/50x40" alt="sigmaboy" class="inline-block h-10 w-10 m-2">
                    </div>
                </div>
                <p class="mb-2">{{ \Carbon\Carbon::parse($upcomingGame->date)->format('d/m/Y H:i') }}</p>
            </div>
            @else
                <p>Geen aankomende wedstrijden</p>
            @endif
            <hr>
            @if ($games->count() > 1)
            @php
                $upcomingGames = $games->sortBy('date')->skip(1)->take(4);
            @endphp
            @foreach ($upcomingGames as $game)
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
            <div class="flex justify-center mt-10 underline flex-row text-center items-center group">
                <a href="wedstrijden">Bekijk aankomende wedstrijden </a>
                <img class="h-4 transition-transform duration-300 transform group-hover:translate-x-1" src="{{ asset('images/chevron_right.png') }}" alt="">
            </div>
            @endif  
        </div>
        <div class="flex flex-col">
            <div class="bg-white border border-gray-400 p-5 flex flex-col justify-center text-center m-5">
                <h3 class="font-semibold">Huidige Wedstrijd</h3>
                @if ($a)
                <div class="flex justify-evenly mt-5">
                    <div class="flex justify-centers flex-col m-4">
                        <img src="https://placehold.co/50x40" alt="sigma" class="inline-block h-10 w-10 m-2">
                        <h4 class="ml-4">{{ \Illuminate\Support\Str::limit($a->team1, 6, '...') }}</h4>
                    </div>
                    <p class="m-4 font-semibold mt-5">vs</p>
                    <div class="flex justify-center flex-col m-4">
                        <img src="https://placehold.co/50x40" alt="sigma" class="inline-block h-10 w-10 m-2">
                        <h4 class="mr-4">{{ \Illuminate\Support\Str::limit($a->team2, 6, '...') }}</h4>
                    </div>
                </div>
                @php
                    $currentTime = \Carbon\Carbon::now();
                    $gameStartTime = \Carbon\Carbon::parse($a->date);
                    $gameMinutes = $currentTime->diffInMinutes($gameStartTime);
                @endphp
                @if ($gameMinutes <= 90)
                    <p class="text-lg font-semibold">{{ $gameMinutes }}'</p>
                @else
                    <p class="text-lg font-semibold">90'</p>
                @endif
                <div class="flex justify-center mt-10 underline flex-row text-center items-center group">
                    {{-- <a href="">Bekijk wedstrijd </a>
                    <img class="h-4 transition-transform duration-300 transform group-hover:translate-x-1" src="{{ asset('images/chevron_right.png') }}" alt=""> --}}
                </div>
                @else
                <p>Geen wedstrijd op dit moment</p>
                @endif
            </div>
            @auth
                <div class="bg-white border border-gray-400 p-10 m-5">
                    <h1 class="font-semibold">Welkom, {{ \Illuminate\Support\Str::limit(explode(' ', Auth::user()->name)[0], 10, '...') }}</h1>
                    <div class="flex flex-col items-start space-y-0">
                        <div class="flex justify-center underline flex-row text-center items-center group">
                            <a href="{{route('adminPanel')}}">Beheerder Paneel </a>
                            <img class="h-4 transition-transform duration-300 transform group-hover:translate-x-1" src="{{ asset('images/chevron_right.png') }}" alt="">
                        </div>
                        <div class="flex justify-center underline flex-row text-center items-center group">
                            <a href="">Schijdsrechter paneel </a>
                            <img class="h-4 transition-transform duration-300 transform group-hover:translate-x-1" src="{{ asset('images/chevron_right.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="bg-white border border-gray-400 p-10 m-5">
                    <h1 class="font-semibold">Inschrijven</h1>
                    <div class="flex flex-col items-start space-y-0">
                        <div class="flex justify-center underline flex-row text-center items-center group">
                            <a href="inschrijven">Inschrijven Team </a>
                            <img class="h-4 transition-transform duration-300 transform group-hover:translate-x-1" src="{{ asset('images/chevron_right.png') }}" alt="">
                        </div>
                    </div>
                </div>
            @endauth
            @guest
            <a class="bg-[#1F7A8C] mt-3 p-3 rounded text-white text-lg shadow-md shadow-gray-400 hover:shadow-sm hover:shadow-gray-400 transition-all ease-in delay-50 flex self-center items-center w-[80%]" href="register">Registreren</a>            
            @endguest
        </div>
    </div>
</x-base-layout>

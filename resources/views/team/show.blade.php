<x-base-layout>
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center mb-4">
                {{-- <img src="{{ $team->logo }}" alt="Team Logo" class="w-16 h-16 rounded-full mr-4"> --}}
                <div>
                    <h1 class="text-2xl font-bold">{{ $team->teamname }}</h1>
                    <p class="text-gray-600">Coach: {{ $team->coach }}</p>
                </div>
            </div>
            <div class="mt-4">
                <h2 class="text-xl font-semibold">Team informatie</h2>
                <p class="mt-2">Goals: {{ $team->goals }}</p>
            </div>
            <div class="mt-4">
                <a href="{{ route('team.update', $team->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Verander informatie
                </a>
            </div>
        </div>
    </div>
</x-base-layout>
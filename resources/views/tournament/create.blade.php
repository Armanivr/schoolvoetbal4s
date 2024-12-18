<x-base-layout>
    <x-back-button />
    <body class="bg-gray-100">
    <div class="container mx-auto w-[80%] p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-bold mb-6">Maak Tournament</h2>
        <form action="{{ route('tournament.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Tournament Naam:</label>
                <input type="text" id="name" name="name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="start_date" class="block text-gray-700 font-bold mb-2">Start Datum:</label>
                <input type="date" id="start_date" name="start_date" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4">
            </div>
            <div class="mb-4">
                <label for="teams" class="block text-gray-700 font-bold mb-2">Teams:</label>
                @foreach($teams as $team)
                    <div class="mb-2">
                        <input type="checkbox" id="team-{{ $team->id }}" name="teams[]" value="{{ $team->id }}" class="mr-2 leading-tight">
                        <label for="team-{{ $team->id }}" class="text-gray-700">{{ $team->teamname }}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="hover:underline text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Maak Tournament</button>
        </form>
    </div>
    </body>
</x-base-layout>
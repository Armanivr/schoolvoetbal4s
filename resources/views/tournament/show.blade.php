<x-base-layout>
    <x-back-button />
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Tournament Details</h1>
            <button class="bg-red-500 text-white px-4 py-2 rounded" onclick="confirm('Weet je zeker dat je het tournament wilt verwijderen?') ? document.getElementById('delete-form').submit() : ''">Delete Tournament</button>
        </div>

        <form action="{{ route('tournament.update', $tournament->id) }}" method="POST" class="mb-4">
            @csrf
            @method('PATCH')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ $tournament->name }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <input type="text" name="location" id="location" value="{{ $tournament->location }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="date" name="date" id="date" value="{{ $tournament->date }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Tournament</button>
        </form>

        <form id="delete-form" action="{{ route('tournament.destroy', $tournament->id) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>

        <div class="mb-4">
            <h2 class="text-xl font-bold mb-2">Teams</h2>
            <ul>
                @if(!empty($tournament->teams) && is_array($tournament->teams))
                    @foreach($tournament->teams as $teamId)
                        <li>{{ \App\Models\Team::find($teamId)->teamname }}</li>
                    @endforeach
                @else
                    <li>No teams available</li>
                @endif
            </ul>
        </div>

        <button class="bg-green-500 text-white px-4 py-2 rounded" onclick="generateBracket()">Generate Bracket</button>
    </div>
</x-base-layout>
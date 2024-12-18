<x-base-layout>
    <body class="bg-E1E5F2 min-h-screen flex flex-col">
        <main class="flex-grow flex items-center justify-center p-4">
            <div class="bg-white shadow-md rounded-lg p-6 max-w-4xl w-full">
            <h1 class="text-2xl font-bold mb-4 text-022B3A">Speler aanmelden</h1>

            <form class="grid grid-cols-1 md:grid-cols-2 gap-4" action="{{ route('addMember') }}" method="POST">
                @csrf
                <div class="space-y-4">
                {{-- <div>
                    <label for="tournament" class="block text-sm font-medium text-022B3A">Tournament:</label>
                    <select id="tournament" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    <option>Select Tournament</option>
                    </select>
                </div> --}}

                {{-- <div>
                    <label for="coach-name" class="block text-sm font-medium text-022B3A">Coachnaam:</label>
                    <input type="text" id="coach-name" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div> --}}

                <div>
                    <label for="name" class="block text-sm font-medium text-022B3A">Naam speler:</label>
                    <input type="text" id="name" name="name" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>
                <div>
                    <input name="team_id" value="{{ $selectedTeam }}" type="hidden" />
                </div>


                {{-- <div>
                    <label for="team-members" class="block text-sm font-medium text-022B3A">Teamleden:</label>
                    <textarea id="team-members" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></textarea>
                </div> --}}

                {{-- <div>
                    <label for="team-logo-url" class="block text-sm font-medium text-022B3A">Teamlogo:</label>
                    <input type="text" id="team-logo-url" placeholder="Enter logo URL" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>
                </div> --}}

                {{-- <div class="flex flex-col items-center">
                <label class="block text-sm font-medium text-022B3A mb-2">Teamlogo:</label>
                <div class="w-32 h-32 border-2 border-dashed border-gray-300 rounded-md flex items-center justify-center">
                    <span class="text-sm text-gray-500">Preview</span>
                </div>
                </div> --}}
                <input type="submit">
                {{-- <button type="submit" class="bg-022B3A text-white font-medium px-4 py-2 rounded-md hover:bg-1F7A8C">Aanmelden</button> --}}
            </form>
            <div class="mt-6 flex justify-end space-x-4">
                <button type="button" class="bg-BFDBF7 text-022B3A font-medium px-4 py-2 rounded-md hover:bg-1F7A8C hover:text-white">Annuleren</button>

            </div>
            </div>

        </main>
    </body>
</x-base-layout>

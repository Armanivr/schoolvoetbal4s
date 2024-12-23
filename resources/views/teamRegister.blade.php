<x-base-layout>
    <body class="bg-E1E5F2 min-h-screen flex flex-col">
        <main class="flex-grow flex items-center justify-center p-4">
            <div class="bg-white shadow-md rounded-lg p-6 max-w-4xl w-full">
                <h1 class="text-2xl font-bold mb-4 text-022B3A">Team aanmelden</h1>

                <form action="{{ route('team.register') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="tournament" class="block text-sm font-medium text-022B3A">Tournament:</label>
                            <select id="tournament" name="tournament" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                <option>Select Tournament</option>
                                @foreach($tournaments as $tournament)
                                    <option value="{{ $tournament->id }}">{{ $tournament->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="team-name" class="block text-sm font-medium text-022B3A">Teamnaam:</label>
                            <input type="text" id="team-name" name="team_name" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>

                        <div>
                            <label for="team-logo" class="block text-sm font-medium text-022B3A">Teamlogo:</label>
                            <input type="file" id="team-logo" name="team_logo" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>
                    </div>

                    <div class="flex flex-col items-center">
                        <label class="block text-sm font-medium text-022B3A mb-2">Teamlogo:</label>
                        <div class="w-32 h-32 border-2 border-dashed border-gray-300 rounded-md flex items-center justify-center">
                            <img id="preview" class="w-32 h-32 object-cover rounded-md" src="#" alt="Team Logo" style="display: none;">
                            <span id="no-image-text" class="text-sm text-gray-500">Preview</span>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-evenly">
                        <a href="javascript: history.go(-1)" class="bg-BFDBF7 text-022B3A font-medium px-4 py-2 rounded-md hover:bg-1F7A8C hover:underline">Annuleren</a>
                        <button type="submit" class="bg-022B3A text-black font-medium px-4 py-2 rounded-md hover:bg-1F7A8C hover:underline">Aanmelden</button>
                    </div>
                </form>
            </div>

        </main>

        <script>
            document.getElementById('team-logo').addEventListener('change', function() {
                const preview = document.getElementById('preview');
                const noImageText = document.getElementById('no-image-text');
                if (this.files && this.files[0]) {
                    preview.src = window.URL.createObjectURL(this.files[0]);
                    preview.style.display = 'block';
                    noImageText.style.display = 'none';
                } else {
                    preview.style.display = 'none';
                    noImageText.style.display = 'block';
                }
            });
        </script>
    </body>
</x-base-layout>

<x-base-layout>
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center mb-4">
                <img src="{{ Auth::user()->team->logo }}" alt="Team Logo" class="w-16 h-16 rounded-full mr-4">
                <div>
                    <h1 class="text-2xl font-bold">{{ Auth::user()->team->name }}</h1>
                    <p class="text-gray-600">Coach: {{ Auth::user()->team->coach }}</p>
                </div>
            </div>
            <div class="mt-4">
                <h2 class="text-xl font-semibold">Update Team Information</h2>
                <form action="{{ route('team.update', Auth::user()->team->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Team Name</label>
                        <input type="text" name="name" id="name" value="{{ Auth::user()->team->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="coach" class="block text-gray-700">Coach</label>
                        <input type="text" name="coach" id="coach" value="{{ Auth::user()->team->coach }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="goals" class="block text-gray-700">Goals</label>
                        <input type="number" name="goals" id="goals" value="{{ Auth::user()->team->goals }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="logo" class="block text-gray-700">Team Logo</label>
                        <input type="file" name="logo" id="logo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Update Information
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-base-layout>

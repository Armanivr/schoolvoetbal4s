<x-base-layout>
    <x-back-button />
    <div class="bg-white p-4 rounded shadow mx-auto" style="width: 80%; border: 1px solid #d3d3d3;">
        @foreach($tournaments as $tournament)
            @if($tournament->admin == auth()->user()->id)
                <a href="{{ route('tournament.show', $tournament->id) }}" class="text-black hover:underline underline">{{ $tournament->name }}</a><br>
            @endif
        @endforeach
    </div>
</x-base-layout>
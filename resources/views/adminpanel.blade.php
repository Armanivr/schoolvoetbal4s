<x-base-layout>
    <x-back-button></x-back-button>
    <div class="max-w-4/5 mx-auto flex flex-col items-center">
        @php
            $user = Auth::user();
        @endphp

        @if($user && $user->is_admin == 1)
            <a href="{{ route('tournament.create') }}" class="my-2 text-black font-bold hover:underline">Maak Tournamenten</a>
            <a href="{{ route('tournament.manage')}}" class="my-2 text-black font-bold hover:underline">Beheer Tournamenten</a>
        @endif

        <a href="{{ route('team.show') }}" class="my-2 text-black font-bold hover:underline">Beheer je Team</a>
    </div>
</x-base-layout>

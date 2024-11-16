<x-base-layout>
<form action="{{ route('UpdateGoal') }}" method="POST">
@csrf
<input type="hidden" name="id" value="{{ $goal->id }}">
<input type="submit">
</form>
</x-base-layout>

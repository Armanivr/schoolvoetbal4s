<x-base-layout>
    <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="name">name</label>
            <input type="text" name="name">
            <label for="password">password</label>
            <input type="text" name="password">
            <input type="submit">
    </form>
</x-base-layout>

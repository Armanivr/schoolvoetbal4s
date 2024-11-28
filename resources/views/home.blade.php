<x-base-layouts>
<main>
<div>
    <div>
        <h2>Wedstrijden</h2>
        <div>
            <div>
                <div>
                    <img src="{{ $recentMatch->teams[0]->image }}" alt="{{ $recentMatch->teams[0]->name }}">
                    <p>{{ $recentMatch->teams[0]->name }}</p>
                </div>
                <p>VS</p>
                <div>
                    <img src="{{ $recentMatch->teams[1]->image }}" alt="{{ $recentMatch->teams[1]->name }}">
                    <p>{{ $recentMatch->teams[1]->name }}</p>
                </div>
            </div>
        </div>
        <a href="">Bekijk wedstrijden</a>
    </div>

    <div>
        <table>
            <th>
                <tr>Team1</tr>
                <tr>VS</tr>
                <tr>Team2</tr>
            </th>
            <!-- making a foreachloop -->
            @foreach ($matches as $match)
            <td>
                <tr>{{ $match->teams[0]->name }}</tr>
                <tr>VS</tr>
                <tr>{{ $match->teams[1]->name }}</tr>
            </td>
            @endforeach

        </table>
    </div>
</div>
</main>
</x-base-layouts>

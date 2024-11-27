<x-base-layouts>
<main>
<div>
    <div>
        <h2>Wedstrijden</h2>
        <div>
<div>
<img src="" alt="">
<p></p>
</div>
<p>VS</p>
<div>
<img src="" alt="">
<p></p>
</div>
        </div>
        <a href="">Bekijk wedstrijden</a>
    </div>

    <div>
        <table>
            <th>
                <tr>Team1</tr>
                <tr>Team2</tr>
            </th>
            <!-- making a foreachloop -->
            @foreach ($matches as $match)
            <td>
                <tr>{{ $match->teams[0]->name }}</tr>
                <tr>{{ $match->teams[1]->name }}</tr>
            </td>
            @endforeach

        </table>
    </div>
</div>
</main>
</x-base-layouts>

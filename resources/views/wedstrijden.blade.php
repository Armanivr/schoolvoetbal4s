<x-base-layouts>
    <main>
    <div>
        <a href="">Terug</a>
        <h1>Speelschema</h1>
        <div>
            <table>
                <th>
                    <tr>Team1</tr>
                    <tr>Team2</tr>
                </th>
                <!-- making a foreachloop -->
                @foreach ($games as $game)
                <td>
                    <tr>{{ $game['team1'] }} VS </tr>
                    <tr> {{ $game['team2'] }}</tr>
                </td>
                @endforeach

            </table>
        </div>
        <div>
            <h3>Huidige wedstrijd</h3>
            <p>Teamnaam</p>
            <p>Teamnaam</p>
            <div>
                <p>Scheidsrechter: </p>
                <p>Administrator: </p>
            </div>
        </div>
    </div>
    </main>
    </x-base-layouts>

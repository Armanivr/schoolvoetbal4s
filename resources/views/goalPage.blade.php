<x-base-layout>
    <table>
        <th>
            <tr>Team</tr>
            <tr>Goals</tr>
            <tr>edit</tr>
        </th>
        @foreach ($goals as $goal)
        <td>
            <tr>{{ $goal['team'] }}</tr>
            <tr>{{ $goal['goalScore'] }}</tr>
            <tr><a href="{{ route('addPage', ['goal', $goal]) }}"></a></tr>
        </td>
        @endforeach
    </table>
</x-base-layout>

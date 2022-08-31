<div class="bg-gray-100 mb-5 shadow-md">
    <div class="bg-red-700 p-2 text-white">Last match</div>
    <div class="p-2">
        @foreach($last_match as $last)
            <p>{{ $last->home }} v {{ $last->away }}</p>
            <p>{{ $last->home_goals }}-{{ $last->away_goals }}</p>
        @endforeach
    </div>
</div>

<div class="bg-gray-100 mb-5 shadow-md">
    <div class="bg-red-700 p-2 text-white">Next matches</div>
    <div class="p-2">
        @foreach($matches as $match)
            <p>{{ substr($match->date, 8, 3) }}.{{ substr($match->date, 5, 2) }} | {{ substr($match->hour, 0, 5) }} | {{ $match->game }} | {{ $match->home }} vs {{ $match->away }}</p>
        @endforeach
    </div>
</div>

<div class="bg-gray-100 mb-5 rounded-md shadow-md">
    <div class="bg-red-700 p-2 text-white">Table</div>
    <div class="p-2">
        <table class="sidebar__table">
            <thead>
            <tr>
                <td>P</td>
                <td>Team</td>
                <td>M</td>
                <td>Pts</td>
                <td>Goals</td>
                <td>W</td>
                <td>D</td>
                <td>L</td>
            </tr>
            </thead>
            <tbody>
            @foreach($table as $t)
                <tr>
                    <td>{{ $t->id }}</td>
                    <td>{{ $t->team }}</td>
                    <td>{{ $t->matches }}</td>
                    <td>{{ $t->points }}</td>
                    <td>{{ $t->goals }}</td>
                    <td>{{ $t->wins }}</td>
                    <td>{{ $t->draws }}</td>
                    <td>{{ $t->loses }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
            <p class="text-center pt-5">
                <a href="{{ route('table.index') }}">Show full table</a>
            </p>
    </div>
</div>

<div class="bg-gray-100 mb-5 shadow-md">
    <div class="bg-red-700 p-2 text-white">Last round</div>
    <div class="p-2">
        @foreach($round as $r)
            <p>{{ $r->home_team }} {{ $r->home_goals }} - {{ $r->away_goals }} {{ $r->away_team }}</p>
        @endforeach
    </div>
</div>

<div class="bg-gray-100 mb-5 shadow-md">
    <div class="bg-red-700 p-2 text-white">Fun facts</div>
    <div class="p-2">
        @if($fact)
            <p>{{ $fact->content }}</p>
        @endif
    </div>
</div>


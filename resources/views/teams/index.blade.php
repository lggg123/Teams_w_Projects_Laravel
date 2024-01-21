<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<body class="bg-gray-100 p-8">
    <h1 class="text-2xl font-bold mb-4">Teams</h1>
        <ul class="grid gap-4 grid-cols-1 mg:grid-cols-2 lg:grid-cols-3">
            @foreach ($teams as $team)
                <li class="bg-white p-4 rounded shadow-md">{{ $team->name }}</li>

                <a href="{{ route('teams.show', ['team' => $team->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-fill mr-2">
                    View
                </a>

                <a href="{{ route('teams.edit', ['team' => $team->id] )}}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-full mr-2">
                    Edit
                </a>

                <form action="{{ route('teams.destroy', ['team' => $team->id]) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                        Delete
                    </button>
                </form>
            @endforeach
        </ul>
    </body>
</html>
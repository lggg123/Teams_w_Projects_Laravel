<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>
        .action-buttons {
            display: flex;
        }

        .action-buttons a,
        .action-buttons button {
            margin-right: 10px;
        }
    </style>
</head>
<h1>Member</h1>
<table>
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($members as $member)
            <tr>
                <td>{{ $member->first_name }}</td>
                <td>{{ $member->last_name }}</td>
                <td>{{ $member->city }}</td>
                <td>{{ $member->state }}</td>
                <td>{{ $member->country }}</td>
                <td class="action-buttons">
                    <a href="{{ route('members.show', ['member' => $member->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-fill mr-2">
                        View
                    </a>
                
                    <a href="{{ route('members.edit', ['member' => $member->id] )}}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-full mr-2">
                        Edit
                    </a>

                    <a href="{{ url("/members/{$member->id}/update-team") }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full mr-2">
                        Update Team
                    </a>
                
                    <form action="{{ route('members.destroy', ['member' => $member->id]) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>

   
</table>
</html>
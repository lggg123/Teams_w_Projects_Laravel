<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <form action="{{ route('members.updateTeam', $member) }}" method="POST">
        @csrf
        @method('PUT')
        <select name="team_id">
            @foreach ($teams as $team)
                <option value="{{ $team->id }}" {{ $member->team_id == $team->id ? 'selected': '' }}>
                    {{ $team->name }}
                </option>
            @endforeach
        </select>
        <button type="submit">Update Team</button>
    </form>
</html>
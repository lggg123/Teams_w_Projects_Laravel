<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <form method="POST" action="{{ url("/members/{$member}/update-team") }}">
        @csrf
        @method('PUT')
    
        <!-- Team selection dropdown -->
        <label for="team_id">Select Team:</label>
        <select id="team_id" name="team_id">
            <!-- Populate this dropdown with teams from your database -->
            @foreach($teams as $team)
                <option value="{{ $team->id }}">{{ $team->name }}</option>
            @endforeach
        </select>
    
        <!-- Add other form fields as needed -->
    
        <button type="submit">Update Team</button>
    </form>
</html>
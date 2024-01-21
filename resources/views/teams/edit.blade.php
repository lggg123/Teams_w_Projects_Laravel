<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <form action="{{ route('teams.update', $team) }}" method="POST">
        @csrf
        @method('PUT')

            <div class="mb-4">
                <label for="team_name" class="block text-sm font-medium text-gray-600">Team Name</label>
                <input type="text" name="name" id="team_name" class="form-input mt-1 block w-full" value="{{ $team->name }}" required>
            </div>
        <button type="submit">Update Team</button>
    </form>
</html>
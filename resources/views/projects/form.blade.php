<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <form action="{{ isset($team) ? route('teams.update', $team) : route('teams.store') }}" method="post">
        @csrf
        @if(isset($team))
            @method('put')
        @endif

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ isset($team) ? $team->name: ''}}" required>

        <button type="submit">{{ isset($team) ? 'Update Project' : 'Create Project'}}
    </form>
</html>
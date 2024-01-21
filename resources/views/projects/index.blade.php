<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<h1>Teams</h1>
<ul>
    @foreach ($projects as $project)
        <li>{{ $project->name }}</li>
    @endforeach
</ul>
</html>
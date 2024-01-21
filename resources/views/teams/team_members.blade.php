<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <h1>Team Members</h1>
    <a href="{{ url("/teams/{$team}/members") }}">View Members of this Team</a>
</html>
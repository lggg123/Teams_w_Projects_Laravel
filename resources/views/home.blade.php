<!DOCTYPE html>
<html>
<head>
    <title>Your App</title>
</head>
<body>
    <h1>Welcome to Your App</h1>
    <p>Explore teams, projects, and members:</p>
    <ul>
        <li><a href="{{ route('teams.index') }}">Teams</a></li>
        <li><a href="{{ route('projects.index') }}">Projects</a></li>
        <li><a href="{{ route('members.index') }}">Members</a></li>
    </ul>
</body>
</html>
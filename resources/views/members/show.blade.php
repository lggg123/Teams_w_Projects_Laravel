<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <h1>Member Details</h1>
    <table>
        <tr>
            <th>First Name</th>
            <td>{{ $member->first_name }}</td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td>{{ $member->last_name }}</td>
        </tr>
        <tr>
            <th>City</th>
            <td>{{ $member->city }}</td>
        </tr>
        <tr>
            <th>State</th>
            <td>{{ $member->state }}</td>
        </tr>
        <tr>
            <th>Country</th>
            <td>{{ $member->country }}</td>
        </tr>
    </table>
</html>
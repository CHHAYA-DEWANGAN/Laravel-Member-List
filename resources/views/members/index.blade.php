<!DOCTYPE html>
<html>
<head>
    <title>Members</title>
</head>
<body>
    <h1>Members List</h1>
    <ul>
        @foreach ($tree as $member)
            @include('members.partials.member', ['member' => $member])
        @endforeach
    </ul>


    @extends('layouts.index')

</body>
</html>

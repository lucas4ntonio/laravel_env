<html>
    <head>
        <title>View Student Records</title>
    </head>
    <body>
        <table border="1">
                <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Edit</td>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td><a href='student_editing/{{ $user->id }}'>Edit</a></td>
            </tr>
            @endforeach
        </table>
    </body>
</html>
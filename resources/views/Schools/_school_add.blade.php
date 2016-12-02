<html>
    <body>
        <a href="/student_add">Students.</a><br/><br/>
        @if (count($schools) > 0)
        <table border="1" cellpadding="10">
            <tr>
                <th colspan="4">Schools:</th>
            </tr>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th></th>
            </tr>
            @foreach ($schools as $school)
                <tr>
                    <td>{{ $school->id }}</td>
                    <td>{{ $school->name }}</td>
                    <td>{{ $school->location }}</td>
                    <td>
                        <a href="school_edit/{{ $school->id }}" title="Edit">E</a>
                        <a href="school_add/{{ $school->id }}" title="Delete" onclick="return confirm('Are you sure?');">D</a>
                    </td>
                </tr>
            @endforeach
        </table>
        @endif
        
        <br/><br/>
        <form action="/school_add" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <table border="1" cellpadding="10">
                <tr>
                    <th colspan="3">New school:</th>
                </tr>
                <tr>
                    <th><label>Name:</label></th>
                    <td><input type="text" name="name"/></td>
                    <td rowspan="2"><input type="submit" value="+ ADD"/></td>
                </tr>
                <tr>
                    <th>Location:</th>
                    <td><input type="text" name="location"/></td>
                </tr>
            </table>
        </form>
        
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif      
        
    </body>
</html>
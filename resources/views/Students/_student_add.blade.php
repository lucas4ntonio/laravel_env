<html>
    <body>        
        <a href="/school_add">Schools.</a><br/><br/>
        @if (count($students) > 0)
        <table border="1" cellpadding="10">
            <tr>
                <th colspan="6">Students:</th>
            </tr>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>School</th>
                <th></th>
            </tr>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->school->name }}</td>
                    <td>
                        <a href="student_edit/{{ $student->id }}" title="Edit">E</a>
                        <a href="student_add/{{ $student->id }}" title="Delete" onclick="return confirm('Are you sure?');">D</a>
                    </td>
                </tr>
            @endforeach
        </table>
        @endif
        
        <br/><br/>
        <form action="/student_add" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <table border="1" cellpadding="10">
                <tr>
                    <th colspan="3">New student:</th>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td><input type="text" name="name"/></td>
                    <td rowspan="4"><input type="submit" value="+ ADD"/></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><input type="email" name="email"/></td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td><input type="text" name="phone"/></td>
                </tr>
                <tr>
                    <th>School:</th>
                    <td>
                        <select name="school">
                            <option value="">School</option>
                            @foreach ($schools as $school)
                            <option value="{{ $school->id }}">{{ $school->name }}</option>
                            @endforeach
                        </select>
                    </td>
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
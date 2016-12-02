<html>
    <body>
        <a href="/student_add">Click here to go back.</a><br/><br/>
        <table border="1" cellpadding="10">
            <form method="post" action="/student_edit/{{ $id }}">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name" value="{{ $name }}"/></td>
                    <td rowspan="4"><input type="submit" value="SAVE"/></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" value="{{ $email }}"/></td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td><input type="text" name="phone" value="{{ $phone }}"/></td>
                </tr>
                <tr>
                    <td>School:</td>
                    <td>
                        <select name="school">
                            <option value="">School</option>
                            @foreach ($schools as $school)
                            <option value="{{ $school->id }}" 
                                    @if ($school->id==$school_id) 
                                        selected 
                                    @endif
                            >
                                {{ $school->name }}
                            </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </form>
        </table>
        
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
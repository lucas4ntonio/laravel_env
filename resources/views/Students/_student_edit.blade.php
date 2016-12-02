<html>
    <body>
        <a href="/student_add">Click here to go back.</a><br/><br/>
        <table border="1" cellpadding="10">
            <form method="post" action="/student_edit/{{ $id }}">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name" value="{{ $name }}"/></td>
                    <td><input type="submit" value="SAVE"/></td>
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
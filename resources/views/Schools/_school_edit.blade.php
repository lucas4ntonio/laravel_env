<html>
    <body>
        <a href="/school_add">Click here to go back.</a><br/><br/>
        <table border="1" cellpadding="10">
            <form method="post" action="/school_edit/{{ $id }}">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <tr>
                    <th colspan="3">Edit school:</th>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td><input type="text" name="name" value="{{ $name }}"/></td>
                    <td rowspan="2"><input type="submit" value="SAVE"/></td>
                </tr>
                <tr>
                    <th>Location:</th>
                    <td><input type="text" name="location" value="{{ $location }}"/></td>
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
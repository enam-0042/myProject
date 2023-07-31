<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
    </head>

    <body>
        <div>
            <form action="{{ route('login-user') }}" method="post">
                @if(Session::has('success'))
                <div>{{Session::get('success')}}</div>
                @elseif(Session::has('fail'))
                <div>{{Session::get('fail')}}</div>
                @endif @csrf

                <label for="email"> Email:</label><br />
                <input
                    type="text"
                    name="email"
                    value="{{ old('email') }}"
                /><br />
                <span> @error('email') {{ $message }} @enderror</span>

                <label for="password"> Password:</label><br />
                <input type="password" name="password" value="" /><br />
                <button type="submit">Log In</button><br />

                <a href="registration"> Goto log in </a>
            </form>
        </div>
    </body>
</html>

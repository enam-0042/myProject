<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>log in</title>
    </head>

    <body>
        <div>
            <form action="{{ route('register-user') }}" method="post">
                <div>
                    <h1>
                        Registration
                    </h1>
                    @if(Session::has('success'))
                    <div>{{Session::get('success')}}</div>
                    @elseif(Session::has('fail'))
                    <div>{{Session::get('fail')}}</div>
                    @endif
                </div>
                @csrf
                <label for="name">Full Name:</label><br />
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                /><br />
                <span> @error('name') {{ $message }} @enderror</span> <br />
                <label for="email"> Email:</label><br />
                <input
                    type="text"
                    name="email"
                    value="{{ old('email') }}"
                /><br />
                <span> @error('email') {{ $message }} @enderror</span> <br />

                <label for="password"> Password:</label><br />
                <input type="password" name="password" value="" /><br />
                <span> @error('password'){{ $message }} @enderror</span> <br />

                <label for="password1"> Repeat Password:</label><br />
                <input type="password" name="password1" value="" /><br />
                <span> @error('password1'){{ $message }} @enderror</span> <br />

                <button type="submit">Register</button> <br />
                <a href="login"> Log in Here</a>
            </form>
        </div>
    </body>
</html>

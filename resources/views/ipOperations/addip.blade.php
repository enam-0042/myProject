<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Add a new IP address</title>
    </head>

    <body>
        <div>
            <h1>Add a new IP address,</h1>
        </div>
        <form action="{{ route('addip') }}" method="post">
            @if(Session::has('fail'))
            <div>
                {{ Session::get('fail')}}
            </div>
            @elseif(Session::has('success'))
            <div>
                {{ Session::get('success')}}
            </div>
            @endif
            @csrf
            <div>
                <label for="ipadd"> IP Address:</label><br />
                <input
                    type="text"
                    name="ipadd"
                    value="{{ old('ipadd') }}"
                /><br />
                <span> @error('ipadd') {{ $message }} @enderror</span>
            </div>
            <div>
                <label for="label"> Label on this IP</label><br />
                <input
                    type="text"
                    name="label"
                    value="{{ old('label') }}"
                /><br />
                <span> @error('label') {{ $message }} @enderror</span>
            </div>
            <button type="submit">Add this IP</button><br />
        </form>
        <div>
            <a href="/home"> 
                <button>
                    Home
                </button>
            </a>
        </div>
        <div>
            <a href="/logout"> 
                <button>
                    Log Out
                </button>
            </a>
        </div>
    </body>
</html>

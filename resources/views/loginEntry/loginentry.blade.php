<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Login entries</title>
</head>

<body>
    <div>
        <h1>
            @if(Session::has('success'))
            <div>{{Session::get('success')}}</div>

            @endif
        </h1>

    </div>

    <table>
        <div>
            <tr>
                <td>
                    id
                </td>
                <td>
                    Email
                </td>
                <td>
                    Logged in at
                </td>
            </tr>
        </div>

        @foreach ($data as $datum)
        <tr>
            <td>
                {{$datum['id']}}
            </td>
            <td>
                {{$datum['email']}}
            </td>
            <td>
                {{$datum['created_at']}}
            </td>

        </tr>
        @endforeach
    </table>
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
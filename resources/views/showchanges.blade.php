<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changes are showing</title>
</head>
<body>
    <table>
        <div>
            <tr>
                <td>
                    IP Address
                </td>
                <td>
                    Label
                </td>
                <td>
                    Changed at
                </td>
            </tr>
        </div>

        @foreach ($changes as $change)
        <tr>
            <td>
                {{$change['ipaddress']}}
            </td>
            <td>
                {{$change['labels']}}
            </td>
            <td>
                {{$change['created_at']}}
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
                Logout
            </button>
        </a>
    </div>
</body>
</html>
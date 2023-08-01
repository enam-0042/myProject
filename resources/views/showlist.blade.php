<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Here is List of IP and label</title>
</head>

<body>
    <div>
        <h1>
              @if(Session::has('success'))
        <div>{{Session::get('success')}}</div>
        @else
            <div>
                List is showing with label
            </div>
        @endif
        </h1>
       
    </div>

    <table>
        <div>
            <tr>
                <td>
                    IP Address
                </td>
                <td>
                    Label
                </td>
            </tr>
        </div>

        @foreach ($iplists as $ip)
        <tr>
            <td>
                {{$ip['ipaddress']}}
            </td>
            <td>
                {{$ip['labels']}}
            </td>
            <td>
                <a href="{{ url('changeip',['id' => $ip->id])  }}">Update label</a>
            </td>
        </tr>
        @endforeach
    </table>
    <a href="home"> Goto Home Page </a>
</body>

</html>
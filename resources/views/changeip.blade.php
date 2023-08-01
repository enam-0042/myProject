<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Add a new IP address</title>
    </head>

    <body>
        <div>
            <h1>Change a label</h1>
        </div>
        <form action="{{ url('updatelabel',['id' => $ipadd->id])  }}" method="post">
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
            {{ method_field('PUT')}}
            <div>
                <h1>
                    {{$ipadd['ipaddress']}}
                </h1>
            </div>
            <div>
                <label for="labels"> New label for this ip</label><br />
                <input
                    type="text"
                    name="labels"
                    value=""
                /><br />
                <span> @error('labels') {{ $message }} @enderror</span>
            </div>
            <button type="submit">Update label</button><br />
        </form>
        <!-- <div>
            <a href="home"> Goto Home Page </a>
        </div> -->
    </body>
</html>

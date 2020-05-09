<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Index</title>
    </head>
    <body>
        <ul>
           @foreach ($names as $name)
                <li>{{$name}}</li>
            @endforeach
        </ul>
    </body>
</html>

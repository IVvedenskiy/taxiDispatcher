<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dispatcher</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<h3 class="card-header text-center text-white bg-info">Таблица со всеми водителями</h3>
<table class="table table-hover table-bordered">
    <thead class="bg-danger text-center text-light">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Full name</th>
        <th scope="col">Call sign</th>
        <th scope="col">Phone number</th>
        <th scope="col">Status</th>
        <th scope="col">Car</th>
    </tr>
    </thead>
    <tbody>
    @foreach($taxiDriver as $driver)
        <tr>
            <td>{{$driver->id}}</td>
            <td>{{$driver->fullName}}</td>
            <td>{{$driver->callSign}}</td>
            <td>{{$driver->phoneNumber}}</td>
            <td>{{$driver->status}}</td>
            <td>{{$driver->car}}</td>
        </tr>
    @endforeach
    </tbody>
</table>


<div class="mt-5">
    <div class="float-right mr-2">
        <button type="submit" class="btn btn-danger"  onclick="location.href='{{ url('home') }}'">
            {{ __('Home') }}
        </button>
    </div>
    <div class="float-left ml-2">
        <button type="submit" class="btn btn-danger"  onclick="location.href='{{ url('pdf') }}'">
            {{ __('Create PDF') }}
        </button>
    </div>
</div>
</body>
</html>

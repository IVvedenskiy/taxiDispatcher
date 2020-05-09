<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dispatcher</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="sidebar.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
</head>
<body>

<div class="wrapper">
    <nav id="sidebar">
        @yield('content')
    </nav>

    <div id="content">
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
                <button type="submit" class="btn btn-danger" onclick="location.href='{{ url('home') }}'">
                    {{ __('Home') }}
                </button>
            </div>
            <div class="float-left ml-2">
                <button type="submit" class="btn btn-danger" onclick="location.href='{{ url('pdf') }}'">
                    {{ __('Create PDF') }}
                </button>
            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
</body>
</html>

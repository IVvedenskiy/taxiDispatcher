<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-grid.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-reboot.min.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
</head>
<body class="bg-dark">

<div class="bg-dark row m-0">
    {{--    aside--}}
    <div class="bg-dark col-1">
        <div class="dropdown btn-group dropright mt-5 d-flex justify-content-center">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                Показать...
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="{{ url('admin-orders') }}">Заказы</a>
                <a class="dropdown-item" href="{{ url('admin-drivers') }}">Водители</a>
                <a class="dropdown-item" href="{{ url('admin-clients') }}">Клиенты</a>
                <a class="dropdown-item" href="{{ url('admin-cars') }}">Машины</a>
                <a class="dropdown-item" href="{{ url('admin-medInspections') }}">Медосмотр</a>
                <a class="dropdown-item" href="{{ url('admin-techInspections') }}">Техосмотр</a>
                <a class="dropdown-item" href="{{ url('admin-driversWorkingDays') }}">Выходы водителей</a>
                <a class="dropdown-item" href="{{ url('admin-holidays') }}">Праздник</a>
            </div>
        </div>
        <div class="mt-5 d-flex justify-content-center">
            <button type="button" class="btn btn-rounded btn-danger" onclick="location.href='{{ url('admin-map') }}'">Карта
            </button>
        </div>
        <div class="mt-5 d-flex justify-content-center">
            <button type="button" class="btn btn-danger" onclick="location.href='{{ url('admin-orders') }}'">Заказы
            </button>
        </div>
        <div class="mt-5 d-flex justify-content-center">
            <button type="button" class="btn btn-danger" onclick="location.href='{{ url('admin-report') }}'">Отчеты</button>
        </div>
        <div class="mt-5 mb-4 d-flex justify-content-center">
            <button type="button" class="btn btn-danger">Статистика</button>
        </div>
        <div class="mt-5 d-flex justify-content-center">
            <button type="button" class="btn btn-info" onclick="location.href='{{ url('/home') }}'">Home</button>
        </div>
    </div>
    {{--    content--}}
    <div class="col-11 bg-light p-0">
        <h3 class="card-header text-center text-white bg-dark p-2">Таблица с водителями</h3>
        <table class="table table-hover table-bordered">
            <thead class="bg-danger text-center text-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Позывной</th>
                <th scope="col">Номер телефона</th>
                <th scope="col">Статус</th>
                <th scope="col">Номер машины</th>
            </tr>
            </thead>
            <tbody>
            @foreach($taxiDrivers as $driver)
                <tr>
                    <td>{{$driver->id}}</td>
                    <td>{{$driver->firstName}}</td>
                    <td>{{$driver->lastName}}</td>
                    <td>{{$driver->callSign}}</td>
                    <td>{{$driver->phoneNumber}}</td>
                    <td>{{$driver->status}}</td>
                    @foreach($cars as $car)
                        @if($car->id == $driver->car_id)
                            <td>{{$car->number}}</td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
</body>
</html>

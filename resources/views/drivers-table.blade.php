<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dispatcher</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>

<div class="bg-dark row m-0">

    <div class="bg-dark col-1">
        <div class="mt-5 d-flex justify-content-center">
            <button type="button" class="btn btn-rounded btn-danger"
                    onclick="location.href='{{ url('create-order') }}'">Создать заказ
            </button>
        </div>
        <div class="mt-5 d-flex justify-content-center">
            <button type="button" class="btn btn-rounded btn-danger">Карта</button>
        </div>
        <div class="mt-5 d-flex justify-content-center">
            <button type="button" class="btn btn-danger">Заказы</button>
        </div>
        <div class="mt-5 d-flex justify-content-center">
            <button type="submit" class="btn btn-danger" onclick="location.href='{{ url('drivers-table') }}'">Водители
            </button>
        </div>
        <div class="mt-5 d-flex justify-content-center">
            <button type="button" class="btn btn-danger">Клиенты</button>
        </div>
        <div class="mt-5 d-flex justify-content-center">
            <button type="button" class="btn btn-danger">Info</button>
        </div>
        <div class="mt-5 d-flex justify-content-center">
            <button type="button" class="btn btn-danger">Отчеты</button>
        </div>
        <div class="mt-5 mb-4 d-flex justify-content-center">
            <button type="button" class="btn btn-danger">Статистика</button>
        </div>
    </div>

    <div class="col-11 bg-light p-0">
        <h3 class="card-header text-center text-white bg-info">Таблица со всеми водителями</h3>
        <table class="table table-hover table-bordered">
            <thead class="bg-danger text-center text-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Call sign</th>
                <th scope="col">Phone number</th>
                <th scope="col">Status</th>
                <th scope="col">Car</th>
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
                    <td>{{$driver->car_id}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-5">
            <div class="float-right">
                <button type="submit" class="btn btn-danger" onclick="location.href='{{ url('home') }}'">
                    {{ __('Home') }}
                </button>
            </div>
            <div class="float-left">
                <button type="submit" class="btn btn-danger" onclick="location.href='{{ url('pdf') }}'">
                    {{ __('Create PDF') }}
                </button>
            </div>
        </div>
    </div>

</div>
</body>
</html>

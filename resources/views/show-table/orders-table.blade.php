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
    <link href="{{ asset('css/bootstrap-grid.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-reboot.min.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

<div class="bg-dark row m-0">
    {{--    aside--}}
    <div class="bg-dark col-1">
        <div class="mt-5 d-flex justify-content-center">
            <button type="button" class="btn btn-rounded btn-danger"
                    onclick="location.href='{{ url('create-order') }}'">Создать заказ
            </button>
        </div>
        <div class="dropdown btn-group dropright mt-5 d-flex justify-content-center">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                Создать...
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="{{ url('create-order') }}">Заказ</a>
                <a class="dropdown-item" href="{{ url('create-car') }}">Машину</a>
                <a class="dropdown-item" href="{{ url('create-client') }}">Клиента</a>
                <a class="dropdown-item" href="{{ url('create-driver') }}">Водителя</a>
                <a class="dropdown-item" href="{{ url('create-medInspections') }}">Медосмотр</a>
                <a class="dropdown-item" href="{{ url('create-techInspections') }}">Техосмотр</a>
                <a class="dropdown-item" href="{{ url('create-driversWorkingDays') }}">Выходы водителей</a>
                <a class="dropdown-item" href="{{ url('create-holiday') }}">Праздник</a>
            </div>
        </div>
        <div class="dropdown btn-group dropright mt-5 d-flex justify-content-center">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                Показать...
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="{{ url('orders-table') }}">Заказы</a>
                <a class="dropdown-item" href="{{ url('drivers-table') }}">Водители</a>
                <a class="dropdown-item" href="{{ url('clients-table') }}">Клиенты</a>
                <a class="dropdown-item" href="{{ url('cars-table') }}">Машины</a>
                <a class="dropdown-item" href="{{ url('medInspections-table') }}">Медосмотр</a>
                <a class="dropdown-item" href="{{ url('techInspections-table') }}">Техосмотр</a>
                <a class="dropdown-item" href="{{ url('driversWorkingDays-table') }}">Выходы водителей</a>
                <a class="dropdown-item" href="{{ url('holidays-table') }}">Праздник</a>
            </div>
        </div>
        <div class="mt-5 d-flex justify-content-center">
            <button type="button" class="btn btn-rounded btn-danger" onclick="location.href='{{ url('map') }}'">Карта
            </button>
        </div>
        <div class="mt-5 d-flex justify-content-center">
            <button type="button" class="btn btn-danger" onclick="location.href='{{ url('orders-table') }}'">Заказы
            </button>
        </div>
        <div class="mt-5 d-flex justify-content-center">
            <button type="button" class="btn btn-danger" onclick="location.href='{{ url('report') }}'">Отчеты</button>
        </div>
        <div class="mt-5 mb-4 d-flex justify-content-center">
            <button type="button" class="btn btn-danger" onclick="location.href='{{ url('statistic') }}'">Статистика</button>
        </div>
        <div class="mt-5 d-flex justify-content-center">
            <button type="button" class="btn btn-info" onclick="location.href='{{ url('/home') }}'">Home</button>
        </div>
    </div>
    {{--    content--}}
    <div class="col-xl-11 bg-light p-0">
        <h3 class="card-header text-center text-white bg-info">Таблица заказов</h3>
        <table class="table table-hover table-bordered">
            <thead class="bg-danger text-center text-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Адрес начала</th>
                <th scope="col">Адрес конца</th>
                <th scope="col">Тариф</th>
                <th scope="col">Количество пассажиров</th>
                <th scope="col">Цена</th>
                <th scope="col">Описание</th>
                <th scope="col">Статус</th>
                <th scope="col">Клиент</th>
                <th scope="col">Водитель</th>
                <th scope="col">Время создания</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->addressFrom}}</td>
                    <td>{{$order->addressTo}}</td>
                    <td>
                        @switch($order->tariff)
                            @case(10)Базовый@break
                            @case(20)Средний@break
                            @case(30)Премиум@break
                        @endswitch
                    </td>
                    <td>{{$order->passengersNumber}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->description}}</td>
                    <td>
                        @switch($order->completed)
                            @case(0)Свободен@break
                            @case(1)Выполнен@break
                        @endswitch
                    </td>
                    @foreach($clients as $client)
                        @if($client->id == $order->client_id)
                            <td>{{$client->name}}</td>
                        @endif
                    @endforeach
                    @foreach($taxiDrivers as $taxiDriver)
                        @if($taxiDriver->id == $order->driver_id)
                            <td>{{$taxiDriver->firstName}}{{$taxiDriver->lastName}}</td>
                        @endif
                    @endforeach
                    <td>{{$order->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

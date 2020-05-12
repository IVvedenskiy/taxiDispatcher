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
    {{--    <link href="{{ asset('css/bootstrap-grid.min.css') }}" rel="stylesheet">--}}
    {{--    <link href="{{ asset('css/bootstrap-reboot.min.css') }}" rel="stylesheet">--}}
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"--}}
    {{--            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"--}}
    {{--            crossorigin="anonymous"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
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
            <button type="button" class="btn btn-rounded btn-danger">Карта</button>
        </div>
        <div class="mt-5 d-flex justify-content-center">
            <button type="button" class="btn btn-danger" onclick="location.href='{{ url('orders-table') }}'">Заказы
            </button>
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
    {{--    content--}}
    <div class="col-11 bg-light p-0">
        <h3 class="card-header text-center text-white bg-info">Создать выходы водителей</h3>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="m-5" action="{{route('create-driversWorkingDays')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="driver_id">Водитель</label>
                <select name="driver_id" class="form-control" required>
                    @foreach($taxiDrivers as $taxiDriver)
                        <option value="{{$taxiDriver->id}}">{{$taxiDriver->lastName}} {{$taxiDriver->firstName}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="date">Дата</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" placeholder="Введите дату" required autocomplete="date" autofocus>
            </div>
            <div class="form-group">
                <label for="shift_start">Время начала смены</label>
                <input type="datetime-local" class="form-control" id="shift_start" name="shift_start" value="{{ old('shift_start') }}" placeholder="Введите начало смены" required autocomplete="shift_start" autofocus>
            </div>
            <div class="form-group">
                <label for="shift_end">Время окончания смены</label>
                <input type="datetime-local" class="form-control" id="shift_end" name="shift_end" value="{{ old('shift_end') }}" placeholder="Введите окончание смены" required autocomplete="shift_end" autofocus>
            </div>
            <div class="row p-5">
                <button type="submit" class="btn btn-success w-100">Подтвердить</button>
            </div>
        </form>
    </div>

</div>
<script>
    $("#phoneNumber").mask("(+380)99-999-99-99");
</script>
</body>
</html>

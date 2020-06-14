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
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script></head>
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
        <h3 class="card-header text-center text-white bg-dark p-2">Создать отчет</h3>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="m-5" action="{{route('admin-report')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="driver">Водитель</label>
                <select name="driver_id" class="form-control" required>
                    @foreach($drivers as $driver)
                        <option value="{{$driver->id}}">{{$driver->lastName}} {{$driver->firstName}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="inn">ИНН</label>
                <input type="text" class="form-control" id="inn" name="inn" value="{{ old('inn') }}" placeholder="Введите ИНН" required autocomplete="inn" autofocus>
            </div>
            <div class="form-group">
                <label for="address">Адрес проживания</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="Введите адрес" required autocomplete="address" autofocus>
                <input type="text" class="form-control" id="houseNumber" name="houseNumber" value="{{ old('houseNumber') }}" placeholder="Введите номер дома" required autocomplete="houseNumber" autofocus>
            </div>
            <div class="row p-5">
                <button type="submit" class="btn btn-success w-100">Подтвердить</button>
            </div>
        </form>
    </div>

</div>
<script>
    $("#inn").mask("9999999999");
</script>
</body>
</html>
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
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
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
        <h3 class="card-header text-center text-white bg-info">Создать заказ</h3>
        <form class="m-5" action="{{route('create-order')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="addressFrom">Адрес откуда</label>
                <input type="text" class="form-control" id="addressFrom" name="addressFrom" value="{{ old('addressFrom') }}" placeholder="Введите адрес откуда" required autocomplete="addressFrom" autofocus>
            </div>
            <div class="form-group">
                <label for="addressTo">Адрес куда</label>
                <input type="text" class="form-control" id="addressTo" name="addressTo" value="{{ old('addressTo') }}" placeholder="Введите адрес куда" required autocomplete="addressTo" autofocus>
            </div>
            <div class="form-group">
                <label for="name">Имя клиента</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Введите имя клиента" autocomplete="name" autofocus>
            </div>
            <div class="form-group">
                <label for="phone">Телефон клиента</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Введите телефон клиента" required autocomplete="phone" autofocus>
            </div>
            <div class="form-group">
                <label for="tariff">Тариф</label>
                <select name="tariff" class="form-control" required>
                    <option value="basic">Базовый</option>
                    <option value="middle">Средний</option>
                    <option value="premium">Премиум</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" id="description" name="description" value="{{ old('description') }}" rows="1"></textarea>
            </div>
            <div class="row p-5">
                <button type="submit" class="btn btn-success w-100">Подтвердить</button>
            </div>
        </form>
    </div>

</div>
<script>
    $("#phone").mask("(+380)99-999-99-99");
</script>
</body>
</html>

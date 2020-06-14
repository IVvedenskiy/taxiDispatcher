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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/themes/sunny/jquery-ui.css">

    <style>
        li.ui-menu-item {
            display: block;
            width: 100%;
            height: calc(1.5em + .75rem + 2px);
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
    </style>
    <script type="text/javascript">
        $(function () {
            var clients = [
                    @foreach($clients as $client)
                {
                    label: "{{$client->name}} {{$client->phoneNumber}}", value: "{{$client->id}}"
                },
                @endforeach
            ];

            $('#acInput').autocomplete({
                source: clients
            })
        });
    </script>
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
    <div class="col-11 bg-light p-0">
        <h3 class="card-header text-center text-white bg-info">Создать заказ</h3>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="m-5" action="{{route('create-order')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tariff">Тариф</label>
                <select name="tariff" id="tariff" class="form-control" required>
                    <option value="10">Базовый</option>
                    <option value="20">Средний</option>
                    <option value="30">Премиум</option>
                </select>
            </div>
            <div class="form-group">
                <label for="addressFrom">Адрес откуда</label>
                <input type="text" class="form-control" id="addressFrom" name="addressFrom"
                       value="{{ old('addressFrom') }}" placeholder="Введите адрес откуда" required
                       autocomplete="addressFrom" autofocus>
            </div>
            <div class="form-group">
                <label for="addressTo">Адрес куда</label>
                <input type="text" class="form-control" id="addressTo" name="addressTo" value="{{ old('addressTo') }}"
                       placeholder="Введите адрес куда" required autocomplete="addressTo" autofocus>
            </div>
            <div class="form-group">
                <label for="client_id">Клиент</label>
                <div class="m-3 float-right">
                    <button type="button" class="btn btn-rounded btn-info"
                            onclick="location.href='{{ url('create-client') }}'">Создать клиента
                    </button>
                </div>
                <input type="text" class="form-control" id="acInput" name="client_id" value="{{ old('client_id') }}"
                       placeholder="Выберите клиента" autocomplete="name" autofocus>
            </div>
            <div class="form-group">
                <label for="passengersNumber">Количество пассажиров</label>
                <input type="number" class="form-control" id="passengersNumber" name="passengersNumber"
                       value="{{ old('passengersNumber') }}" placeholder="Введите количество пассажиров">
            </div>
            <div class="form-group">
                <label for="price">Цена</label>
                <textarea type="text" class="form-control" id="price" name="price" rows="1"></textarea>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" id="description" name="description" value="{{ old('description') }}"
                          rows="1"></textarea>
            </div>
            <div class="form-group">
                <label for="driver_id">Водитель</label>
                <textarea type="text" class="form-control" id="driver_id" name="driver_id" rows="1"></textarea>
            </div>
            <div class="row p-5">
                <button type="submit" class="btn btn-success w-100">Подтвердить</button>
            </div>
        </form>


        <div id="map" class="h-25"></div>
        <div id="warnings-panel"></div>
    </div>
</div>


<script>
    var map;
    var geocoder;
    var infowindow;
    var tempAddress = '';

    var locationsDrivers = [
            @for($i=0, $j=1, $k=2, $l=3; $i<count($driversLocations); $i+=4, $j+=4, $k+=4, $l+=4)
                ['{{$driversLocations[$j]}}', {{$driversLocations[$k]}}, {{$driversLocations[$l]}}, '{{$driversLocations[$i]}}'],
            @endfor
    ];

    function initMap() {
        geocoder = new google.maps.Geocoder();
        infowindow = new google.maps.InfoWindow;

        var map = new google.maps.Map(document.getElementById('map'), {
            mapTypeControl: false,
            center: {lat: 48, lng: 37.78},
            zoom: 13
        });

        for (i = 0; i < locationsDrivers.length; i++) {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(locationsDrivers[i][1], locationsDrivers[i][2]),
                animation: google.maps.Animation.DROP,
                map: map
            });
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(locationsDrivers[i][3]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }

        new AutocompleteDirectionsHandler(map);
    }

    function AutocompleteDirectionsHandler(map) {
        this.map = map;
        this.originPlaceId = null;
        this.destinationPlaceId = null;
        this.travelMode = 'DRIVING';
        this.directionsService = new google.maps.DirectionsService;
        this.directionsRenderer = new google.maps.DirectionsRenderer;
        this.directionsRenderer.setMap(map);

        var originInput = document.getElementById('addressFrom');
        var destinationInput = document.getElementById('addressTo');

        var originAutocomplete = new google.maps.places.Autocomplete(originInput);
        originAutocomplete.setFields(['place_id']);

        var destinationAutocomplete =
            new google.maps.places.Autocomplete(destinationInput);
        destinationAutocomplete.setFields(['place_id']);


        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');
    }

    AutocompleteDirectionsHandler.prototype.setupClickListener = function (
        id, mode) {
        var radioButton = document.getElementById(id);
        var me = this;

        radioButton.addEventListener('click', function () {
            me.travelMode = mode;
            me.route();
        });
    };

    AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function (
        autocomplete, mode) {
        var me = this;
        autocomplete.bindTo('bounds', this.map);

        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();

            if (!place.place_id) {
                window.alert('Please select an option from the dropdown list.');
                return;
            }
            if (mode === 'ORIG') {
                me.originPlaceId = place.place_id;
            } else {
                me.destinationPlaceId = place.place_id;
            }
            me.route();
        });
    };

    AutocompleteDirectionsHandler.prototype.route = function () {
        if (!this.originPlaceId || !this.destinationPlaceId) {
            return;
        }
        var me = this;
        var t = document.getElementById('tariff');
        var tariff = t.options[t.selectedIndex].value / 1000;

        this.directionsService.route(
            {
                origin: {'placeId': this.originPlaceId},
                destination: {'placeId': this.destinationPlaceId},
                travelMode: this.travelMode
            },
            function (response, status) {
                if (status === 'OK') {
                    me.directionsRenderer.setDirections(response);
                    var route = response.routes[0];
                    var summaryPanel = document.getElementById('price');
                    summaryPanel.innerHTML = '';
                    for (var i = 0; i < route.legs.length; i++) {
                        document.getElementById('price').innerText = (route.legs[i].distance.value * tariff).toFixed(2);
                    }
                } else {
                    // window.alert('Directions request failed due to ' + status);
                }
            });

        findNearestDriver();
    };

    function findNearestDriver() {
        var address = document.getElementById('addressFrom').value;
        var locs = [];

        geocoder.geocode({'address': address}, function (results, status) {
            if (status == 'OK') {
                for (i = 0; i < locationsDrivers.length; i++) {
                    locs.push(distance(locationsDrivers[i][1], locationsDrivers[i][2], results[0].geometry.location.lat(), results[0].geometry.location.lng()));
                }
                document.getElementById('driver_id').innerText = locs.indexOf(Math.min.apply(null, locs))+1;
                locs.forEach(item => console.log(item))
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }

    function distance(latA, lngA, latB, lngB) {
        R = 6371000;
        radiansLAT_A = degrees_to_radians(latA);
        radiansLAT_B = degrees_to_radians(latB);
        variationLAT = degrees_to_radians(latB - latA);
        variationLNG = degrees_to_radians(lngB - lngA);

        a = Math.sin(variationLAT/2) * Math.sin(variationLAT/2)
            + Math.cos(radiansLAT_A) * Math.cos(radiansLAT_B) * Math.sin(variationLNG/2) * Math.sin(variationLNG/2);
        c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
        d = R * c;
        return d;
    }

    function degrees_to_radians(degrees){
        var pi = Math.PI;
        return degrees * (pi/180);
    }
</script>

<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBC36TmI9rcRX88IilNmUbx9Tn7vaEwxOY&libraries=places&callback=initMap"
    async defer></script>
</body>
</html>

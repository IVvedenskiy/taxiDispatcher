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

    <!-- Google Maps JavaScript library -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyBC36TmI9rcRX88IilNmUbx9Tn7vaEwxOY"></script>
{{--    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBC36TmI9rcRX88IilNmUbx9Tn7vaEwxOY&libraries=places&callback=initMap"--}}
{{--            async defer></script>--}}

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
            <button type="button" class="btn btn-danger">Info</button>
        </div>
        <div class="mt-5 d-flex justify-content-center">
            <button type="button" class="btn btn-danger" onclick="location.href='{{ url('report') }}'">Отчеты</button>
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
                <label for="addressFrom">Адрес откуда</label>
                <input type="text" class="form-control" id="start" name="addressFrom"
                       value="{{ old('addressFrom') }}" placeholder="Введите адрес откуда" required
                       autocomplete="addressFrom" autofocus>
            </div>
            <div class="form-group">
                <label for="addressTo">Адрес куда</label>
                <input type="text" class="form-control" id="end" name="addressTo" value="{{ old('addressTo') }}"
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
                <label for="tariff">Тариф</label>
                <select name="tariff" class="form-control" required>
                    <option value='10'>Базовый</option>
                    <option value='20'>Средний</option>
                    <option value='30'>Премиум</option>
                </select>
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
            <div class="row p-5">
                <button type="submit" class="btn btn-success w-100">Подтвердить</button>
            </div>
        </form>


        <div id="map" class="h-25"></div>
        <div id="warnings-panel"></div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var autocomplete1 = new google.maps.places.Autocomplete((document.getElementById('start')), {
            types: ['geocode'],
            componentRestrictions: {
                country: "UA"
            }
        });
        var autocomplete2 = new google.maps.places.Autocomplete((document.getElementById('end')), {
            types: ['geocode'],
            componentRestrictions: {
                country: "UA"
            }
        });
    });
</script>


<script>
    var map;
    var geocoder;
    var infowindow;

    var locationsDrivers = [
            @foreach($drivers as $driver)
        ['{{$driver->callSign}}', random(47, 47.2), random(37.5, 37.65), 1],
        @endforeach
    ];

    function initMap() {
        geocoder = new google.maps.Geocoder();
        infowindow = new google.maps.InfoWindow;
        var directionsService = new google.maps.DirectionsService;
        var markerArray = [];

        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 47.1, lng: 37.55},
            zoom: 13
        });

        var directionsRenderer = new google.maps.DirectionsRenderer({map: map});
        var stepDisplay = new google.maps.InfoWindow;

        calculateAndDisplayRoute(
            directionsRenderer, directionsService, markerArray, stepDisplay, map);

        var onChangeHandler = function () {
            calculateAndDisplayRoute(
                directionsRenderer, directionsService, markerArray, stepDisplay, map);
        };
        document.getElementById('start').addEventListener('change', onChangeHandler);
        document.getElementById('end').addEventListener('change', onChangeHandler);

        for (i = 0; i < locationsDrivers.length; i++) {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(locationsDrivers[i][1], locationsDrivers[i][2]),
                animation: google.maps.Animation.DROP,
                map: map
            });
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(locationsDrivers[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
        codeAddressOrder(document.getElementById('start'));
        codeAddressOrder(document.getElementById('end'));
    }

    function codeAddressOrder(locations) {
        var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';

        for (i = 0; i < locations.length; i++) {
            geocoder.geocode({'address': locations}, function (results, status) {
                if (status == 'OK') {
                    var marker = new google.maps.Marker({
                        map: map,
                        icon: image,
                        position: results[0].geometry.location,
                        animation: google.maps.Animation.DROP
                    });
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
    }

    function calculateAndDisplayRoute(directionsRenderer, directionsService,
                                      markerArray, stepDisplay, map) {
        for (var i = 0; i < markerArray.length; i++) {
            markerArray[i].setMap(null);
        }
        directionsService.route({
            origin: document.getElementById('start').value,
            destination: document.getElementById('end').value,
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        }, function (response, status) {
            if (status === 'OK') {
                document.getElementById('warnings-panel').innerHTML =
                    '<b>' + response.routes[0].warnings + '</b>';
                directionsRenderer.setDirections(response);
                var route = response.routes[0];
                var summaryPanel = document.getElementById('price');
                summaryPanel.innerHTML = '';
                for (var i = 0; i < route.legs.length; i++) {
                    var routeSegment = i + 1;
                    // summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
                    //     '</b><br>';
                    // summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
                    // summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
                    document.getElementById('price').innerText = route.legs[i].distance.value * 0.01;
                }
                showSteps(response, markerArray, stepDisplay, map);
            } else {
                // window.alert('Directions request failed due to ' + status);
            }
        });
    }

    function showSteps(directionResult, markerArray, stepDisplay, map) {
        var myRoute = directionResult.routes[0].legs[0];
        for (var i = 0; i < myRoute.steps.length; i++) {
            var marker = markerArray[i] = markerArray[i] || new google.maps.Marker;
            marker.setMap(map);
            marker.setPosition(myRoute.steps[i].start_location);
            attachInstructionText(
                stepDisplay, marker, myRoute.steps[i].instructions, map);
        }
    }

    function attachInstructionText(stepDisplay, marker, text, map) {
        google.maps.event.addListener(marker, 'click', function () {
            stepDisplay.setContent(text);
            stepDisplay.open(map, marker);
        });
    }

    function random(mn, mx) {
        return Math.random() * (mx - mn) + mn;
    }
</script>


</body>
</html>

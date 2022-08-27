<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('admin.includes.meta')
    <title>@yield('title')</title>
    @include('admin.includes.style')
    <title>Home</title>
</head>
<body class="">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
    <div class="container">
        <a href="" class="navbar-brand">
            <img src="img/logo.jpg" alt="" height="40" />
        </a>
        <button type="button" class="navbar-toggler" data-target="#menu" data-toggle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ml-auto">
                <li><a href="{{ route('/') }}" class="nav-link text-white"> Home </a></li>
                <li><a href="{{ route('login') }}" class="nav-link text-white"> Login</a></li>
{{--                <li><a href="{{ route('register') }}" class="nav-link text-white"> Registration</a></li>--}}
            </ul>
        </div>
    </div>
</nav>

<!-- User information -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-header text-center bg-info">
                            <h3>User information</h3>
                        </div>
                        <div class="card body py-5">
                            <table class="table table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="text-center">Si No</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Password</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr class="text-center">
                                        <td> {{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->password }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- outlet information -->
<section class="mb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header text-center bg-info">
                        <h3>Outlet information</h3>
                    </div>
                    <div class="card body py-5">
                        <table class="table table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="text-center">Si No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Latitude</th>
                                <th class="text-center">Longitude</th>
                                <th class="text-center">image</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($outlets as $outlet)
                                <tr class="text-center" onclick="initMap({{ $outlet->latitude }},{{$outlet->longitude}}   )">
                                    <td> {{ $loop->iteration }}</td>
                                    <td>{{ $outlet->name }}</td>
                                    <td>{{ $outlet->phone }}</td>
                                    <td>{{ $outlet->latitude }}</td>
                                    <td>{{ $outlet->longitude }}</td>
                                    <td>
                                        <img src="{{ asset($outlet->image) }}" alt="" height="80" width="100">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- google map -->
<div class="container">
    <div id="map" style=" height: 300px;width:100%;" class="my-3"></div>
</div>

<script>
    function initMap(lat,lng) {
        var myLatLng = {lat: lat, lng: lng};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: myLatLng
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,

        });
    }

</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC36IP_HcoP5DbvNEE7mjKuaZuafU0Vhnc&callback=initMap"></script>
@include('admin.includes.script')
</body>
</html>

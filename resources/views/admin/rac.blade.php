<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{asset('bootstrap-5.3.3/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="tom-select.complete.js"></script>
    <link href="path_to_tomselect.css" rel="stylesheet">
    <script src="path_to_tomselect.js"></script>

    <style>
        @media (max-width: 767.98px) {
        }

        .navbar {
            box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .1);
        }

        @media (min-width: 767.98px) {
            .navbar {
                top: 0;
                position: sticky;
                z-index: 999;
            }
        }
    </style>
    <nav class="navbar navbar-light bg-light p-3">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <a class="navbar-brand" href="#">
                Simple Dashboard
            </a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <form class="col-12 col-md-4 col-lg-2" method="POST" action="/search">
            @csrf
            <input name="keyword" class="form-control form-control-dark" type="text" placeholder="Search" aria-label="Search">
            <button hidden type="submit"class="btn btn-primary">tommm</button>
        </form>

        <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
            <div class="mr-3 mt-1">
                <a class="github-button" href="https://github.com/themesberg/simple-bootstrap-5-dashboard" data-color-scheme="no-preference: dark; light: light; dark: light;" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star /themesberg/simple-bootstrap-5-dashboard">Star</a>
            </div>

            <div class="dropdown">
                @guest
                    <div>
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    </div>
                @endguest
                @auth
                    <button class="btn btn-secondary dropdown-toggle" style="height: 70px; color: white; background-color: #333333 "  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                        <p class="me-2">
                            {{ \Illuminate\Support\Facades\Auth::user()->name ?? 'Guest' }}
                        </p>
                    </button>
                @endauth
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Messages</a></li>
                    <li><form method="post" action="{{route('logout')}}">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form></li>
                </ul>
            </div>
        </div>
    </nav>
    {{--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>--}}
    {{--<script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>--}}
    {{--<script async defer src="https://buttons.github.io/buttons.js"></script>--}}
    {{--<script>--}}
    {{--    new Chartist.Line('#traffic-chart', {--}}
    {{--        labels: ['January', 'Februrary', 'March', 'April', 'May', 'June'],--}}
    {{--        series: [--}}
    {{--            [23000, 25000, 19000, 34000, 56000, 64000]--}}
    {{--        ]--}}
    {{--    }, {--}}
    {{--        low: 0,--}}
    {{--        showArea: true--}}
    {{--    });--}}
    {{--</script>--}}
</head>
<body>
<div class="col-md-10 ml-sm-auto col-lg-12 px-md-4 py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('customer.home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Overview</li>
        </ol>
    </nav>
    <h1 class="h2">Dashboard</h1>
    <p>This is the homepage of a simple admin interface which is part of a tutorial written on Themesberg</p>
    <div class="card">
        <div class="row justify-content-between my-4">
            @foreach($allProducts->chunk(4) as $chunk)
                @foreach($chunk as $product)
                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        <div class="card" style="margin-left: 10px; margin-right: 10px">
                            <img class="card-img-top" src="{{ asset('image/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 230px;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text">Price: {{ $product->price }}</p>
                                <a href="#" class="btn btn-dark">
                                    <i class="fas fa-cart-shopping" style="color: #91959c;"></i> Buy Now
                                </a>
                                <a href="{{route('customer.view-detail')}}" class="btn btn-outline-dark" style="margin-right:10px ">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>


</div>
</body>
<style>
    .card-deck .card {
        margin: 0 10px; /* Thiết lập khoảng cách trái và phải là 10px */
    }
</style>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
</script>
</html>

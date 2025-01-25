<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Made In TR</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<div class="topbar">
    <div class="container">
        <ul class="list-inline text-center mb-0">
            <li class="list-inline-item">
                <a href="">About Us</a>
            </li>
            <li class="list-inline-item">
                <a href="">News & Updates</a>
            </li>
            <li class="list-inline-item">
                <a href="">About Republic of Türkiye</a>
            </li>
            <li class="list-inline-item">
                <a href="{{ route('login') }}">Members Area (Login)</a>
            </li>
            <li class="list-inline-item">
                <a href="{{ route('company.form') }}">İşletmenizi Kaydedin</a>
            </li>
        </ul>
    </div>
</div>
<header class="client">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-transparent">
            <div class="container-fluid px-0">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{asset('img/logo.png')}}" height="50" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">


                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/">
                                Home <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('tag.all')}}">
                                Sectors <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('company.all')}}">
                                Brands <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('tag.all')}}">
                                Cities <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('tag.all')}}">
                                Franchise <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </li>

                        <li class="nav-item dropdown d-none">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Ayarlar
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit" style="width: 5px; margin-right: 15px; opacity: 0;">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</header>

<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
</div>


{{$slot}}


@include('client.parts.prefooter')
<div class="mb-5"></div>
@include('client.parts.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

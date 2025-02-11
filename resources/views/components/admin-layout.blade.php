<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Made In TR</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<div class="topbar">
    <div class="container">

    </div>
</div>
<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-transparent">
            <div class="container-fluid px-0">
                <a class="navbar-brand" href="{{ Auth::check() ? '/admin' : '/' }}">
                    <img src="{{asset('img/logo.png')}}" height="50" />
                </a>
                @auth
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.company.all')}}">Firmalar</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.user.all')}}">Kullanıcılar</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.tag.all')}}">Etiketler</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.ai.form')}}">AI</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('logout')}}">Çıkış</a>
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
                    <form class="d-flex form-search position-relative" role="search">
                        <input class="form-control" type="search" placeholder="Arama..." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit" style="width: 5px; margin-right: 15px; opacity: 0;">Search</button>
                    </form>
                </div>
                @endauth
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

<div class="container">
    {{$slot}}
</div>
<div class="mb-5"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/file_upload.js') }}"></script>
<script src="{{ asset('js/dataTables.js') }}"></script>

@stack('javascript')
</body>
</html>

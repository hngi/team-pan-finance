<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts._head')
    <style>
        .nav-pills>li>a {
            background-color: rgb(248, 249, 250);
            color: #5829B8 !important;
        }

        .nav-pills>li>a.active {
            background-color: #5829B8 !important;
            color: #fff !important;
        }

        .nav-tabs>li>a {
            background-color: rgb(248, 249, 250);
            color: #5829B8 !important;
        }

        .nav-tabs>li>a.active {
            background-color: #5829B8 !important;
            color: #fff !important;
        }

        .btn-primary {
            background-color: #5829B8 !important;
            color: #fff;
            border: thin solid #5829B8;
        }
    </style>
</head>
<body>
    <div id="app">
        <main class="py-4">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand ml-5" href="{{ url('/') }}" style="color: #5829B8; font-weight: 800; font-size: 250%;">
                    <img src="https://res.cloudinary.com/sgnolebagabriel/image/upload/v1569248451/finance-tracker/Finance_money_Dollar_management_cash_savings_salary-512_sgdosn.png" alt="Logo" style="width:40px;"><span class="mt-2">fintrack</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarNavDropdown" class="navbar-collapse collapse">
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item mr-5 mb-1">
                            <form class="d-none" method="post" action="{{ route('logout') }}" id="logout_form">
                                @csrf
                            </form>
                            <a class="nav-link btn btn-danger" href="#" id="logout_btn" style="color: #fff;">LOGOUT</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container">
                <hr>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('admin.dashboard')? "active": '' }}" id="home-tab"  href="{{ route('admin.dashboard') }}" role="tab" aria-controls="home" aria-selected="true">HOME</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                    @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script>
        $(`#logout_btn`).click((e => {
            e.preventDefault();
            $(`#logout_form`).submit();
        }))
    </script>
    @stack('script')
</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" />
    <title>@yield('title')</title>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e2b2982b1a.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Application CSS -->
    <link rel="stylesheet" href="{{asset('/css/styles.css')}}">
</head>
<body>

    <div class="flex-dashboard">
        <div class="sidebar">
            <div class="sidebar-title">
                <img src="{{asset('/img/logo.png')}}" alt="logo">
                <h2>Livraria IBA</h2>
            </div>

            <div class="menu">
                <ul>
                    <li>
                        <a href="/"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="stock"><i class="fas fa-cubes"></i> Estoque</a>
                    </li>
                    <li>
                        <a href="order"><i class="fas fa-shipping-fast"></i> Encomendas</a>
                    </li>
                    <li>
                        <a href="purchase"><i class="fas fa-shopping-basket"></i> Compras</a>
                    </li>
                    <li>
                        <a href="selling"><i class="fas fa-cash-register"></i> Vendas</a>
                    </li>
                    <li>
                        <a href="debt"><i class="fas fa-money-bill"></i> Em Dívida</a>
                    </li>
                </ul>
            </div>

            <div class="config">
                <ul>
                    <li>
                        <a href="/#"><i class="fas fa-sign-out-alt"></i></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        

        <main>
            @yield('header')

            <div class="main-content">

            </div>
        </main>
    </div>

    @yield('content')

    <!-- Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
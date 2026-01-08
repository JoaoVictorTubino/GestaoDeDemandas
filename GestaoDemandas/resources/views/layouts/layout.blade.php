<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistema de Demandas')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    @stack('styles')
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            @auth
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                            class="btn btn-link nav-link"
                            onclick="return confirm('Deseja sair do sistema?')">
                        <i class="fas fa-sign-out-alt"></i> Sair
                    </button>
                </form>
            </li>
            @endauth
        </ul>

    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <a href="{{ route('demandas.index') }}" class="brand-link">
            <span class="brand-text font-weight-light">Sistema de Demandas</span>
        </a>

        <div class="sidebar">
            @include('layouts.partials.sidebar')
        </div>

    </aside>

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <h1>@yield('page-title')</h1>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>

    </div>

    <footer class="main-footer text-center">
        <strong>Sistema de Demandas</strong>
    </footer>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

@stack('scripts')
</body>
</html>

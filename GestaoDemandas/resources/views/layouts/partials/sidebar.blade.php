@if(auth()->check())
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="{{ auth()->user()->foto 
            ? asset('storage/' . auth()->user()->foto) 
            : 'https://www.gravatar.com/avatar/' . md5(strtolower(trim(auth()->user()->email))) . '?d=mp&s=160' }}"
             class="img-circle elevation-2"
             alt="User Image"
             width="40"
             height="40">
    </div>
    <div class="info">
        <a href="{{ route('profile.edit') }}" class="d-block">
            {{ auth()->user()->nome }}
        </a>
    </div>
</div>
@endif

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column"
        data-widget="treeview"
        role="menu"
        data-accordion="false">

        <li class="nav-item">
            <a href="{{ route('dashboard') }}"
               class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>Dashboard</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('demandas.index') }}"
               class="nav-link {{ request()->routeIs('demandas.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tasks"></i>
                <p>Demandas</p>
            </a>
        </li>

    </ul>
</nav>

<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar" >
 <div class="w3-container w3-row">
    <div class="w3-col s12 w3-center">
     <img src="@if(Auth::user()->photo){{asset(Auth::user()->photo)}}@else{{asset('frontend/images/avatar3.png')}}@endif" width="75%" height="35%" class="" alt="">
 </div>
 <div class="w3-col s12 w3-bar w3-center">

  <p class="app-menu__label" style="color: white;" >{{ Auth::user()->name }}  </p>
  <span class="app-menu__label" style="color: white;">Warehouse</span>
  </div>
</div>

<ul class="app-menu">
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'ware_house.index' ? 'active' : '' }}" href="{{route('ware_house.index')}} ">
            <i class="app-menu__icon fa fa-dashboard"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Dashboard</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'warehouse_predict' ? 'active' : '' }}" href="{{route('warehouse_predict')}}">
            <i class="app-menu__icon fa fa-shopping-bag"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Prediction</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'warehouse_forecast' ? 'active' : '' }}" href="{{route('warehouse_forecast')}} ">
            <i class="app-menu__icon fa fa-group"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Forecast</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'ware_house.ware_house.house.index' ? 'active' : '' }}" href="{{route('ware_house.ware_house.house.index')}} ">
            <i class="app-menu__icon fa fa-cogs"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Manage warehouse</span>
        </a>
    </li>
     <li class="dropdown">
        <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="app-menu__icon fa fa-file"></i> <span class="app-menu__label">&nbsp;&nbsp;Contracts</span><i class="fa fa-caret-down"></i> </a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li>
                <a class="dropdown-item" href="{{route('contracts.contracts.ware_house')}}"><i class="fa fa-qrcode fa-lg"></i> Available Request</a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ url('/ware_house/Rejected-requests') }}"><i class="fa fa-shopping-bag fa-lg"></i> Rejected Request</a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('Accepted_controcts') }}"><i class="fa fa-group fa-lg"></i> Accepted Request</a>
            </li>
        </ul>
    </li>
    <li>
       <a class="app-menu__item" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;&nbsp;
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    </li>
</ul>
</aside>

<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar" >
 <div class="w3-container w3-row">
    <div class="w3-col s12 w3-center">
     <img src="@if(Auth::user()->photo){{asset(Auth::user()->photo)}}@else{{asset('frontend/images/avatar3.png')}}@endif" width="75%" height="35%" class="" alt="">
 </div>
 <div class="w3-col s12 w3-bar w3-center">

  <p class="app-menu__label" style="color: white;" >{{ Auth::user()->name }} <span class="caret"></span> </p>
  <span class="app-menu__label" style="color: white;">Farmer</span>
  </div>
</div>

<ul class="app-menu">
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'farmer.index' ? 'active' : '' }}" href="{{route('farmer.index')}} ">
            <i class="app-menu__icon fa fa-dashboard"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Dashboard</span>
        </a>
    </li>
     <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'farmer.index' ? 'active' : '' }}" href="{{route('signature-pad')}} ">
            <i class="app-menu__icon fa fa-dashboard"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Sign</span>
        </a>
    </li>
       
    <!-- <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'farmer_predict' ? 'active' : '' }}" href="{{route('farmer_predict')}}">
            <i class="app-menu__icon fa fa-bar-chart"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Prediction</span>
        </a>
    </li> -->
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'farmer_forecast' ? 'active' : '' }}" href="{{route('farmer_forecast')}} ">
            <i class="app-menu__icon fa fa-shopping-bag"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Forecast</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'farmer.house' ? 'active' : '' }}" href="{{route('farmer.house')}} ">
            <i class="app-menu__icon fa fa-group"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Warehouse</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'farmer.inventory' ? 'active' : '' }}" href="{{route('farmer.inventory')}} ">
            <i class="app-menu__icon fa fa-cogs"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Grain Inventory</span>
        </a>
    </li>
    <li>
    <li class="dropdown">
        <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="app-menu__icon fa fa-file"></i> <span class="app-menu__label">&nbsp;&nbsp;Contracts</span>&nbsp;&nbsp;<i class="fa fa-caret-down"></i> </a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li>
                <a class="dropdown-item" href="{{ route('contracts.contracts.create') }}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Create Contracts</a>
            </li>
            <li>
                <a class="dropdown-item" href="{{route('contracts.contracts.index')}}"><i class="fa fa-eye"></i>&nbsp; View Created Contracts</a>
            </li>
            <li>
                <a class="dropdown-item" href="{{route('approval_contra')}}"><i class="fa fa-check"></i>&nbsp;Contract Approval Status</a>
            </li>
            <li>
                <a class="dropdown-item" href="{{route('received_contracts_requests')}}"><i class="fa fa-book"></i>&nbsp; Booked Contract</a>
            </li>
            <li>
                <a class="dropdown-item" href="{{route('contracts.contracts.Rejected-contracts')}}"><i class="fa fa-ban" aria-hidden="true"></i>&nbsp;&nbsp; Rejected Contract</a>
            </li>
            <li>
                <a class="dropdown-item" href=""><i class="fa fa-ban" aria-hidden="true"></i>&nbsp;&nbsp; Rejected Contract Request</a>
            </li>
        </ul>
    </li>
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

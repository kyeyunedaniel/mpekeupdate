<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar" >
 <div class="w3-container w3-row">
    <div class="w3-col s12 w3-center">
     <img src="@if(Auth::user()->photo){{asset(Auth::user()->photo)}}@else{{asset('frontend/images/avatar3.png')}}@endif" width="75%" height="35%" class="" alt="">
 </div>
 <div class="w3-col s12 w3-bar w3-center">

  <p class="app-menu__label" style="color: white;" >{{ Auth::user()->name }} <span class=""></span> </p>
  <span class="app-menu__label" style="color: white;">{{ Auth::user()->user_type }}</span>
     <!--  <a href="#" class="w3-bar-item w3-button " style="width:33%"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button" style="width:33%"><i class="fa fa-user"></i></a>
      <a href= --><!-- !-- php" class="w3-bar-item w3-button" style="width:33%"><i class="fa fa-power-off"></i></a> --> 
  </div>
</div>

<ul class="app-menu">
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="/admin">
            <i class="app-menu__icon fa fa-dashboard"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Dashboard</span>
        </a>
    </li>
    
    <li class="dropdown">
    <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="app-menu__icon fa fa-file"></i> <span class="app-menu__label">&nbsp;&nbsp;Contracts</span>&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i> </a>
    <ul class="dropdown-menu settings-menu dropdown-menu-right">
        <li>
            <a class="dropdown-item" href="{{route('admin.contracts.create')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Create Contract</a>
        </li>
        <li>
            <a class="dropdown-item" href="{{route('contracts.admin.index')}}"><i class="fa fa-eye"></i>&nbsp;&nbsp;View Contract</a>
        </li>
        <li>
            <a class="dropdown-item" href="{{route('Aproved_review')}}"><i class="fa fa-check" aria-hidden="true"></i>
&nbsp;&nbsp;Approved Contracts</a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('rejectstore_review') }}"><i class="fa fa-ban" aria-hidden="true"></i>
&nbsp;&nbsp;Rejected Contract Request</a>
        </li>
    </ul>
</li>
       
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.cart' ? 'active' : '' }}" href=" {{route('admin.cart')}} ">
            <i class="app-menu__icon fa fa-bar-chart"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Go Shopping</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.orders' ? 'active' : '' }}" href="{{route('admin.orders')}} ">
            <i class="app-menu__icon fa fa-bicycle"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Orders</span>
        </a>
    </li>
        <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'admin_predict' ? 'active' : '' }}" href="{{route('admin.Trasporter.index')}}">
            <i class="app-menu__icon fa fa-money"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Trasporter</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'admin_predict' ? 'active' : '' }}" href="{{route('admin.processor.index')}}">
            <i class="app-menu__icon fa fa-money"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Processor</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.partner.index' ? 'active' : '' }}" href="{{route('admin.partner.index')}}">
            <i class="app-menu__icon fa fa-money"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Partners</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'admin_predict' ? 'active' : '' }}" href="{{route('admin.reason.index')}}">
            <i class="app-menu__icon fa fa-money"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Contract Reasons</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'admin_predict' ? 'active' : '' }}" href="{{route('admin_forecast')}}">
            <!-- {{route('admin_predict')}} -->
            <i class="app-menu__icon fa fa-money"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Prediction</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'admin_forecast' ? 'active' : '' }}" href="{{url('admin/forecasting')}} ">
            <!-- //{{route('admin_forecast')}} -->
            <i class="app-menu__icon fa fa-cloud"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Forecast</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.User.create' ? 'active' : '' }}" href=" {{route('admin.User.create')}} ">
            <i class="app-menu__icon fa fa-user"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Create User Acount</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.farmer.index' ? 'active' : '' }}" href=" {{route('admin.farmer.index')}} ">
            <i class="app-menu__icon fa fa-crop"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Farmers</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.ware_house.index' ? 'active' : '' }}" href=" {{route('admin.ware_house.index')}} ">
            <i class="app-menu__icon fa fa-vcard"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Warehouse Manager</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.buyer.index' ? 'active' : '' }}" href="{{route('admin.buyer.index')}}">
            <i class="app-menu__icon fa fa-child"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Buyers</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.admin.index' ? 'active' : '' }}" href="{{route('admin.admin.index')}}">
            <i class="app-menu__icon fa fa-cogs"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Administrators</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.ware_house.index' ? 'active' : '' }}" href="{{route('admin.ware_house.house.index')}}">
            <i class="app-menu__icon fa fa-industry"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Manage Warehouse</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.MI.index' ? 'active' : '' }}" href="{{route('admin.MI.index')}} ">
            <i class="app-menu__icon fa fa-database"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Manage Inventory</span>
        </a>
    </li> 
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'advert-list' ? 'active' : '' }}" href="{{route('advert-list')}} ">
            <i class="app-menu__icon fa fa-truck"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Advert</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>
            &nbsp;&nbsp; Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        
    </li>
</ul>
</aside>

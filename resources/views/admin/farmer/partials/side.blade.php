<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar" >
 <div class="w3-container w3-row">
    <div class="w3-col s12 w3-center">
     <img src="@if(Auth::user()->photo){{asset(Auth::user()->photo)}}@else{{asset('frontend/images/avatar3.png')}}@endif" width="75%" height="35%" class="" alt="">
 </div>
 <div class="w3-col s12 w3-bar w3-center">

  <p class="app-menu__label" style="color: white;" >{{ Auth::user()->name }} <span class="caret"></span> </p>
  <span class="app-menu__label" style="color: white;">Farmer</span>
     <!--  <a href="#" class="w3-bar-item w3-button " style="width:33%"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button" style="width:33%"><i class="fa fa-user"></i></a>
      <a href= --><!-- !-- php" class="w3-bar-item w3-button" style="width:33%"><i class="fa fa-power-off"></i></a> --> 
  </div>
</div>

<ul class="app-menu">
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="">
            <i class="app-menu__icon fa fa-dashboard"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Dashboard</span>
        </a>
    </li>
       
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.CompanyInfo.index' ? 'active' : '' }}" href="">
            <i class="app-menu__icon fa fa-bar-chart"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Company profile</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.products.index' ? 'active' : '' }}" href="">
            <i class="app-menu__icon fa fa-shopping-bag"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Project</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.Employees.index' ? 'active' : '' }}" href="">
            <i class="app-menu__icon fa fa-group"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Employees</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.settings' ? 'active' : '' }}" href="{{ url('/admin/adminsettings') }}">
            <i class="app-menu__icon fa fa-cogs"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Settings</span>
        </a>
    </li>
    <li>
         <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
        
    </li>
</ul>
</aside>

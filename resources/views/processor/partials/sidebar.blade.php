<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
 <div class="w3-container w3-row">
    <div class="w3-col s12 w3-center">
     <img src="@if(Auth::user()->photo){{asset(Auth::user()->photo)}}@else{{asset('frontend/images/avatar3.png')}}@endif" width="35%" class="" alt="">
 </div>
 <div class="w3-col s12 w3-bar w3-center">

  <p class="app-menu__label" style="color: white;" >{{ Auth::user()->name }} <span class="caret"></span> </p>
  <span class="app-menu__label" style="color: white;">Administrator</span>
     <!--  <a href="#" class="w3-bar-item w3-button " style="width:33%"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button" style="width:33%"><i class="fa fa-user"></i></a>
      <a href= --><!-- !-- php" class="w3-bar-item w3-button" style="width:33%"><i class="fa fa-power-off"></i></a> --> 
  </div>
</div>

<ul class="app-menu">
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
            <i class="app-menu__icon fa fa-dashboard"></i>
            <span class="app-menu__label">Overview</span>
        </a>
    </li>

    

    <!-- <li> -->
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-metric"> <img src="{{url("./../metrics_for_recruiting_001.png")}}"> </i> <span class="app-menu__label">Derive Metrics</span><i class="fa fa-caret-down"></i> </a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li>
                    <a class="dropdown-item" href="{{ url('admin/metric/Project') }}"><i class="fa fa-qrcode fa-lg"></i> Project</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ url('admin/metric/Business') }}"><i class="fa fa-shopping-bag fa-lg"></i> Business</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ url('admin/metric/Team') }}"><i class="fa fa-group fa-lg"></i> Team</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ url('admin/metric/Product') }}"><i class="fa fa-cog fa-lg"></i> Product</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ url('admin/metric/Resource') }}"><i class="fa fa-globe fa-lg"></i> Resources</a>
                </li>
            </ul>
        </li>
        <!-- </li> -->

        



        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.CompanyInfo.index' ? 'active' : '' }}" href="{{ route('admin.CompanyInfo.index') }}">
                <i class="app-menu__icon fa fa-bar-chart"></i>
                <span class="app-menu__label">Company profile</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.products.index' ? 'active' : '' }}" href="{{ route('admin.products.index') }}">
                <i class="app-menu__icon fa fa-shopping-bag"></i>
                <span class="app-menu__label">Project</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.Employees.index' ? 'active' : '' }}" href="{{ route('admin.Employees.index') }}">
                <i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Employees</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                <i class="app-menu__icon fa fa-tags"></i>
                <span class="app-menu__label">Categories</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.attributes.index' ? 'active' : '' }}" href="{{ route('admin.attributes.index') }}">
                <i class="app-menu__icon fa fa-task"></i>
                <span class="app-menu__label">TASKS</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.settings' ? 'active' : '' }}" href="{{ url('/admin/adminsettings/{{id}') }}">
                <i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>

        <!-- <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.settings' ? 'active' : '' }}" href="{{ url('/admin/project_over_all') }}">
            <i class="app-menu__icon fa fa-cogs"></i>
            <span class="app-menu__label">Setts</span>
        </a>
    </li> -->
    </ul>
</aside>

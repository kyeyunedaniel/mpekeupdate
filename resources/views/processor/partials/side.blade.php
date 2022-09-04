<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar" >
 <div class="w3-container w3-row">
    <div class="w3-col s12 w3-center">
     <img src="@if(Auth::user()->photo){{asset(Auth::user()->photo)}}@else{{asset('frontend/images/avatar3.png')}}@endif" width="75%" height="35%" class="" alt="">
 </div>
 <div class="w3-col s12 w3-bar w3-center">

  <p class="app-menu__label" style="color: white;" >{{ Auth::user()->name }} <span class="caret"></span> </p>
  <span class="app-menu__label" style="color: white;">Processor</span>
  </div>
</div>

<ul class="app-menu">
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'processor.processor' ? 'active' : '' }}" href="{{route('processor.index')}} ">
            <i class="app-menu__icon fa fa-dashboard"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Dashboard</span>
        </a>
    </li>
    
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'processor_forecast' ? 'active' : '' }}" href="{{route('processor_forecast')}} ">
            <i class="app-menu__icon fa fa-shopping-bag"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Forecast</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item {{ Route::currentRouteName() == 'farmer.house' ? 'active' : '' }}" href="{{route('processor.create')}} ">
            <i class="app-menu__icon fa fa-group"></i>
            <span class="app-menu__label">&nbsp;&nbsp;Processor</span>
        </a>
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

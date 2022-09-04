<header class="app-header" style="background-color: #2e6da4;">
    <a class="app-header__logo" href=""> <h5><b>{{ config('app.name') }}</b></h5>
        <!-- {{ config('app.name') }} -->
    </a>
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav">       


    <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg" >
            <label style="color: red;">
                                
            </label>
                   </i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <li class="app-notification__title">
                   
                </li>
                <div class="app-notification__content" style="margin-left: 35px;">
                    <li>
                        <a class="app-notification__item" href="javascript:;">
                           
                            <div>
                                
                                    
                            <p class="app-notification__message">                            
                            <b><li><a href="{{route('markRead')}}">mark all as read</a></li></b>
                            
                                            
                                    
                                </p>
                               
                                
                            </div>
                        </a>
                    </li>
                   
                </div>
                
            </ul>
        </li>
        <!-- User Menu     -->
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li>
                    <a class="dropdown-item" href="{{route('farmer_password')}} "><i class="fa fa-key"></i>Password</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{route('profile_Farmer')}} "><i class="fa fa-user-md"></i> Profile</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                </li>
            </ul>
        </li>
    </ul>


   <!--  -->


</header>

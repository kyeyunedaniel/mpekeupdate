<header class="app-header" style="background-color: #2e6da4;">
    <a class="app-header__logo" href=""> <h5><b>{{ config('app.name') }}</b></h5>
        <!-- {{ config('app.name') }} -->
    </a>
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav"> 

         <li class=" dropdown">
                    <a class="app-nav__item" href="{{ route('buyer.shop') }}">BUY</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="app-nav__item dropdown-toggle"
                       href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"
                    >
                        <span class="badge badge-pill badge-dark">
                            <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}kgs
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="width: 600px; padding: 0px; border-color: #9DA0A2">
                        <ul class="list-group" style="margin: 20px;">
                            @include('buyer.partials.cart-drop')
                        </ul>

                    </div>
                </li>
    <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg" >
            <label style="color: red;">
                @if(auth()->user()->unreadNotifications->count())
                     {{ auth()->user()->unreadNotifications->count() }}
                    @endif                
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
                            @foreach(auth::user()->unreadNotifications as $notification)
                           <li> <a href="{{route('markRead')}}">{{$notification->data['data']}}</a></li>
                           <p class="app-notification__meta">{{$notification->created_at->diffForHumans()}}</p>
                            @endforeach
                            @foreach(auth::user()->readNotifications as $notification)
                           <p style="background-color:lightgray"> <a href="#">{{$notification->data['data']}}</a></p>
                            @endforeach
                                            
                                    
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
                    <a class="dropdown-item" href="{{route('buyer_password')}} "><i class="fa fa-key"></i>Password</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{route('profile_buyer')}} "><i class="fa fa-user-md"></i> Profile</a>
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

<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>

    <script src="https://rawgithub.com/darkskyapp/skycons/master/skycons.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.18.1" defer></script>
    <script src="/js/app.js" defer></script>
<script src="{{asset('master/plugins/styling/uniform.min.js')}}"></script>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="/css/app.css">
    <script src="https://rawgithub.com/darkskyapp/skycons/master/skycons.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.18.1" defer></script>
    <script type="module" src="/js/app.js" defer></script>
     <!-- <script src="{{ asset('fore/js/app.js') }}"></script> -->
     <script type="module" src="./js/main.js"></script>


 <link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css"> 
  <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script> 
  <script type="text/javascript" src="{{asset('assets/js/echarts.min.js')}}"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->


    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/w3.css') }}" />
    @yield('styles')
</head>
<body class="app sidebar-mini rtl ">
    
    @include('ware_house.partials.header')
    @include('ware_house.partials.side')
    <main class="app-content" id="app">
        <div class="container text-center" >
    <div class="col-md-11 text-center">       
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Weather forecast for {{ $current->city }}-{{ $current->country }}</div>
                <div class="card-body ">
                    @php

                        function convert2cen($value,$unit){
                            if($unit=='C'){
                                return $value;
                            }elseif($unit=='F'){
                                $cen=($value-32)/1.8;
                                // echo $cen;
                                return round($cen,2);

                            }
                        }
                        @endphp

                  

                     <div class="text-black mb-10 ">    
                        <div class="weather-container font-sans md:w-128 max-w-lg rounded-lg overflow-hidden bg-gray-900 shadow-lg mt-8">
                          <div class="current-weather flex items-center justify-between px-6 py-8">
                            <div class="flex flex-col md:flex-row items-center">
                              <div>
                                Today
                                <div class="text-6xl font-semibold">{{ convert2cen($current->temp,$current->temp_unit) }}°C</div>
                                <!-- <div>Feels like 23°C</div> -->
                              </div>
                              <div class="md:mx-5">
                                <div class="font-semibold">{{$current->description}}</div>
                                <div></div>
                              </div>
                            </div>
                            <div>
                               <img style="margin-left: -10px" src="{{$current->image}}">
                            </div>
                          </div> <!-- end current-weather -->

                          <div class="future-weather text-sm bg-gray-800 px-6 py-8 overflow-hidden">
                            <div>
                                @foreach ($forecast as  $f)
                              <div class="w-1/6 text-lg text-gray-200">{{ $f->day }}</div>
                              <div class="w-4/6 px-4 flex items-center">
                                <div><img height="24" width="24" src="{{$f->image}} "></div>
                                <div class="ml-3">{{$f->phrase }}</div>
                              </div>
                              <div class="w-1/6 text-right">
                                <div>{{ convert2cen($f->low,$f->low_unit) }}°C</div>
                                <div>{{ convert2cen($f->high,$f->high_unit) }}°C</div>
                              </div>
                              @endforeach
                            </div>
                          </div> <!-- end future-weather -->

                        </div> <!-- end weather-container -->
                      </div>


                
                </div>                     
                </div>
            </div>
        </div>
    </div>
</div>
    </main>

<script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('backend/js/popper.min.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>

  <link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css"> 
  <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script> 
  <script type="text/javascript" src="{{asset('assets/js/echarts.min.js')}}"></script>

    @stack('scripts')
</body>
<div id="layoutAuthentication_footer">
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; MpekeXchange {{now()->format( 'Y')}}</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
                <div ><a target="_blank" href="https://billbrain.tech/">powered by MpekeXchange</a></div>
            </div>
        </div>
    </footer>
</div>
</html>

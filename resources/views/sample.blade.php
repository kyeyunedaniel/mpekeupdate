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

    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/w3.css') }}" />
    @yield('styles')
</head>
<body class="app sidebar-mini rtl">
    

      
    <main class="app-content" id="app">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-briefcase"></i> update xml file</h1>
        </div>
        @if(session('status'))
        <div class="alert alert-success" role='alert'>
          {{session('status')}}
        </div>
        @endif
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">xml file</h3>
                <form action="create" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                    <div class="form-row">
                     <div class="form-group col-md-6">
                            <label><b>metric Type</b></label>
                              <select class="w3-select w3-border w3-margin-bottom" name="Type" required>
                                <option value="" disabled selected>Select metric Type</option>
                                <option value="product">PRODUCT</option>
                                <option value="business">BUSINESS</option>
                                <option value="project">PROJECT</option>
                                <option value="resource">RESOURCE</option>
                                <option value="team">TEAM</option>
                              </select>
                            </div>
                            </div>
                        <div class="form-row">                        
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Metric name</label>
                          <input type="text" class="form-control" name="email" id="inputEmail4" placeholder="Metric Name">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">data Source</label>
                          <input type="text" class="form-control" name="name" id="inputPassword4" placeholder="data source">
                        </div>
                      </div>
                      <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputAddress">visualization name</label>
                        <input type="text" name='visualizationname' class="form-control" id="inputAddress" placeholder="visualization name">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputAddress2">visualization Link</label>
                        <input type="text" class="form-control" name="visualizationlink" id="inputAddress2" placeholder="visualization link">
                      </div>
                      </div>
                      <!-- div class="form-row"> -->
                        <div class="form-group">
                          <label for="inputCity">Metric description</label>
                          <textarea type="text" class="form-control" row='3' name="description" placeholder="metric description" id="inputCity"></textarea>
                        </div>                       
                       
                    <div class="tile-footer" style='text-align:center'>
                        <button class="btn btn-primary" name="OK" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>SUBMIT</button>
                        
                    </div>
                </form>
            </div>
        </div>
        
    </div>
    </main>
    <script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>
    <script src="https://unpkg.com/vue@2.0.3/dist/vue.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    @stack('scripts')
</body>
</html>

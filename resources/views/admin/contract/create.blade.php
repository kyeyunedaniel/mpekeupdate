    @extends('admin.app')
    @section('title') Create contract @endsection
    =@section('content')
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
     <script type="text/javascript" src="{{asset('js/bootstrap-multiselect.js')}}"></script>
   <link href="{{asset('css/bootstrap-multiselect.css')}}" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
        <div class="app-title bg-info">
            <div class="bg-info">
                <h1><i style="color: white" class="fa fa-shopping-bag"></i> Contract - Initiate Contact</h1>
            </div>
        </div>
        <div class="row">
            @if(session('success'))
            <div class="alert alert-success" role='alert'>
            {{session('success')}}
            </div>
            @endif
        </div>
        <div class="row user">
            <!-- <div class="col-md-2">
                <div class="tile p-0">
                    <ul class="nav flex-column nav-tabs user-tabs">
                        <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                    </ul>
                </div>
            </div> -->
            
            <div class="col-md-12">
                <div class="tab-content">
                    <div class="tab-pane active" id="general">
                        <div class="tile">
                            @if(auth()->user()->NIN && auth()->user()->trading_license)
                            <form action="{{route('admin.contracts.store')}} " aria-label="{{ __('Upload') }}" enctype="multipart/form-data" method="POST" role="form">
                                @csrf
                                <h3 class="tile-title">Contract Details </h3>
                                <hr>
                                <div style="margin-left: 80px;" class="tile-body">

                                   <div class="row">
                                    
                                       <div class=" col-md-6 form-group">
                                        <label class="control-label" for="LandSize">Land Size (Acres)</label>
                                        <input
                                            class="form-control @error('LandSize') is-invalid @enderror"
                                            type="decimal"
                                            placeholder="Enter Land Size"
                                            id="LandSize"
                                            name="LandSize"
                                            value="{{ old('LandSize') }}"
                                        />
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('LandSize') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class=" col-md-6 form-group">
                                        <label class="control-label" for="Location">Location</label>
                                        <input
                                            class="form-control @error('Location') is-invalid @enderror"
                                            type="text"
                                            placeholder="Enter Location"
                                            id="Location"
                                            name="Location"
                                            value="{{ old('Location') }}"
                                        />
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('Location') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                    <div class="row">
                                    
                                       <div class=" col-md-6 form-group">
                                            <label class="control-label" for="name">Expected Quantity</label>
                                            <input
                                                class="form-control @error('name') is-invalid @enderror"
                                                type="number"
                                                placeholder="Enter maize qty"
                                                id="qty"
                                                name="qty"
                                                value="{{ old('qty') }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('qty') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                          <div class="col-md-6 form-group">
                                                <label class="control-label" for="">Proposed price (Ugx)</label>
                                                <input
                                                    class="form-control @error('price') is-invalid @enderror"
                                                    type="number"
                                                    placeholder="Enter Proposed price"
                                                    id="price"
                                                    name="price"
                                                    value="{{ old('price') }}"
                                                />
                                                <div class="invalid-feedback active">
                                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('price') <span>{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                         
                                    </div>
                                <div class="row">  

                                <div class="form-group col-md-6">
                                    <label class="control-label" for="date_available">Date available</label>
                                    <input
                                        class="form-control @error('date_available') is-invalid @enderror"
                                        type="date"
                                        placeholder="Enter maize date_available"
                                        id="date_available"
                                        name="date_available"
                                        value="{{ old('date_available') }}" 
                                    />
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('date_available') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                  <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="brand_id">Maize Stage</label>
                                                <select  name="maize_status" id="framework" class="form-control @error('maize_status') is-invalid @enderror">
                                                    <option value="">Select status</option>
                                                    <option value="Growth">Growth</option>
                                                    <option value="Ready">Ready</option>
                                                    <option value="Harvested">Harvested</option>
                                                    <option value="Sun drying">Sun drying</option>
                                                </select>
                                                <div class="invalid-feedback active">
                                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('maize_status') <span>{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                
                                </div>
                                    <!-- <div class="row"> -->
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="brand_id">Warehouse Name</label>
                                                <select name="categories_id" id="categories_id" class="form-control @error('categories_id') is-invalid @enderror">
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback active">
                                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('categories_id') <span>{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                          <div class=" col-md-6 form-group">
                                        <label class="control-label" for="Quality">Maize Type</label>
                                        <select required name='Quality' backgroundColor="white"  class="form-control">
                                            <option value="">Select maize type</option>
                                            <option value="dent corn">dent corn</option>
                                            <option value="flint corn">flint corn</option>
                                            <option value="pod corn">pod corn</option>
                                            <option value="popcorn">popcorn</option>
                                            <option value="flour corn">flour corn</option>
                                            <option value="sweet corn" >sweet corn</option>
                                        </select>
<!--                                         
                                        <!-- <input
                                            class="form-control @error('Quality') is-invalid @enderror"
                                            type="text"
                                            placeholder="Enter quality Quality"
                                            id="Quality"
                                            name="Quality"
                                            value="{{ old('Quality') }}"
                                        /> -->
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('Quality') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                         
                                    </div>
                                    
                                     </div>                                          
                                          
                                    </div>

                                   
                                  
                                </div>
                                <div class="tile-footer">
                                    <div class="row d-print-none mt-2">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Contract</button>
                                            <a class="btn btn-danger" href="{{route('contracts.admin.index')}} "><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @else
                             <div class="col-lg-6 col-md-7 col-sm-12">
                                <div class="single-content mt-15 text-center">
                                <p  >Update your profile first <strong><a href="{{route('profile')}} "> Profile</a></strong> </p>
                                 </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
     @push('scripts')
        <script type="text/javascript">
            // $("#StartDate, #EndDate").datepicker();

            $("#end").change(function () {
                var startDate = document.getElementById("start").value;
                var endDate = document.getElementById("end").value;
             
                if ((Date.parse(endDate) <= Date.parse(startDate))) {
                    alert("End date should be greater than Start date");
                    document.getElementById('end').value=startDate;
                    document.getElementById("end").value = "";
                }
            });
        </script>
        <script>
    $(document).ready(function(){
     $('#framework').multiselect({
      nonSelectedText: 'Select a project category',
      enableFiltering: true,
      enableCaseInsensitiveFiltering: true,
      buttonWidth:'460px'
     });
     $('#categories_id').multiselect({
      nonSelectedText: 'Select a project category',
      enableFiltering: true,
      enableCaseInsensitiveFiltering: true,
      buttonWidth:'460px'
     });
     
     $('#framework_form').on('submit', function(event){
      event.preventDefault();
      var form_data = $(this).serialize();
       $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
       url:"{{ route('contracts.contracts.store') }}",
       method:"POST",
       data:form_data,
       success:function(data)
       {
        $('#framework option:selected').each(function(){
         $(this).prop('selected', false);
        });
        $('#framework').multiselect('refresh');
        alert(data['success']);
       }
      });
     });
    });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script> 

    @endpush

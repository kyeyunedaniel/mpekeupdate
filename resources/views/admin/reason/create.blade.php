    @extends('farmer.app')
    @section('title') Create contract @endsection
    =@section('content')
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
     <script type="text/javascript" src="{{asset('js/bootstrap-multiselect.js')}}"></script>
   <link href="{{asset('css/bootstrap-multiselect.css')}}" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
        <div class="app-title bg-info">
            <div class="bg-info">
                <h1><i style="color: white" class="fa fa-shopping-bag"></i> Reasons for Contract reject</h1>
            </div>
        </div>
        @include('admin.partials.flash')
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
                            <form action="{{route('contracts.contracts.store')}}" aria-label="{{ __('Upload') }}" enctype="multipart/form-data" method="POST" role="form">
                                @csrf
                                <h3 class="tile-title">Reason List</h3>
                                <hr>
                                <div style="margin-left: 80px;" class="tile-body">
                                    <div class="row">
                                    <div class=" col-md-6 form-group">
                                        <label class="control-label" for="name">Reason</label>
                                        <input
                                            class="form-control @error('name') is-invalid @enderror"
                                            type="text"
                                            placeholder="Enter reason "
                                            id="name"
                                            name="name"
                                            value="{{ old('name') }}"
                                        />
                                    </div>
                                </div>
                                
                                    <!-- <div class="row"> -->
                                 
                                </div>
                                <div class="tile-footer">
                                    <div class="row d-print-none mt-2">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Contract</button>
                                            <a class="btn btn-danger" href="{{route('contracts.contracts.index')}} "><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

 @extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
<body class="app sidebar-mini rtl">

    <div class="app-title">
        <div>
            <h1><i class="fa fa-briefcase"></i> REJECT THE CONTRACT</h1>
        </div>
       
    </div>
     @if(session('status'))
        <div class="alert alert-success" role='alert'>
          {{session('status')}}
        </div>
        @endif
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="tile">
                <form action="{{route('admin.reject.store')}} " method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                   
                        <div class="">  
                                            
                        <div class="form-group">
                          <label for="inputEmail4">Name</label>
                          <input type="text" class="form-control" name="name"  value="{{$reject->name}}" placeholder=" Name">
                          <input type="hidden" name="id" value="{{ $reject->id }}" >
                        </div>
                      </div>
                       
                      <div class="">
                        <div class="form-group">
                          <label for="inputCity">Reason</label>

                           <textarea class="form-control @error('reject') is-invalid @enderror" name="reject" placeholder="contract reject reason" rows="6" cols="30" required></textarea>
                        </div>  
                        </div>                     
                       
                    <div class="tile-footer" style='text-align:center'>
                        <button class="btn btn-primary" name="OK" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>SUBMIT</button>

                         <a class="btn btn-danger" href="{{ route('contracts.admin.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                        
                    </div>
                </form>
            </div>
        </div>
        
    </div>
    
@endsection
@push('scripts')

@endpush
@stack('scripts')
</body>
</html>

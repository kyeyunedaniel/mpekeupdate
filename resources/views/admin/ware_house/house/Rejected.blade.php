        @extends('admin.app')
        @section('title') Update warehouse Accounts @endsection
        @section('content')
            <div class="app-title">
                <div>
                    
                </div>
            </div>
            @include('admin.partials.flash')
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="tile">
                        
                        <form action=" {{route('admin.ware_house.house.reject')}} " method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="tile-body">
                                <input type="hidden" name="id" value="{{$employee->id}}">

                                                 
                                 <div class="form-group">
                                    <label class="control-label" for="Warehouse">Warehouse Name <span class="m-l-5 text-danger"> *</span></label>
                                    <input placeholder="Enter Warehouse Name" class="form-control @error('Warehouse') is-invalid @enderror" type="text" name="Warehouse" id="Warehouse" value="{{ old('Warehouse',$employee->name) }}"/>
                                    @error('Warehouse') {{ $message }} @enderror
                                </div>
                                 <div class="form-group">
                                  <label for="inputCity">Reason</label>
                                  <textarea type="text" class="form-control" row='3' name="reason" placeholder="warehouse reason reject" id="inputCity"></textarea>
                                </div>                      
                                   
                                
                            </div>
                            <div class="tile-footer">
                                <button style="margin-left: 320px;" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Reject</button>
                                
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endsection
        @push('scripts')

        @endpush

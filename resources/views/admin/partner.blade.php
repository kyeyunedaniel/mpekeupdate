@extends('admin.app')
@section('title')Partners @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class=""></i> Partners</h1>
        </div>
        <div class="col-sm-5 col">
		<a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Add</a>
	</div>

    </div>
    <div class="row">
    	 @if(session('success'))
        <div class="alert alert-success" role='alert'>
          {{session('success')}}
        </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <!-- <th> # </th> -->
                            <th> Logo </th>
                            <th>Name </th>
                                                        
                            <!-- <th class="text-center">FARMER image </th> -->
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i>Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $employ)
                                <tr>
                                  <td><img height="80px" width="80" src="{{asset($employ->logo)}}" alt="">
                                  </td>
                                    
                                    
                                    <td>{{ $employ->name }}</td>
                                    
                                    <td class="text-center">
                                        <div class=" actions btn-group" role="group" aria-label="Second group">
                                            <a class="btn btn-sm btn-primary" data-toggle="modal" href="{{route('admin.reason.edit',$employ->id)}}" data-target="#edit_specialities_details{{$employ->id}}">
												<i class="fe fe-pencil"></i> Edit
											</a>
                                            &nbsp;
                                            <a class="btn btn-sm btn-primary" data-toggle="modal" href="#delete_modal{{ $employ->id}}" class="btn btn-sm bg-danger-light">
												<i class="fe fe-trash"></i> Delete
											</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Modal -->
			<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content" style="width: 850%; ">
						<div class="modal-header">
							<h5 class="modal-title">Add Partner</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{route('admin.partner.store')}}" enctype="multipart/form-data" method="post">
								     @csrf
			                        <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label">Name</label>
			                            <input type="text" class="form-control" id="name" name="name"
			                                 required >
			                        </div>
			                        <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label">Logo</label>
			                            
			                                 <input  type="file" class="form-control" id="name" name="logo"
			                                  >
			                        </div>
			                        <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
								</div>
								
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /ADD Modal -->
			
			<!-- Edit Details Modal -->
			@foreach($products as $k=>$try_m)
			<div class="modal fade" id="edit_specialities_details{{$try_m->id}}" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content" style="width:260%">
						<div class="modal-header">
							<h5 class="modal-title">Edit Partner</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{route('admin.partner.edit')}}" enctype="multipart/form-data" method="post">
								@csrf
								   <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label"><strong>Name</strong></label>
			                            <input value="{{old('name', $try_m->name)}}" type="text" class="form-control" id="name" name="name"
			                                  >
			                                  <input type="hidden" name="id" value="{{$try_m->id}}">
			                        </div>
			                        <div class="form-group card-label">
			                            <label for="Description" class="col-form-label"><strong>Logo</strong> </label>
			                            <input  type="file" class="form-control" id="name" name="logo"
			                                  >
			                        </div>
			                        
								<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			<!-- /Edit Details Modal -->
			
			<!-- Delete Modal -->
			@foreach($products as $k=>$try_m)
			<div class="modal fade" id="delete_modal{{ $try_m->id}}" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					<!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">Delete</h4>
								<p class="mb-4">Are you sure want to delete?</p>
								<form action="{{route('admin.reason.delete')}}">
									<input type="hidden" name="id" value="{{$try_m->id}}">
									<button type="submit" class="btn btn-primary">Save </button>
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								</form> 
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			<!-- /Delete Modal -->
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush

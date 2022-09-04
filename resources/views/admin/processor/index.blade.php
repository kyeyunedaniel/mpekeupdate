@extends('admin.app')
@section('title') Processor @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class=""></i> Processor</h1>
        </div>
        <div class="col-sm-5 col">
								<a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Add</a>
							</div>

    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <!-- <th> # </th> -->
                           <th> PHOTO </th>
                            <th>NAME</th>
                            <th> EMAIL  </th>
                            <th>CONTACT </th>
                                                        
                            <!-- <th class="text-center">FARMER image </th> -->
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i>Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($ware_house as $employ)
                                <tr>
                                <td>{{ $employ->name }}</td>
                                    <td>{{ $employ->email }}</td>
                                    <td>{{ $employ->name }}</td>
                                    <td>{{ $employ->email }}</td>                              
                                  
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('armer.edit', $employ->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit">&nbsp;EDIT</i></a>
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
				<div style="min-width: 676px" class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content" style="width: 850%; ">
						<div class="modal-header">
							<h5 class="modal-title">Add Processor</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{route('admin.Trasporter.store')}}" enctype="multipart/form-data" method="post">
								     @csrf
			                <div class="row">
			                	<div class="form-group col-md-6">
                            <label>User type</label>
                              <select class="w3-select w3-border w3-margin-bottom" name="kind" required>
                                <option value="" disabled selected>Select user kind</option>
                                <option value="buyer">Buyer</option>
                                <option value="farmer">Farmer</option>
                                <option value="transporter">Transporter</option>
                                <option value="processor">Processor</option>
                                <option value="ware_house">Warehouse Manager</option>
                              </select>
                        </div>
                         <div class="form-group col-md-6">
                            <label class="control-label" for="Username">Username <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Username" class="form-control @error('Username') is-invalid @enderror" type="text" name="Username" id="Username" value="{{ old('Username') }}"/>
                            @error('Username') {{ $message }} @enderror
                        </div>
			                </div>
                        <div class="row">
                        	<div class="form-group col-md-6">
                            <label class="control-label" for="fname">First Name <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter First Name" class="form-control @error('fname') is-invalid @enderror" type="text" name="fname" id="fname" value="{{ old('fname') }}"/>
                            @error('fname') {{ $message }} @enderror
                        </div>
                         <div class="form-group col-md-6">
                            <label class="control-label" for="lname">Last Name <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Last Name" class="form-control @error('lname') is-invalid @enderror" type="text" name="lname" id="lname" value="{{ old('lname') }}"/>
                            @error('lname') {{ $message }} @enderror
                        </div>
                        </div>
                        <div class="row">
                        	<div class="form-group col-md-6">
                            <label class="control-label" for="email">Email <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="email" id="email" placeholder="Enter Email" value="{{ old('email') }}"/>
                            @error('email') {{ $message }} @enderror
                        </div>
                      <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                           <div class="row">
                           	 <div class="form-group col-md-6">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          <div class="form-group col-md-6">
                            <label class="control-label" for="tagline">Contact Line <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter contact line" class="form-control @error('tagline') is-invalid @enderror" type="text" name="tagline" id="tagline" value="{{ old('tagline') }}"/>
                            @error('tagline') {{ $message }} @enderror
                        </div>
                           </div>
                       <!--  <div class="form-group">
                            <label><b>About me</b></label>
                            <textarea class="form-control @error('summery') is-invalid @enderror" name="summery" placeholder="summary" rows="6" cols="50" required></textarea>
                            @error('summery') {{ $message }} @enderror
                        </div> -->
                       <div class="row">
                       	 <div class="form-group">
                            <label class="control-label">Profile Photo</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/*"/>
                            @error('image') {{ $message }} @enderror
                        </div>
                           </div>
			                        <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
								</div>
                       </div>
								
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /ADD Modal -->
			
			<!-- Edit Details Modal -->
			@foreach($ware_house as $k=>$try_m)
			<div class="modal fade" id="edit_specialities_details{{$try_m['id']}}" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content" style="width:260%">
						<div class="modal-header">
							<h5 class="modal-title">Edit Processor</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{route('admin.Trasporter.edit')}} " method="post">
								@csrf
								   <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label"><strong>Name</strong></label>
			                            <input value="{{old('name', $try_m['name'])}}" type="text" class="form-control" id="name" name="name"
			                                  >
			                                  <input type="hidden" name="id" value="{{$try_m['id']}}">
			                        </div>
			                        <div class="form-group card-label">
			                            <label for="Description" class="col-form-label"><strong>Action</strong> </label>
			                            <textarea class="form-control @error('CompanyDescription') is-invalid @enderror" name="action"  rows="1" cols="2" required>{{old('action', $try_m['action'])}}</textarea>
			                        </div>
			                        <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label"><strong>Icon</strong> </label>
			                            <input value="{{old('logo', $try_m['icon'])}}"  type="text" class="form-control" id="name" name="logo"
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
			@foreach($ware_house as $k=>$try_m)
			<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
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
								<form action="{{route('admin.Trasporter.delete')}}">
									<input type="hidden" name="id" value="{{$try_m['id']}}">
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

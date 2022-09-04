@extends('transportor.app')
@section('content')	
	<!-- Page Wrapper -->
	<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">Vehicles</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index_admin">Dashboard</a></li>
									<li class="breadcrumb-item active">Vehicles</li>
								</ul>
							</div>
							<div class="col-sm-5 col">
								<a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Add</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-sm-12">
						            <div class="tile">
                <div class="tile-body">
                   <table class="table table-hover table-bordered" id="sampleTable">
					<thead>
						<tr>
							<th>image</th>
							<th>Name</th>
							<th>Registered as</th>
							<th>location</th>
							<th>Description</th>
							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $try_m)
						<tr>
							<td>
								<!-- <img src="{{asset($try_m->image) }}"> -->
								<img height="75px" width="75px" class="rounded-circle" alt="proc" src="@if($try_m->image){{asset($try_m->image)}}@else{{asset('assets/img/avatar3.png')}} @endif">
							</td>
							
							<td>
								{{$try_m->name}}
							</td>
							<td>
								@if($try_m->category=='Freelance')
								{!! nl2br($try_m->category) !!}
								@else
								@foreach($categories as $category)
								@if($category->id==$try_m->category)
								{{ $category->name }}
								@endif
								@endforeach
								@endif
							</td>
							<td>
								{{$try_m->location}}
							</td>
							<td>{!! nl2br($try_m->description) !!}</td>
							<td class="text-right">
								<div class=" ">
								<a class="btn btn-sm bg-success-light text-info" data-toggle="modal" href="{{route('Trasporter.edit',$try_m->id)}}" data-target="#edit_specialities_details{{$try_m->id}}">
									<i class="fe fe-pencil"></i> Edit
								</a>

									<a  data-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
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
				</div>			
			</div>
			<!-- /Page Wrapper -->
			
			
			<!-- Add Modal -->
			@if(auth()->user()->NIN && auth()->user()->driving_license)
			<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content" style="width: 850%; ">
						<div class="modal-header">
							<h5 class="modal-title">Add Vehicles</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							
							<form action="{{route('Trasporter.store')}}" enctype="multipart/form-data" method="post">
								     @csrf

								      <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label">Location</label>
			                            <input type="text" class="form-control" id="Location" name="Location"
			                                 required >
			                        </div>
			                        
			                        <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label">Name</label>
			                            <input type="text" class="form-control" id="name" name="name"
			                                 required >
			                        </div>
			                        <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label">Description</label>
			                            <!-- <input type="text" class="form-control" id="action" name="action"
			                                 required > -->
			                                 <textarea class="form-control @error('CompanyDescription') is-invalid @enderror" name="action"  rows="3" cols="5" placeholder=" weight carried(Min and max),number plate" required></textarea>
			                        </div>
			                        <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label">Icon</label>
			                            <input name="image" type="file"  class="form-control" required>

			                        </div>
			                        <div>
			                        	<div class="text-center"><strong>Register as</strong> </div>
                                        <label class="payment-radio paypal-option">
                                            <input onchange="show(this.value)" type="radio" value="Freelance" name="radio" checked>
                                            <span class="checkmark"></span>
                                            Freelance
                                    </label>
                                         <label style="margin-left:30px" class="payment-radio paypal-option">
                                            <input onchange="showmm(this.value)" type="radio" value="Warehouse" name="radio" >
                                            <span class="checkmark"></span>
                                            Warehouse
                                    </label>
                                    
                                    </div>
                                    <!-- form field -->
                                    <div style="display: none;" id="momo" class="row">
                                         <div class="row">
                                           
                                        <div class="col-md-6">
                                            <div class="form-group card-label">
                                                <label style="margin-left:30px">
                                                     <span style="color: #959595">Warehouse</span>
                                                    <select style="width: 259px; " id="service" name="service" class="form-control custom-select">
                                                        <option>Selecte Warehouse</option>
                                                       @foreach($categories as $category)
			                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
			                                            @endforeach
                                                    </select>
                                                   
                                                </label>
                                           </div>
                                                
                                        </div>
                                       
                                        </div>
                                    </div>
			                        <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
								</div>
								
							</form>
							
						</div>
					</div>
				</div>
			</div>
			 @else
			 <div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content" style="width: 850%; ">
						<div class="modal-header">
							<h5 class="modal-title">Update Your Profile</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							<div class="col-lg-6 col-md-7 col-sm-12">
							<div class="single-content mt-15 text-center">
							<p  ><strong><a href="{{url('Trasporter/profile')}} ">click to complete your profile details </a></strong> </p>
								</div>
							</div>
					
						</div>
					</div>
				</div>
			</div>
			@endif
			<!-- /ADD Modal -->
			
			<!-- Edit Details Modal -->
			@foreach($products as $k=>$try_m)
			<div class="modal fade" id="edit_specialities_details{{$try_m->id}}" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content" style="width:260%">
						<div class="modal-header">
							<h5 class="modal-title">Edit Vehicles Details</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{route('Trasporter.edit')}} " method="post">
								@csrf
								   <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label"><strong>Name</strong></label>
			                            <input value="{{old('name', $try_m->name)}}" type="text" class="form-control" id="name" name="name"
			                                  >
			                                  <input type="hidden" name="id" value="{{$try_m->id}}">
			                        </div>
			                        <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label"><strong>Location</strong></label>
			                            <input value="{{old('Location', $try_m->location)}}" type="text" class="form-control" id="Location" name="Location" 	                                  >
			                        </div>
			                        <div class="form-group card-label">
			                            <label for="Description" class="col-form-label"><strong>Descrription</strong> </label>
			                            <textarea class="form-control @error('CompanyDescription') is-invalid @enderror" name="action"  rows="3" cols="6" required>{{old('action', $try_m->description)}}</textarea>
			                        </div>
			                        <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label"><strong>Icon</strong> </label>
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
								<form action="{{route('Trasporter.delete')}}">
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
        </div>
		<!-- /Main Wrapper -->
		 <script type="text/javascript">
       
        function showmm(mm){
            document.getElementById('momo').style.display='block';
            document.getElementById('card').style.display='none';
            document.getElementById('paypal').style.display='none';
        }
         function showcc(ccard){
            document.getElementById('momo').style.display='none';
            document.getElementById('card').style.display='none';
            document.getElementById('paypal').style.display='none';
        }
        function show(pay){
            document.getElementById('momo').style.display='none';
            document.getElementById('card').style.display='none';
            document.getElementById('paypal').style.display='block';
        }
    </script>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    

@endpush
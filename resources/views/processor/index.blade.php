@extends('processor.app')
@section('content')
	<div class="page-header">
	<div class="row">
		<div class="col-sm-7 col-auto">
			<h3 class="page-title">Processors</h3>
			<ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="index_admin">Dashboard</a></li>
				<li class="breadcrumb-item active">Processors</li>
			</ul>
		</div>
		<div class="col-sm-5 col">
			<a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Add</a>
		</div>
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
							<th>image</th>
							<th>Name</th>
							<th>Category</th>
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
							<td>{!! nl2br($try_m->category) !!}</td>
							<td>
								{{$try_m->Location}}
							</td>
							<td>{!! nl2br($try_m->description) !!}</td>
							<td class="text-right">
								<div class=" ">
								<a class="btn btn-sm bg-success-light text-info" data-toggle="modal" href="{{route('processor.edit',$try_m->id)}}" data-target="#edit_specialities_details{{$try_m->id}}">
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

    <!-- Add Modal -->
			<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content" style="width: 850%; ">
						<div class="modal-header">
							<h5 class="modal-title">Add Processor</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{route('processor.store')}}" enctype="multipart/form-data" method="post">
								     @csrf
			                        <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label"><strong>Name</strong></label>
			                            <input  type="text" class="form-control" id="name" name="name"
			                                  >
			                                  
			                        </div>
			                        <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label"><strong>Category</strong></label>
			                            <input  type="text" class="form-control" id="Category" name="Category"
			                                  >
			                            </div>
			                            <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label"><strong>Location</strong></label>
			                            <input  type="text" class="form-control" id="Location" name="Location"
			                                  >
			                            </div>
			                        <div class="form-group card-label">
			                            <label for="Description" class="col-form-label"><strong>Description</strong> </label>
			                            <textarea class="form-control @error('CompanyDescription') is-invalid @enderror" name="action"  rows="1" cols="2" required></textarea>
			                        </div>
			                         <div >
                                         <div class="text-center"><strong>Register as</strong> </div>
                                         	<label style="margin-left: 10px;" class="payment-radio Freelance-option">
	                                            <input onchange="showmm(this.value)" type="radio" value="Freelance" name="radio">
	                                            <span class="checkmark"></span>
	                                            Freelance
	                                        </label>
		                                    <label style="margin-left: 120px;" class="payment-radio Warehouse-option">
		                                            <input onchange="show(this.value)" type="radio" value="Warehouse" name="radio">
		                                            <span class="checkmark"></span>
		                                            Warehouse
		                                    </label>
		                                   
                                    </div>

                                     <div style="display: none;" id="Warehouse">
                                        <div class="form-group">
                                        <label class="control-label" for="brand_id">Warehouse</label>
                                        <select name="categories_id" id="categories_id" class="form-control @error('categories_id') is-invalid @enderror">
                                            @foreach($categories as $category)
                                            <option value="">select warehouse</option>
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('categories_id') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    </div>

			                        <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label"><strong>image</strong> </label>
			                            <input   type="file" class="form-control" id="name" name="image"
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
			@foreach($products as $try_m)
			<div class="modal fade" id="edit_specialities_details{{$try_m->id}}" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content" style="width:260%">
						<div class="modal-header">
							<h5 class="modal-title">Edit Processor</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action=" " method="post">
								@csrf
								   <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label"><strong>Name</strong></label>
			                            <input value="{{old('name', $try_m->name)}}" type="text" class="form-control" id="name" name="name"
			                                  >
			                                  <input type="hidden" name="id" value="{{$try_m->id}}">
			                        </div>
			                        <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label"><strong>Category</strong></label>
			                            <input value="{{old('category', $try_m->category)}}" type="text" class="form-control" id="category" name="category"
		                                  >
		                              </div>
		                              <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label"><strong>Location</strong></label>
			                            <input value="{{old('Location', $try_m->Location)}}" type="text" class="form-control" id="Location" name="Location"
		                                  >
		                              </div>
			                        <div class="form-group card-label">
			                            <label for="Description" class="col-form-label"><strong>Description</strong> </label>
			                            <textarea class="form-control @error('CompanyDescription') is-invalid @enderror" name="action"  rows="1" cols="2" required>{{old('description', $try_m->description)}}</textarea>
			                        </div>
			                        <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label"><strong>image</strong> </label>
			                            <input value="{{old('logo', $try_m->image)}}"  type="text" class="form-control" id="name" name="logo"
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
			@foreach($products as $try_m)
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
								<form action="{{route('processor.delete')}}">
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
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script type="text/javascript">
    <script type="text/javascript">
       
        function showmm(mm){
            document.getElementById('momo').style.display='block';
            document.getElementById('card').style.display='none';
            document.getElementById('paypal').style.display='none';
        }
         function showcc(ccard){
            document.getElementById('momo').style.display='none';
            document.getElementById('card').style.display='block';
            document.getElementById('paypal').style.display='none';
        }
        function show(pay){
            document.getElementById('momo').style.display='none';
            document.getElementById('card').style.display='none';
            document.getElementById('paypal').style.display='block';
        }
    </script>
@endpush

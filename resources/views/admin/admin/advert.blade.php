@extends('admin.app')

@section('content')	
	<!-- Page Wrapper -->
	<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">Advert</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
									<li class="breadcrumb-item active">Advert</li>
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
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-bordered" id="sampleTable">
											<thead>

												<tr>
													<th>Logo</th>
													<th>Name</th>
													<th>Url</th>
													
													<th >Actions</th>
												</tr>
											</thead>
											<tbody>
												@foreach($products as $k=>$try_m)
												
												<tr>
													<td>
														<img height="80px" width="80" src="{{asset($try_m->image)}}" alt="">
													</td>
													
													<td>
														{{$try_m['partner_name']}}
													</td>
													<td>
														{{$try_m['url']}}
													</td>
												<!-- class=" text-info " -->
													<td  class="text-right">
														<div class="actions">
														<a class="btn btn-sm bg-success-light text-info" data-toggle="modal" href="{{route('edit-advert',$try_m['id'])}}" data-target="#edit_specialities_details{{$try_m['id']}}">
															<i class="fe fe-pencil"></i> Edit
														</a>

														@if($try_m['status']==1)

															<a  data-toggle="modal" href="#delete_modal{{$try_m['id']}}" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i> Block
																<input type="hidden" name="blok" value="yes">
															</a>
															@else
															<a  data-toggle="modal" href="#delete_modal{{$try_m['id']}}" class="btn btn-sm bg-success-light text-danger">
																<i class="fe fe-trash"></i> Blocked
																<input type="hidden" name="blok" value="no">
															</a>
															@endif
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
			</div>
			<!-- /Page Wrapper -->
			
			
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
							<form action="{{route('store-advert')}}" enctype="multipart/form-data" method="post">
								     @csrf
			                        <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label">Name</label>
			                            <input type="text" class="form-control" id="name" name="name"
			                            >
			                        </div><div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label">Url</label>
			                            <input type="text" class="form-control" id="url" name="url"
			                            >
			                        </div>
			                        <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label">Logo</label>
			                            <input name="logo" type="file"  class="form-control">

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
			<div class="modal fade" id="edit_specialities_details{{$try_m['id']}}" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content" style="width:260%">
						<div class="modal-header">
							<h5 class="modal-title">Edit Partner</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{route('edit-advert')}}" enctype="multipart/form-data" method="post">

								@csrf							
								   <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label"><strong>Name</strong></label>
			                            <input value="{{old('name', $try_m['partner_name'])}}" type="text" class="form-control" id="name" name="name"
			                                  >
			                                  <input type="hidden" name="id" value="{{$try_m['id']}} ">
			                        </div>
			                        <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label"><strong>Url</strong></label>
			                            <input value="{{old('url',$try_m['url'])}}" type="text" class="form-control" id="url" name="url"
			                                  >
			                        </div>
			                        
			                        <div class="form-group card-label">
			                            <label for="recipient-name" class="col-form-label"><strong>Logo</strong> </label>
			                            <input value="{{$try_m['image']}}" type="file" class="form-control" id="name" name="logo"
			                                  >
			                        </div>
								<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			
			<!-- /Edit Details Modal -->
			
			<!-- Delete Modal -->
			<div class="modal fade" id="delete_modal{{$try_m['id']}}" aria-hidden="true" role="dialog">
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
								<form action="{{route('admin.advert.delete')}}">
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
        </div>
		<!-- /Main Wrapper -->
@endsection

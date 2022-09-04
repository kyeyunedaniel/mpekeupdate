@extends('farmer.app')
@section('title') inventory @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class=""></i> List of inventory</h1>
        </div>
        <div class="row">
           @if(Session::has('success'))
            <div style="color: green" class="alert alert-success">
           {{Session::get('success')}}
           @endif
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
                <div class="col-md-8 mx-auto">
            <div class="tile">
                
                <form action=" {{route('admin.MI.store')}} " method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">

                        <div class="form-group">
                            <label>Warehouse</label>
                              <select class="w3-select w3-border w3-margin-bottom" name="Warehouse" required>
                                <option value="" disabled selected>Select Warehouse</option>
                                @foreach( $countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                                
                              </select>
                            </div>
                             <div class="form-group">
                            <label>Grain Type</label>
                              <select class="w3-select w3-border w3-margin-bottom" name="grain" required>
                                <option value="" disabled selected>Select Grain Type</option>
                                @foreach( $Grain as $country)
                                <option value="{{ $country->grain_type }}">{{ $country->grain_type }}</option>
                                @endforeach
                                
                              </select>
                            </div>
                         <div class="form-group">
                            <label class="control-label" for="Unit">Unit price <span class="m-l-5 text-danger"> *</span></label>
                            <input min="0" placeholder="Enter Unit price" class="form-control @error('Unit') is-invalid @enderror" type="number" name="Unit" id="Unit" value="{{ old('Unit') }}"/>
                            @error('Unit') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="quantity">Quantity in Kgs <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('quantity') is-invalid @enderror" type="number" name="quantity" id="quantity" min="0" placeholder="Enter quantity in Kgs" value="{{ old('quantity') }}"/>
                            @error('quantity') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label>Farmer</label>
                              <select class="w3-select w3-border w3-margin-bottom" name="farmer" required>
                                <option value="" disabled selected>Select farmer</option>
                                
                                <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                                
                                
                              </select>
                            </div>
                        <div class="form-group">
                            <label>Grain Status</label>
                              <select class="w3-select w3-border w3-margin-bottom" name="Status" required>
                                <option value="" disabled selected>Select grain Status</option>
                                <option value="Harvested">Harvested</option>    
                                <option value="Growth period">Growth period</option>
                                <option value="Ready">Ready</option>
                              </select>
                            </div>
                          <div class="form-group">
                            <label class="control-label" for="Delivery">Delivery Date<span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Delivery Date" class="form-control @error('Delivery') is-invalid @enderror" type="date" name="Delivery" id="Delivery" value="{{ old('Delivery') }}"/>
                            @error('Delivery') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label>Grain Quality</label>
                              <select class="w3-select w3-border w3-margin-bottom" name="Quality" required>
                                <option value="" disabled selected>Select grain quality</option>
                                <option value="Very good">Very good</option>    
                                <option value="good">Good</option>
                                <option value="Bad">Bad</option>
                                <option value="Very Bad">Very Bad</option>
                              </select>
                            </div>
                        <div class="form-group">
                            <label class="control-label">image</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="logo" accept="image/*"/>
                            @error('image') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="tile-footer" style="margin-left: 230px">
                        <button style="" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Create Account</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>


        <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            
                            <th>SAMPLE </th>
                            <th> WAREHOUSE </th>
                            <th>GRAIN TYPE</th>
                            <th> UNIT PRICE PER Kg  </th>
                            <th>Quantity in Stock </th>
                            <th>QUALITY </th>
                            
                            <th>DELIVERY DATE </th>
                            <th class=" text-danger"><i class="fa fa-bolt"> </i>Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($produce as $employ)

                            
                                <tr>
                                  
                                    <td>
                                        <div class="w3-col s12 w3-center">
                                         <img src="{{asset('frontend/images/avatar3.png')}}" width="20%" height="2%" class="" alt="">
                                     </div>
                                    </td>
                                    @foreach($countries as $warehouse)
                                    @if($warehouse->id==$employ->Warehouse_id)

                                    <td>{{ $warehouse->name }}</td>
                                    @endif
                                    @endforeach
                                     <td>{{$employ->name}}</td>                                   
                                   
                                    <td>{{$employ->price}} UGX</td>
                                    <td>
                                        {{$employ->quantity}}Kgs
                                    </td>
                                   
                                    <td>{{ $employ->Status }}</td>
                                    <td>{{ $employ->Delivery }} </td>
                                   
                                  
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('farmer.edit',$employ->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit">Edit</i></a>
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
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush

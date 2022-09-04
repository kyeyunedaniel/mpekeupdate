@extends('admin.app')
@section('title') Update User Account @endsection
@section('content')
    <div class="app-title">
        <div>
            
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="tile">
                
                <form action="{{route('admin.buyer.update')}} " method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                             <div class="form-group">
                            <label>Warehouse</label>
                              <select class="w3-select w3-border w3-margin-bottom" name="Warehouse" required>
                                @if($employee->grain)
                                @foreach( $countries as $country)
                                @if($employee->Warehouse_id==$country->id)

                                <option value="{{ $country->id}}" selected>{{ $country->name }}</option>
                                @endif
                                 @endforeach
                                @else
                                <option value="" disabled selected>Select Warehouse</option>
                                @foreach( $countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                                @endif
                                
                              </select>
                            </div>
                             <div class="form-group">
                            <label>Grain Type</label>
                              <select class="w3-select w3-border w3-margin-bottom" name="grain" required>
                                
                                @if($employee->grain)
                                <option value="{{ $employee->grain}}" selected>{{ $employee->grain }}</option>
                                @else
                                <option value="" disabled selected>Select Grain Type</option>
                                 @foreach( $Grain as $country)
                                <option value="{{ $country->grain_type }}">{{ $country->grain_type }}</option>
                                @endforeach
                                @endif
                                
                              </select>
                            </div>
                         <div class="form-group">
                            <label class="control-label" for="Unit">Unit price <span class="m-l-5 text-danger"> *</span></label>
                            <input min="0" placeholder="Enter Unit price" class="form-control @error('Unit') is-invalid @enderror" type="number" name="Unit" id="Unit" value="{{ old('Unit',$employee->Unit) }}"/>
                            @error('Unit') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="quantity">Quantity in Kgs <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('quantity') is-invalid @enderror" type="number" name="quantity" id="quantity" min="0" placeholder="Enter quantity in Kgs" value="{{ old('quantity',$employee->quantity) }}"/>
                            @error('quantity') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label>Farmer</label>
                              <select class="w3-select w3-border w3-margin-bottom" name="farmer" required>                                
                               
                                @if($employee->grain)
                                <option value="{{ $employee->grain}}" selected>{{ $employee->grain }}</option>
                                @else
                                <option value="" disabled selected>Select farmer</option>
                                 @foreach( $Grain as $country)
                                <option value="{{ $country->grain_type }}">{{ $country->grain_type }}</option>
                                @endforeach
                                @endif
                                
                                
                              </select>
                            </div>
                        <div class="form-group">
                            <label>Grain Status</label>
                              <select class="w3-select w3-border w3-margin-bottom" name="Status" required>
                                @if($employee->Status)
                                <option value="{{$employee->Status}}" selected>{{$employee->Status}}</option>
                                @else
                                <option value="" disabled selected>Select grain Status</option>
                                <option value="Harvested">Harvested</option>    
                                <option value="Growth period">Growth period</option>
                                <option value="Ready">Ready</option>
                                @endif
                              </select>
                            </div>
                          <div class="form-group">
                            <label class="control-label" for="Delivery">Delivery Date<span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Delivery Date" class="form-control @error('Delivery') is-invalid @enderror" type="date" name="Delivery" id="Delivery" value="{{ old('Delivery',$employee->Delivery) }}"/>
                            @error('Delivery') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label>Grain Quality</label>
                              <select class="w3-select w3-border w3-margin-bottom" name="Quality" required>
                                @if($employee->quality)
                                <option value="{{$employee->quality}}" selected>{{$employee->quality}} </option>
                                @else
                                <option value="" disabled selected>Select grain quality</option>
                                <option value="Very good">Very good</option>    
                                <option value="good">Good</option>
                                <option value="Bad">Bad</option>
                                <option value="Very Bad">Very Bad</option>
                                @endif
                              </select>
                            </div>
                    </div>
                        <div class="tile-footer">
                            <button style="margin-left: 310px" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>UPDATE</button>                            
                          
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush

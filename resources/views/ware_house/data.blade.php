@extends('admin.app')

@section('title', 'Data')

@section('content')
<div class="container-fluid">
  @if ($errors->any()) 
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
    <div class="row">
        <div class="col-md-6">
            <a href="{{url('admin/forecasting')}}"><h4 class="m-0 font-weight-bold">Back</h4></a>
            <!-- url()->previous() -->
        </div>
        <div class="col-md-6" style="text-align: right;">
            <a href="{{route('data.create')}} " class="btn btn-primary">Create Data</a>
            
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-4">
      <div class="card-body" style="overflow-y: scroll; max-height: 400px;">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Date</th>
                <th>Open</th>
                <th>High</th>
                <th>Low</th>
                <th>Close</th>
                <th>Volume</th>
              </tr>
            </thead>
            <tbody>
              
                @foreach ($items as $item)
                <tr>
                  <td>{{ $item->date }}</td>
                  <td>{{ $item->open }}</td>
                  <td>{{ $item->high }}</td>
                  <td>{{ $item->low }}</td>
                  <td>{{ $item->close }}</td>
                  <td>{{ $item->volume }}</td>
                </tr>
                @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
@endsection
@extends('admin.app')

@section('title', 'Create Data')

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
            <form action="{{ route('data.store') }}" method="POST" enctype="multipart/form-data" style="float:right;">
                @csrf
    
                <div class="form-inline">
                    <label for="Fiie" class="mx-2">File CSV</label>
                    <input type="file" name="file" placeholder="File" class="form-group mx-1">
                    <button class="btn btn-primary" style="float: right">
                        Upload CSV
                    </button>
                </div>
               
            </form>
        </div>
    </div>
  </div>
@endsection
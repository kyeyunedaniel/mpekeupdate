
@extends('buyer.app')
@section('title') SHOPPING CART @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class=""></i> Shopping cart! {{$cartd}} items</h1>
        </div>        
    </div>
    <div>
        @if(Session::has('success'))
            <div style="color: green" class="alert alert-success">
            {{Session::get('success')}}
            @endif 
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form   role="form" enctype="multipart/form-data">
                        @csrf
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th>PRODUCT DETAILS </th>
                            <th>UNIT PRICE </th>
                            <th>QUANTITY </th>
                            <th>SUB TOTAL</th>
                            
                            <th class="text-center">manage </th>
                           
                        </tr>
                        </thead>
                        <tbody>
                            <form method="post" action="{{route('buyer.payment')}} ">

                            @foreach($cart as $employ)
                            
                                <tr>
                                  
                                   <td>
                                        <div class="w3-col s12 w3-center">
                                             <img src="@if($employ->logo){{asset($employ->logo)}}@else{{asset('photos/agric.jpg')}}@endif" width="20%" height="2%" class="" alt="">
                                         </div>
                                    </td>
                                    
                                    <td>{{ $employ->name}}</td>
                                    <td>{{ $employ->price}}</td>
                                    <td>{{ $employ->quantity}}</td>

                                    @php
                                    $total_price=0;

                                    $total_price=$total_price+( $employ->price*$employ->quantity);

                                    @endphp
                                    <td>{{$total_price}} </td>
                                    <td>
                                        <input type="hidden" name="product_id" value="{{$employ->id}} ">
                 <button style="" class="btn btn-primary btn-submit" data-id="{{$employ->id}} " type="submit"><i class="fa fa-shopping-cart">&nbsp;
                    Remove
                 </i></button>
                </a>
                                         
                                    
                                </td>
                               
                                  
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align: right;">Total price &nbsp;UGx.{{$total_price}}</td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <div class="btn-group" role="group" aria-label="Second group">
                        <a href="{{ route('buyer.payment', $employ->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-shopping-cart">&nbsp;continue shopping</i></a>
                    </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript">
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $(".btn-submit").click(function(e){
  
        e.preventDefault();
   
        var name = $("input[name=name]").val();
        var product_id = $("input[name=product_id]").val();
        var id= $(this).val();
        var url = "{{URL('buyer/carts')}}";
        console.log('product_id');
        var dltUrl = url+"/"+product_id;
        alert(product_id);
   
        $.ajax({
           type:dltUrl,
           url:dltUrl,
           data:{id:id},
           success:function(data){
              alert(id);
              console.log(product_id);
           }
        });
  
   });
</script>
@endpush

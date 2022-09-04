@extends('admin.app')
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
    <!-- @include('admin.partials.flash') -->
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form  method="POST" role="form" enctype="multipart/form-data">
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

                            @foreach($cart as $employ)
                            
                                <tr>
                                  
                                   <td>
                                        <div class="w3-col s12 w3-center">
                                             <img src="@if($pro->logo){{asset($pro->logo)}}@else{{asset('photos/agric.jpg')}}@endif" width="20%" height="2%" class="" alt="">
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
                                       
                <button style="" class="btn btn-danger delete delete-product" id="{{$employ->id}}" type="submit"><i class="fa fa-shopping-cart">&nbsp;
                    Remove
                 </i></button>

                                         
                                    
                                </td>
                                  
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align: right;">Sub-Total price &nbsp;UGSHs.{{$total_price}}</td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <div class="btn-group" role="group" aria-label="Second group">
                         <a href="{{ route('buyer.payment', $employ->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-shopping-cart">&nbsp;continue shopping</i></a>
                    </div>
                    @php
                    $Total_price=0;
                    


                    @endphp
                    <!-- Total price &nbsp;UGSHs.{{$Total_price}} -->
                    
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script src="{{asset('assets/js/jquery.min.js')}}" type="text/javascript">
          $(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
        console.log(id);
        if(confirm("Are you sure you want to Delete this data?"))
        {
            $.ajax({
                url:"{{route('ajaxdata.removedata')}}",
                mehtod:"get",
                data:{id:id},
                success:function(data)
                {
                    alert(data);
                    $('#student_table').DataTable().ajax.reload();
                }
            })
        }
        else
        {
            return false;
        }
    }); 

});
    </script>
@endpush

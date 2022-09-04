@extends('admin.app')

@section('content')

<h1>cart</h1>
// view the cart items

<table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                          
                            <th>PRODUCT DETAILS </th>
                            <th>UNIT PRICE </th>
                            
                            <th>QUANTITY </th>
                            
                            <!-- <th class="text-center">FARMER image </th> -->
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i>SHOPPING</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $employ)
                                <tr>                                    
                                    <td>{{ $employ->name }}</td>
                                    <td>{{ $employ->price }}</td>
                                    <td>{{ $employ->quantity }}</td>
                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

@endsection

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Full Text Search in Laravel using Ajax Example - tutsmake.com</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">    
<br />
<h3 align="center">Full Text Search in Laravel using Ajax Example - tutsmake.com</h3>
<br />
<div class="row">
<div class="col-md-6">
<input type="text" name="full_text_search" id="full_text_search" class="form-control" placeholder="Search" value="">
</div>
<div class="col-md-2">
@csrf
<button type="button" name="search" id="search" class="btn btn-success">Search</button>
</div>
</div>
<br />
<div class="table-responsive">
<table class="table table-bordered table-hover">
<thead>
<tr>
<th>Name</th>
<th>Gender</th>
<th>Address</th>
<th>City</th>
<th>Postal Code</th>
<th>Country</th>
</tr>
</thead>
<tbody></tbody>
</table>
</div>
</div>
</body>
</html>
<script>
$(document).ready(function(){
load_data('');
function load_data(full_text_search_query = '')
{
var _token = $("input[name=_token]").val();
$.ajax({
url:"{{ url('search') }}",
method:"POST",
data:{full_text_search_query:full_text_search_query, _token:_token},
dataType:"json",
success:function(data)
{
var output = '';
if(data.length > 0)
{
for(var count = 0; count < data.length; count++)
{
output += '<tr>';
output += '<td>'+data[count].CustomerName+'</td>';
output += '<td>'+data[count].Gender+'</td>';
output += '<td>'+data[count].Address+'</td>';
output += '<td>'+data[count].City+'</td>';
output += '<td>'+data[count].PostalCode+'</td>';
output += '<td>'+data[count].Country+'</td>';
output += '</tr>';
}
}
else
{
output += '<tr>';
output += '<td colspan="6">No Data Found</td>';
output += '</tr>';
}
$('tbody').html(output);
}
});
}
$('#search').click(function(){
var full_text_search_query = $('#full_text_search').val();
load_data(full_text_search_query);
});
});
</script>






<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FullTextSearch;
use DataTables;
class FullTextSearchController extends Controller
{
public function index(Request $request)
{
return view('full-text-search');
}   
Public function search(Request $request)
{
if($request->ajax())
{
$data = FullTextSearch::search($request->get('full_text_search_query'))->get();
return response()->json($data);
}
} 
}
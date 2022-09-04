<!DOCTYPE html>
<html>
 <head>
  <title>Multiselect Dropdown With Checkbox In Laravel - nicesnippets.com </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
   <meta name="csrf-token" content="{{ csrf_token() }}">
 </head>
 <body class="bg-info">
  <br /><br />
  <div class="container" style="width:600px;">
   <h2 align="center">Multiselect Checkbox</h2>
   <br /><br />
   <form method="post" action="{{ route('frameworks.store') }}" enctype="multipart/form-data" id="">
    @csrf
    <div class="form-group">

        <label>Name</label>

        <input type="text" name="name1" class="form-control"/>

    </div>  

    <div class="form-group">

        <label><strong>Description :</strong></label>

        <textarea class="ckeditor form-control" name="description"></textarea>

    </div>

    <div class="form-group">
     <label>Select which Framework you have knowledge</label>
     <select id="framework" name="name[]" multiple class="form-control" >
      <option value="Codeigniter">Codeigniter</option>
      <option value="CakePHP">CakePHP</option>
      <option value="Laravel">Laravel</option>
      <option value="YII">YII</option>
      <option value="Zend">Zend</option>
      <option value="Symfony">Symfony</option>
      <option value="Phalcon">Phalcon</option>
      <option value="Slim">Slim</option>
     </select>
    </div>
    <div class="form-group">
     <input type="submit" class="btn btn-info" name="submit" value="Submit" />
    </div>
   </form>
   <br />
  </div>
 </body>
<script>
$(document).ready(function(){
 $('#framework').multiselect({
  nonSelectedText: 'Select Framework',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'400px'
 });
 
 $('#framework_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
   url:"{{ route('frameworks.store') }}",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    $('#framework option:selected').each(function(){
     $(this).prop('selected', false);
    });
    $('#framework').multiselect('refresh');
    alert(data['success']);
   }
  });
 });
});
</script>
</html>
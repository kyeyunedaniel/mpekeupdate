<html>

<head>

    <title>Laravel Multiple Select Dropdown with Checkbox Example</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <style type="text/css">

        .dropdown-toggle{

            height: 40px;

            width: 400px !important;

        }

    </style>

</head>

<body>

    <div class="container">

        <div class="row">

            <div class="col-md-8 offset-2 mt-5">

                <div class="card">

                    <div class="card-header bg-info">

                        <h6 class="text-white">Laravel Multiple Select Dropdown with Checkbox Example - HDTuto.com</h6>

                    </div>

                    <div class="card-body">

                        <form method="post" action="{{ route('postData') }}" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">

                                <label>Name</label>

                                <input type="text" name="name" class="form-control"/>

                            </div>  

                            <div class="form-group">

                                <label><strong>Description :</strong></label>

                                <textarea class="ckeditor form-control" name="description"></textarea>

                            </div>

                            <div class="">

                                <label><strong>Select Category :</strong></label><br/>

                                <select class="selectpicker" multiple data-live-search="true" name="cat[]">

                                  <option value="php">PHP</option>

                                  <option value="react">React</option>

                                  <option value="jquery">JQuery</option>

                                  <option value="javascript">Javascript</option>

                                  <option value="angular">Angular</option>

                                  <option value="vue">Vue</option>

                                </select>

                            </div>

                            

                            <div class="text-center" style="margin-top: 10px;">

                                <button type="submit" class="btn btn-success">Save</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>    

</body>

  

<!-- Initialize the plugin: -->

<script type="text/javascript">

    $(document).ready(function() {

        $('select').selectpicker();

    });

</script>

  

</html>
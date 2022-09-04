<html>

<head>

    <title>How to Store Multiple Select Values in Database using Laravel? - </title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

</head>

<body>

    <div class="container">

        <div class="row">

            <div class="col-md-8 offset-2 mt-5">

                <div class="card">

                    <div class="card-header bg-info">

                        <h6 class="text-white">How to Store Multiple Select Values in Database using Laravel? - </h6>

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

                                <select class="form-control" name="cat[]" multiple="">

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

  

</html> 
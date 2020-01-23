<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ajax Crud</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class = "container">
        <br />
        <h3 align = "center">Ajax 6 Crud Tutorial</h3><br />
        <div align="right">
            <button name = "create_record" id = "create_record" class = "btn btn-success btn-sm">Create Record</button>
        </div><br />

        <div class = "table-responsive">
            <table class = "table table-bordered table-striped" id = "user_table">
                <thread>
                    <tr>
                        <th width="10%">Images</th>
                        <th width="10%">First Name</th>
                        <th width="10%">Last Name</th>
                        <th width="10%">Action</th>
                    </tr>
                </thread>
            </table>  
        </div>
    </div>
</body>

<div id = "formModal" class = "modal fade" role = "dialog">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                <h4 class = "modal-title">Add New Record</h4>
            </div>

            <div class = "modal-content">
                <span id = "form_result"></span>
                <form action = "POST" id = "sample_form" class = "form-horizontal" enctype = "multipart/form-data">
                    @csrf
                    <div class = "form-group">
                        <label class = "control-label col-md-4">First Name</label>
                        <div class = "col-md-8">
                            <input type = "text" name = "first_name" id = "first_name" class = "form-control">
                        </div>
                    </div>

                    <div class = "form-group">
                        <label class = "control-label col-md-4">Last Name</label>
                        <div class = "col-md-8">
                            <input type = "text" name = "last_name" id = "last_name" class = "form-control">
                        </div>
                    </div>

                    <div class = "form-group">
                        <label class = "control-label col-md-4">Profile</label>
                        <div class = "col-md-8">
                            <input type = "file" name = "image" id = "image">
                        </div>
                    </div>

                    <div class = "form-group">
                        <input type = "hidden" value = "Add" id = "action">
                        <div class = "col-md-8">
                            <input type = "submit" name = "submit" id = "submit" class = "btn btn-warning">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#create_record").click(function(){
            $("#formModal").modal('show');
        });

        $("#sample_form").on("submit", function(event){
            event.preventDefault();
            if ($("#action").val() == "Add"){
                $.ajax({
                    url: "/ajax_crud",
                    method: "POST",
                    data: new formData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success:function(data){
                        alert(data);

                        if (data.success){
                            $("#sample_form")[0].reset();
                            $("#user_table").DataTable().ajax.reload();
                        }
                    }
                });
            }
        });
    });
</script>
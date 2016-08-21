@extends('master')

@section('css')
<link rel="stylesheet" href="plugins/tooltipster/tooltipster.css">
@endsection

@section('scripts')
<script src="plugins/validation/dist/jquery.validate.js"></script>
<script src="plugins/tooltipster/tooltipster.js"></script>
<script>
    $(document).ready(function () {

        // initialize tooltipster on form input elements
        $('form input').tooltipster({// <-  USE THE PROPER SELECTOR FOR YOUR INPUTs
            trigger: 'custom', // default is 'hover' which is no good here
            onlyOne: false, // allow multiple tips to be open at a time
            position: 'right'  // display the tips to the right of the element
        });

        // initialize validate plugin on the form
        $('#add_user_form').validate({
            errorPlacement: function (error, element) {

                var lastError = $(element).data('lastError'),
                        newError = $(error).text();

                $(element).data('lastError', newError);

                if (newError !== '' && newError !== lastError) {
                    $(element).tooltipster('content', newError);
                    $(element).tooltipster('show');
                }
            },
            success: function (label, element) {
                $(element).tooltipster('hide');
            },
            rules: {
                fullname: {required: true, minlength: 4},
                uemail: {required: true, email: true},
                upassword: {required: true, minlength: 6},
                upassword_re: {required: true, equalTo: "#upassword"}
            },
            messages: {
                fullname: {required: "Please give fullname"},
                uemail: {required: "Insert email address"},
                upassword: {required: "Six digit password"},
                upassword_re: {required: "Re-enter same password"}
            }
        });
    });

</script>

@endsection

@section('side_menu')

@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        User Module
        <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User</a></li>
        <li class="active">Create Users</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- <div class="col-md-6"> -->
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">User Create Page</h3>
        </div>
        <!-- /.box-header -->
        <!-- form starts here -->
        {!! Form::open(array('url' => 'create_users_process', 'id' => 'add_user_form', 'class' => 'form-horizontal')) !!}

        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fullname" class="col-sm-4 control-label">Fullname*</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter fullname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="uemail" class="col-sm-4 control-label">Email*</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="uemail" name="uemail" placeholder="Enter email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="upassword" class="col-sm-4 control-label">Password*</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="upassword" name="upassword" placeholder="Enter password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="upassword_re" class="col-sm-4 control-label">Confirm Password*</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="upassword_re" name="upassword_re" placeholder="Enter password again">
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-primary pull-right">Submit</button>
        </div>
        <!-- /.box-footer -->
        {!! Form::close() !!}
        <!-- /.form ends here -->


        @if (count($errors) > 0)
        <div class="alert alert-danger alert-login col-sm-4">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <!-- /.box -->
    <!-- </div> -->
</section>
<!-- /.content -->

@endsection


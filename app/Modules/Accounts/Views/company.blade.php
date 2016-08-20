@extends('master')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="plugins/tooltipster/tooltipster.css">
@endsection

@section('scripts')
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

<script src="plugins/validation/dist/jquery.validate.min.js"></script>
<script src="plugins/tooltipster/tooltipster.js"></script>

<script>
    $(document).ready(function () {
        // initialize tooltipster on text input elements
        $('form input,select').tooltipster({
            trigger: 'custom',
            onlyOne: false,
            position: 'left'
        });

        // initialize validate plugin on the form
        $('#company_info').validate({
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
                cname: {
                    required: true
                },
                addrs: {
                    required: true
                },
                cnum: {
                    required: true
                }
            },
            messages: {
                cname: {
                    required: "provide company name"
                },
                addrs: {
                    required: "provide address"
                },
                cnum: {
                    required: "provide contact number"
                }
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('#company_info_list').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "ajax": "{{URL::to('/getroles')}}",
            "columns": [
                {"data": "id"},
                {"data": "name"},
                {"data": "display_name"},
                {"data": "description"},
                {"data": "Link", name: 'link', orderable: false, searchable: false}
            ],
            "order": [[1, 'asc']]
        });
    });
</script>

@endsection

@section('side_menu')
<ul></ul>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Companies
        <small>all company info.</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Settings</a></li>
        <li class="active">Companies</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-6">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Company Information Page</h3>
                </div>
                <!-- /.box-header -->
                <!-- form starts here -->
                <form class="form-horizontal" id="company_info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="cname" class="col-sm-3 control-label">Company Name*</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="cname" name="cname" placeholder="Enter company name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="addrs" class="col-sm-3 control-label">Address*</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="addrs" name="addrs" placeholder="Enter address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cnum" class="col-sm-3 control-label">Contact Number*</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="cnum" name="cnum" placeholder="Enter contact number">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
                <!-- /.form ends here -->
            </div>
            <!-- /.box -->
        </div>
        <!-- col -->
        <div class="col-xs-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Hover Data Table</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="company_info_list" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Rendering engine</th>
                                <th>Browser</th>
                                <th>Platform(s)</th>
                                <th>Engine version</th>
                                <th>CSS grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Misc</td>
                                <td>PSP browser</td>
                                <td>PSP</td>
                                <td>-</td>
                                <td>C</td>
                            </tr>
                            <tr>
                                <td>Misc</td>
                                <td>PSP browser</td>
                                <td>PSP</td>
                                <td>-</td>
                                <td>C</td>
                            </tr>
                            <tr>
                                <td>Misc</td>
                                <td>PSP browser</td>
                                <td>PSP</td>
                                <td>-</td>
                                <td>C</td>
                            </tr>

                            <tr>
                                <td>Other browsers</td>
                                <td>All others</td>
                                <td>-</td>
                                <td>-</td>
                                <td>U</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Rendering engine</th>
                                <th>Browser</th>
                                <th>Platform(s)</th>
                                <th>Engine version</th>
                                <th>CSS grade</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /. col -->
    </div>
    <!-- /. row -->
</section>
<!-- /.content -->

@endsection


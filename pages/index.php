<?php
session_start ();

if (! (isset ( $_SESSION ['login'] ))) {
	
	header ( 'location:../../index.php' );
}

if(isset($_POST['submit'])){
	
	include('../config/DbFunction.php');
	$obj=new DbFunction();
	$obj->create_school($_POST['school-short'],$_POST['school-full'],$_POST['cdate']);
	
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>add school</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../assets/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <form method="post">
        <div id="wrapper">

            <!-- Navigation -->
            <?php include('leftbar.php')?>;

            <!--nav-->
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-header">
                            <?php echo strtoupper("welcome"." ".htmlentities($_SESSION['login']));?></h4>
                        <p><span id="" style="font-size:11px;color:red">*</span> Update your details</p>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4>View Profile</h4>
                            </div>
                            <div class="panel-body">
                                <ul>
                                    <li> View all the entered details here</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4>Update School Info</h4>
                            </div>
                            <div class="panel-body">
                                <p><a href="add-school.php"> Click to update info >>>> </a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h4>Update Department Info</h4>
                            </div>
                            <div class="panel-body"></div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="panel panel-danger">
                            <div class="panel-heading">######</div>
                            <div class="panel-body"></div>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Add School</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-10">

                                        <div class="form-group">
                                            <div class="col-lg-4">
                                                <label>School Short Name<span id=""
                                                        style="font-size:11px;color:red">*</span> </label>
                                            </div>
                                            <div class="col-lg-6">

                                                <input class="form-control" name="school-short" id="school_short"
                                                    required="required" onblur="schoolAvailability()">
                                                <span id="school-availability-status" style="font-size:12px;"></span>
                                            </div>

                                        </div>

                                        <br><br>

                                        <div class="form-group">
                                            <div class="col-lg-4">
                                                <label>School Full Name<span id=""
                                                        style="font-size:11px;color:red">*</span></label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input class="form-control" name="school-full" id="school_full"
                                                    required="required" onblur="schoolfullAvail()">
                                                <span id="school-status" style="font-size:12px;"></span> </div>
                                        </div>

                                        <br><br>

                                        <div class="form-group">
                                            <div class="col-lg-4">
                                                <label>Creation Date</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input class="form-control" value="<?php echo date('d-m-Y');?>"
                                                    readonly="readonly" name="cdate">

                                            </div>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="form-group">
                                        <div class="col-lg-4">

                                        </div>
                                        <div class="col-lg-6"><br><br>
                                            <input type="submit" class="btn btn-primary" name="submit"
                                                value="Create School"></button>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>

        <script src="../assets/jquery/dist/jquery.min.js" type="text/javascript"></script>


        <script src="../assets/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../assets/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../dist/js/sb-admin-2.js" type="text/javascript"></script>

        <script>
        function schoolAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "school_availability.php",
                data: 'school_short=' + $("#school_short").val(),
                type: "POST",
                success: function(data) {
                    $("#school-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function() {}
            });
        }

        function schoolfullAvail() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "school_availability.php",
                data: 'school_full=' + $("#school_full").val(),
                type: "POST",
                success: function(data) {
                    $("#school-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function() {}
            });
        }
        </script>
    </form>
</body>

</html>
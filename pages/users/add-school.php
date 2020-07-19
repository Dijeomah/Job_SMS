<?php
session_start ();
include('../../config/DbFunction.php');

	$obj=new DbFunction();
    
    $regid=$_GET['regid'];
    $fs=$obj->edit_school_detail1($regid);
    $res=$fs->fetch_object(); 

    $rs=$obj->showSchool();
    $rs1=$obj->showDepartment();
    $rs2=$obj->showSession();
if (! (isset ( $_SESSION ['login'] ))) {
	
	header ( 'location:../index.php' );
}
  if(isset($_POST['submit'])){
	
	$obj=new DbFunction();
	
	$obj->edit_school_detail($_POST['school-full'],$_POST['school-dep'],$_POST['session'],$regid);	
	
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
    <link href="../../assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../assets/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Add School</div>
                            <div class="panel-body">

                            <?php include('Test.php')?>;

                                <!--stop Here-->
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>


        <script src="../../assets/jquery/dist/jquery.min.js" type="text/javascript"></script>


        <script src="../../assets/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../../assets/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../../dist/js/sb-admin-2.js" type="text/javascript"></script>

        
    </form>
</body>

</html>
<?php
session_start ();

if (! (isset ( $_SESSION ['login'] ))) {
	
	header ( 'location:../index.php' );
} 
   
    include('../config/DbFunction.php');
    $obj=new DbFunction();
    $rs=$obj->showCourse();
    $rs1=$obj->showDepartment();
if(isset($_GET['del']))
    {
          $obj->del_course(intval($_GET['del']));
  }
  $res1=$rs1->fetch_object()

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>view course</title>
    <link href="../assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../assets/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../assets/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->

        <?php include('leftbar.php')?>;


        <nav>
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
                            <div class="panel-heading">
                                View Course
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover"
                                        id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>S No</th>
                                                <th>Department</th>
                                                <th>Short Name</th>
                                                <th>Full Name</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php 
                                         $sn=1;
                                     while($res=$rs->fetch_object()){?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $sn?></td>
                                                <td><?php echo htmlentities( strtoupper($res1->school_dep));?></td>
                                                <td><?php echo htmlentities( strtoupper($res->course_short));?></td>
                                                <td><?php echo htmlentities(strtoupper($res->course_full));?></td>
                                                <td><?php echo htmlentities($res->course_date);?></td>
                                                <td>&nbsp;&nbsp;<a
                                                        href="edit-course.php?course_id=<?php echo htmlentities($res->course_id);?>">
                                                        <p class="fa fa-edit"></p>
                                                    </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a
                                                        href="view-course.php?del=<?php echo htmlentities($res->course_id); ?>">
                                                        <p class="fa fa-times-circle"></p>
                                                </td>

                                            </tr>

                                            <?php $sn++;}?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->

                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->



            </div>
            <!-- /#page-wrapper -->
        </nav>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../assets/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../assets/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../assets/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../assets/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>


<?php
session_start ();
include('../config/DbFunction.php');
$obj=new DbFunction();
$rs1=$obj->showDepartment();
if (! (isset ( $_SESSION ['login'] ))) {
	
	header ( 'location:../index.php' );
}

    $id=$_GET['course_id'];
   
    $rs=$obj->showCourse1($id);
    $res=$rs->fetch_object();

if(isset($_POST['submit'])){
	
	 // echo  $id=$_GET['cid'];exit;
		//echo $_POST['course-short'].$_POST['course-full'].$_POST['udate'].$id;exit;
	$obj->edit_course($_POST['depid'],$_POST['course-short'],$_POST['course-full'],$_POST['udate'],$id);
	
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

<title></title>

<!-- Bootstrap Core CSS -->
<link href="../assets/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="../assets/metisMenu/dist/metisMenu.min.css"
	rel="stylesheet">

<!-- Custom CSS -->
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../assets/font-awesome/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">



</head>

<body>
<form method="post" >
	<div id="wrapper">

		<!-- Navigation -->
		<?php include('leftbar.php')?>;


		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="page-header"> <?php echo strtoupper("welcome"." ".htmlentities($_SESSION['login']));?></h4>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Edit Course</div>
						<div class="panel-body">
							<div class="row">
						 	<div class="col-lg-10">
							
							 <div class="form-group">
											<div class="col-lg-4">
					 <label>School Short Name<span id="" style="font-size:11px;color:Red">*</span>	</label>
											</div>
			
			<div class="col-lg-6">
			<select class="form-control" name="depid" id="depid" onchange="schoolAvailability()" required="required" >
			<option VALUE="" hidden>SELECT</option>
				<?php while($res11=$rs1->fetch_object()){?>							
			
                        <option VALUE="<?php echo htmlentities($res11->depid);?>"><?php echo htmlentities($res11->school_dep)?></option>
                        
                        
                    <?php }?>   			</div>
											 
                        </select>
					<span id="school-availability-status" style="font-size:12px;"></span>	
					</div>
					    </div>	
										
								<br><br>


										<div class="form-group">
											<div class="col-lg-4">
					 <label>Course Short Name<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
											<div class="col-lg-6">
			
  <input class="form-control" name="course-short" id="course_short"  value="<?php echo $res->course_short;?>" required="required"  onblur="courseAvailability()">       
							<span id="course-availability-status" style="font-size:12px;"></span>				</div>
											
										</div>	
										
								<br><br>
								
		<div class="form-group">
		<div class="col-lg-4">
		<label>Course Full Name<span id="" style="font-size:11px;color:red">*</span></label>
		</div>
		<div class="col-lg-6">
<input class="form-control" name="course-full" id="course_full" value="<?php echo $res->course_full;?>" required="required"  onblur="coursefullAvail()">         
	<span id="course-status" style="font-size:12px;"></span>				</div>
	 </div>	
										
	 <br><br>								
										
	<div class="form-group">
	<div class="col-lg-4">
	 <label>Date</label>
	</div>
	<div class="col-lg-6">
	<input class="form-control" value="<?php echo date('d-m-Y');?>" readonly="readonly" name="udate">
	
	</div>
	</div>
	</div>	
										
		<br><br>		
		
							<div class="form-group">
											<div class="col-lg-4">
												
											</div>
											<div class="col-lg-6"><br><br>
							<input type="submit" class="btn btn-primary" name="submit" value="Update Course"></button>
											</div>
											
										</div>		
													
				</div>

					</div>
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		

	</div>
	
	<script src="../assets/jquery/dist/jquery.min.js"
		type="text/javascript"></script>

	
	<script src="../assets/bootstrap/dist/js/bootstrap.min.js"
		type="text/javascript"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="../assets/metisMenu/dist/metisMenu.min.js"
		type="text/javascript"></script>

	<!-- Custom Theme JavaScript -->
	<script src="../dist/js/sb-admin-2.js" type="text/javascript"></script>
	
	<script>
function courseAvailability() {
	
jQuery.ajax({
url: "course_availability.php",
data:'cshort='+$("#cshort").val(),
type: "POST",
success:function(data){
$("#course-availability-status").html(data);


},
error:function (){}
});
}

function coursefullAvail() {
	
jQuery.ajax({
url: "course_availability.php",
data:'cfull='+$("#cfull").val(),
type: "POST",
success:function(data){
$("#course-status").html(data);


},
error:function (){}
});
}



</script>
</form>
</body>

</html>

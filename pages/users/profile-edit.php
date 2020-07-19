

<?php
session_start ();
include('../../config/DbFunction.php');
 $obj=new DbFunction();
if (! (isset ( $_SESSION ['login'] ))) {
	
	header ( 'location:../../index.php' );
}

    $id=$_GET['school_id'];
   
    $rs=$obj->showSchool1($id);
    $res=$rs->fetch_object(); 

if(isset($_POST['submit'])){
	
	 // echo  $id=$_GET['cid'];exit;
		//echo $_POST['course-short'].$_POST['course-full'].$_POST['udate'].$id;exit;
	$obj->edit_profile($_POST['school-short'],$_POST['school-full'],$_POST['udate'],$id);
	
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
<link href="../../assets/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="../../assets/metisMenu/dist/metisMenu.min.css"
	rel="stylesheet">

<!-- Custom CSS -->
<link href="../../dist/css/sb-admin-2.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../../assets/font-awesome/css/font-awesome.min.css"
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
						<div class="panel-heading">Edit School</div>
						<div class="panel-body">
							<div class="row">
						 	<div class="col-lg-10">
									
										<div class="form-group">
											<div class="col-lg-4">
					 <label>School Short Name<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
											<div class="col-lg-6">
			
  <input class="form-control" name="school-short" id="school_short"  value="<?php echo $res->school_short;?>" required="required"  onblur="schoolAvailability()">       
							<span id="school-availability-status" style="font-size:12px;"></span>				</div>
											
										</div>	
										
								<br><br>
								
		<div class="form-group">
		<div class="col-lg-4">
		<label>School Full Name<span id="" style="font-size:11px;color:red">*</span></label>
		</div>
		<div class="col-lg-6">
<input class="form-control" name="school-full" id="school_full" value="<?php echo $res->school_full;?>" required="required"  onblur="schoolfullAvail()">         
	<span id="school-status" style="font-size:12px;"></span>				</div>
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
							<input type="submit" class="btn btn-primary" name="submit" value="Update School"></button>
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
	
	<script src="../../assets/jquery/dist/jquery.min.js"
		type="text/javascript"></script>

	
	<script src="../../assets/bootstrap/dist/js/bootstrap.min.js"
		type="text/javascript"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="../../assets/metisMenu/dist/metisMenu.min.js"
		type="text/javascript"></script>

	<!-- Custom Theme JavaScript -->
	<script src="../../dist/js/sb-admin-2.js" type="text/javascript"></script>
	
	<script>
function schoolAvailability() {
	
jQuery.ajax({
url: "school_availability.php",
data:'school_short='+$("#school_short").val(),
type: "POST",
success:function(data){
$("#school-availability-status").html(data);


},
error:function (){}
});
}

function schoolfullAvail() {
	
jQuery.ajax({
url: "school_availability.php",
data:'school_full='+$("#school_full").val(),
type: "POST",
success:function(data){
$("#school-status").html(data);


},
error:function (){}
});
}



</script>
</form>
</body>

</html>

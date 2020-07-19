<?php
session_start ();
include('../config/DbFunction.php');
	$obj=new DbFunction();
	$rs=$obj->showSchool();
	$rs1=$obj->showSchool();
if (! (isset ( $_SESSION ['login'] ))) {
	
	header ( 'location:../index.php' );
}
  if(isset($_POST['submit'])){
	
	$obj=new DbFunction();
	
	$obj->create_department($_POST['school-short'],$_POST['school-full'],$_POST['school_dep']);	
	
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
<title>Add Department</title>
<link href="../assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
<link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
						<div class="panel-heading">Add Department</div>
						<div class="panel-body">
							<div class="row">
						 	<div class="col-lg-10">
									
										<div class="form-group">
											<div class="col-lg-4">
					 <label>School Short Name<span id="" style="font-size:11px;color:Red">*</span>	</label>
											</div>
			
			<div class="col-lg-6">
			<select class="form-control" name="school-short" id="school_short" onchange="schoolAvailability()" required="required" >
			<option VALUE="">SELECT</option>
				<?php while($res=$rs->fetch_object()){?>							
			
                        <option VALUE="<?php echo htmlentities($res->school_id);?>"><?php echo htmlentities($res->school_short)?></option>
                        
                        
                    <?php }?>   			</div>
											 
                        </select>
					<span id="school-availability-status" style="font-size:12px;"></span>	
					</div>
					    </div>	
										
								<br><br>
								
		<div class="form-group">
		<div class="col-lg-4">
		<label>School Full Name<span id="" style="font-size:11px;color:red">*</span></label>
		</div>
		<div class="col-lg-6">
		<select class="form-control" name="school-full"  id="school_full"required="required" onchange="schoolfullAvail()">
        <option VALUE="">SELECT</option>
        <?php while($res1=$rs1->fetch_object()){?>							
			
     <option VALUE="<?php echo htmlentities($res1->school_full);?>"><?php echo htmlentities($res1->school_full)?></option>
                        
                        
                    <?php }?>   
       </select>
	   <span id="school-status" style="font-size:12px;"></span>
	 </div>
	 </div>	
	<br><br>								
								
		    <div class="form-group">
                <div class="col-lg-4">
                    <label>Department</label>
                </div>
                <div class="col-lg-6">
                    <input class="form-control"  name="school_dep">
                </div>
	         </div>	
	</div>
	</div>	
	<br><br><br>								
										
	<div class="form-group">
											<div class="col-lg-4">
												
											</div>
											<div class="col-lg-6"><br><br>
	<input type="submit" class="btn btn-primary" name="submit" value="Add Department"></button>
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
	

	<!-- jQuery -->
	<script src="../assets/jquery/dist/jquery.min.js"
		type="text/javascript"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../assets/bootstrap/dist/js/bootstrap.min.js"
		type="text/javascript"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="../assets/metisMenu/dist/metisMenu.min.js"
		type="text/javascript"></script>

	<!-- Custom Theme JavaScript -->
	<script src="../dist/js/sb-admin-2.js" type="text/javascript"></script>
	
	<script>
function schoolAvailability() {
	$("#loaderIcon").show();
jQuery.ajax({
url: "school_availability.php",
data:'school_short1='+$("#school_short").val(),
type: "POST",
success:function(data){
$("#school-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

function schoolfullAvail() {
	$("#loaderIcon").show();
jQuery.ajax({
url: "school_availability.php",
data:'school_full1='+$("#school_full").val(),
type: "POST",
success:function(data){
$("#school-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}



</script>
</form>
</body>

</html>

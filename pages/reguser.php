<?php
session_start ();

if (! (isset ( $_SESSION ['login'] ))) {
	
	header ( 'location:../index.php' );
}
include('../config/DbFunction.php');
	$obj=new DbFunction();
	$rs=$obj->showCourse();
	$rs1=$obj->showCountry();
	$ses=$obj->showSession();
	$res1=$ses->fetch_object();
	//$res1->session;
	if(isset($_POST['submit'])){
	
     
     $obj->regStud($_POST['fname'],$_POST['lname'],$_POST['gender'],$_POST['email'],$_POST['uname'],$_POST['pword']);
	
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register</title>
    <link
      href="../assets/bootstrap/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link href="../assets/metisMenu/dist/metisMenu.min.css" rel="stylesheet" />
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet" />
    <link
      href="../assets/font-awesome/css/font-awesome.min.css"
      rel="stylesheet"
      type="text/css"
    />
  </head>

  <body>
  <form method="post" >
	<div id="wrapper">
	<?php include('leftbar.php');?>
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
              <div class="panel-heading">User Bio Details</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-10">
                    <div class="form-group">
                      <div class="col-lg-3">
                        <label
                          >First Name<span
                            id=""
                            style="font-size: 11px; color: red;"
                            >*</span
                          >
                        </label>
                      </div>
                      <div class="col-lg-6">
                        <input class="form-control" type="text" name="fname" required />
                      </div>
                    </div>
                    <br />
					<br />

					<div class="form-group">
						<div class="col-lg-3">
						  <label
							>Last Name<span
							  id=""
							  style="font-size: 11px; color: red;"
							  >*</span
							>
						  </label>
						</div>
						<div class="col-lg-6">
						  <input class="form-control" type="text" name="lname"required />
						</div>
					  </div>
					  <br />
					  <br />
					<div class="col-lg-3">
						<label>Gender <span
							id=""
							style="font-size: 11px; color: red;"
							>*</span
						  ></label>
					</div>
					<div class="col-lg-6"required>
						<input type="radio" name="gender" id="male" value="male"> &nbsp; Male &nbsp;
						<input type="radio" name="gender" id="female" value="female"> &nbsp; Female &nbsp;
						<input type="radio" name="gender" id="other" value="other"> &nbsp; Other &nbsp;
					</div>
					<br>
					<br>

					  <div class="form-group">
						<div class="col-lg-3">
						  <label
							>Email<span
							  id=""
							  style="font-size: 11px; color: red;"
							  >*</span
							>
						  </label>
						</div>
						<div class="col-lg-6">
						  <input class="form-control" type="email" name="email"required />
						</div>
					  </div>
					  <br />
					  <br />
                  </div>
                </div>
              </div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">Login Details</div>
				<div class="panel-body">
				  <div class="row">
					<div class="col-lg-10">
						<div class="form-group">
						  <div class="col-lg-3">
							<label
							  >Username<span
								id=""
								style="font-size: 11px; color: red;"
								>*</span
							  >
							</label>
						  </div>
						  <div class="col-lg-3">
							<input class="form-control" type="text" name="uname" required/>
						  </div>
						  <div class="col-lg-3">
							  <label
								>Password<span
								  id=""
								  style="font-size: 11px; color: red;"
								  >*</span
								>
							  </label>
							</div>
							<div class="col-lg-3">
							  <input class="form-control" type="password" name="pword"required />
							</div>
						</div>
						<br />
						<br />
					  <div class="form-group">
						  <div class="col-lg-6"><br><br>
							  <input type="submit" class="btn btn-primary" name="submit" value="Register"></button>
							  </div>
					  </div>
					  <br />
					  <br />
					</div>
				  </div>
				</div>
			  </div>
          </div>
        </div>
      </div>
    </div>
</form>
    <!-- jQuery -->
    <script
      src="../assets/jquery/dist/jquery.min.js"
      type="text/javascript"
    ></script>

    <!-- Bootstrap Core JavaScript -->
    <script
      src="../assets/bootstrap/dist/js/bootstrap.min.js"
      type="text/javascript"
    ></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script
      src="../assets/metisMenu/dist/metisMenu.min.js"
      type="text/javascript"
    ></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js" type="text/javascript"></script>
  </body>
</html>

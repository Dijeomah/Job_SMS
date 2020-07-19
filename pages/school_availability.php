<?php
$dbuser="root";
$dbpass="";
$host="localhost";
$dbname = "wsms";
$mysqli = new mysqli($host, $dbuser, $dbpass, $dbname);
if(!empty($_POST['school_short'])){
$school_short=$_POST['school_short'];
$result ="SELECT count(*) FROM tbl_school WHERE school_short=?";
$stmt = $mysqli->prepare($result);
$stmt->bind_param('s',$school_short);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
if($count>0)
	echo "<span style='color:red'> School Short Name Already Exist .</span>";
}
if(!empty($_POST['school_short1'])){
$school_short=$_POST['school_short1'];
$result ="SELECT count(*) FROM  department WHERE school_short=?";
$stmt = $mysqli->prepare($result);
$stmt->bind_param('i',$school_short);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
if($count>0)
	echo "<span style='color:red'> School Short Name Already Exist .</span>";
}

if(!empty($_POST['school_full'])){
	$school_full=$_POST['school_full'];
	$result ="SELECT count(*) FROM tbl_school WHERE school_full=?";
	$stmt = $mysqli->prepare($result);
	$stmt->bind_param('s',$school_full);
	$stmt->execute();
	$stmt->bind_result($count);
	$stmt->fetch();
	$stmt->close();
	if($count>0)
		echo "<span style='color:red'> School Full Name Already Exist .</span>";
}

if(!empty($_POST['school_full1'])){
	$school_full=$_POST['school_full1'];
	$result ="SELECT count(*) FROM department WHERE school_full=?";
	$stmt = $mysqli->prepare($result);
	$stmt->bind_param('s',$school_full);
	$stmt->execute();
	$stmt->bind_result($count);
	$stmt->fetch();
	$stmt->close();
	if($count>0)
		echo "<span style='color:red'> School Full Name Already Exist .</span>";
}
?>
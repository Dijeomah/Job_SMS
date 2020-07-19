<?php
$dbuser="root";
$dbpass="";
$host="localhost";
$dbname = "wsms";
$mysqli = new mysqli($host, $dbuser, $dbpass, $dbname);
if(!empty($_POST['course_short'])){
$course_short=$_POST['course_short'];
$result ="SELECT count(*) FROM tbl_course WHERE course_short=?";
$stmt = $mysqli->prepare($result);
$stmt->bind_param('s',$course_short);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
if($count>0)
	echo "<span style='color:red'> Course Short Name Already Exist .</span>";
}
if(!empty($_POST['course_short1'])){
$course_short=$_POST['course_short1'];
$result ="SELECT count(*) FROM  subject WHERE course_short=?";
$stmt = $mysqli->prepare($result);
$stmt->bind_param('i',$course_short);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
if($count>0)
	echo "<span style='color:red'> Course Short Name Already Exist .</span>";
}

if(!empty($_POST['course_full'])){
	$course_full=$_POST['course_full'];
	$result ="SELECT count(*) FROM tbl_course WHERE course_full=?";
	$stmt = $mysqli->prepare($result);
	$stmt->bind_param('s',$course_full);
	$stmt->execute();
	$stmt->bind_result($count);
	$stmt->fetch();
	$stmt->close();
	if($count>0)
		echo "<span style='color:red'> Course Full Name Already Exist .</span>";
}

if(!empty($_POST['course_full1'])){
	$cfull=$_POST['course_full1'];
	$result ="SELECT count(*) FROM subject WHERE course_full=?";
	$stmt = $mysqli->prepare($result);
	$stmt->bind_param('s',$course_full);
	$stmt->execute();
	$stmt->bind_result($count);
	$stmt->fetch();
	$stmt->close();
	if($count>0)
		echo "<span style='color:red'> Course Full Name Already Exist .</span>";
}

?>


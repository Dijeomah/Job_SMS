<?php
require('Database.php');
//$db = Database::getInstance();
//$mysqli = $db->getConnection();
class DbFunction{
	//LOGIN DETAILS
	function login($loginid,$password){
	
      if(!ctype_alpha($loginid) || !ctype_alpha($password)){
      	
        echo "<script>alert('Either LoginId or Password is Missing')</script>";
      
      }		
   else{		
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT loginid, password FROM tbl_login where loginid=? and password=? ";
	$stmt= $mysqli->prepare($query);
	if(false===$stmt){
		
		trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
	}
	
	else{
		
		$stmt->bind_param('ss',$loginid,$password);
		$stmt->execute();
		$stmt -> bind_result($loginid,$password);
		$rs=$stmt->fetch();
		if(!$rs)
		{
			echo "<script>alert('Invalid Details')</script>";
			header('location:login.php');
		}
		else{
			
			header('location:add-school.php');
		}
	}
	
	}
	
	}

	function userlogin($uname,$pword){
	
		if(!ctype_alpha($uname) || !ctype_alpha($pword)){
			
		  echo "<script>alert('Either LoginId or Password is Missing')</script>";
		
		}		
	 else{		
	  $db = Database::getInstance();
	  $mysqli = $db->getConnection();
	  $query = "SELECT uname, pword FROM registration where uname=? and pword=? ";
	  $stmt= $mysqli->prepare($query);
	  if(false===$stmt){
		  
		  trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
	  }
	  
	  else{
		  
		  $stmt->bind_param('ss',$uname,$pword);
		  $stmt->execute();
		  $stmt -> bind_result($uname,$pword);
		  $rs=$stmt->fetch();
		  if(!$rs)
		  {
			  echo "<script>alert('Invalid Details')</script>";
			  header('location:login.php');
		  }
		  else{
			//echo "<script>alert('Logged In'')</script>";
			  header('location:index.php');
		  }
	  }
	  
	  }
	  
	  }
	
//CREATE SCHOOL DETAILS

function create_school($scshort,$scfull,$scdate){
		
		if($scshort==""){
	 
	echo "<script>alert('Select  Course Short Name')</script>";

}


else if($scfull==""){
	 
	echo "<script>alert('Select  Course Full Name')</script>";

}

else{
	
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "insert into tbl_school(school_short,school_full,school_create_date)values(?,?,?)";
	$stmt= $mysqli->prepare($query);
	if(false===$stmt){
	
		trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
	}
	
	else{
	
		$stmt->bind_param('sss',$scshort,$scfull,$scdate);
		$stmt->execute();
		echo "<script>alert('Course Added Successfully')</script>";
			//header('location:login.php');
		
	}
}				
}
function showSchool(){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM tbl_school ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}

function showSchool1($school_id){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM tbl_school  where school_id='".$school_id."'";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}

function edit_school($school_short,$school_full,$udate,$id){

    $db = Database::getInstance();
	$mysqli = $db->getConnection();
	//echo $cshort.$cfull.$udate.$id;exit;
	$query = "update tbl_school set school_short=?,school_full=? ,school_create_date=? where school_id=?";
	$stmt= $mysqli->prepare($query);
	$stmt->bind_param('sssi',$school_short,$school_full,$udate,$id);
	$stmt->execute();
    echo '<script>'; 
    echo 'alert("School Updated Successfully")'; 
    echo '</script>';

}

function del_school($id){

	//  echo $id;exit;
	 $db = Database::getInstance();
	 $mysqli = $db->getConnection();
	 $query="delete from tbl_school where school_id=?";
	 $stmt= $mysqli->prepare($query);
	 $stmt->bind_param('s',$id);
	 $stmt->execute();
	 echo "<script>alert('School has been deleted')</script>";
	 echo "<script>window.location.href='view-school.php'</script>";
 }


 //CREATE DEPARTMENT DETALS
 function showDepartment(){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM department ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}

 function showDepartment1($sid){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM department where depid='$sid' ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}


function create_department($school_short,$school_full,$school_dep){
		
				if($school_short==""){
			 
			echo "<script>alert('Select School Short Name')</script>";
		
		}
		
		
		else if($school_full==""){
			 
			echo "<script>alert('Select  School Full Name')</script>";
		
		}
		
		else{
			
			
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "insert into department(school_short,school_full,school_dep)values(?,?,?)";
			$stmt= $mysqli->prepare($query);
			if(false===$stmt){
			
				trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			}
			
			else{
			
				$stmt->bind_param('sss',$school_short,$school_full,$school_dep);
				$stmt->execute();
				echo "<script>alert('Department Added Successfully')</script>";
					
				
			}
		}				
	}
	function del_department($id){

		//echo $id;exit;
	   $db = Database::getInstance();
	   $mysqli = $db->getConnection();
	   $query="delete from department where depid=?";
	   $stmt= $mysqli->prepare($query);
	   $stmt->bind_param('i',$id);
	   $stmt->execute();
	   echo "<script>alert('Department has been deleted')</script>";
	  // echo "<script>window.location.href='view-course.php'</script>";
   }
   //////////////////////////////////////////////////////////////////////////////////////////////

//##############CREATE COURSE#####################
	function create_course($school_id,$course_short,$course_full,$course_date){
		
		 if($course_short==""){
			 
			echo "<script>alert('Select  Course Short Name')</script>";
		
		}
		
		
		else if($course_full==""){
			 
			echo "<script>alert('Select  Course Full Name')</script>";
		
		}
		
		else{
			
			
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "insert into tbl_course(school_id,course_short,course_full,course_date)values(?,?,?,?)";
			$stmt= $mysqli->prepare($query);
			if(false===$stmt){
			
				trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			}
			
			else{
			
				$stmt->bind_param('ssss',$school_id,$course_short,$course_full,$course_date);
				$stmt->execute();
				echo "<script>alert('Course Added Successfully')</script>";
					//header('location:login.php');
				
			}
		}				
	}

function showCourse(){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM tbl_course ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}

function showCourse1($cid){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM tbl_course  where course_id='".$cid."'";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}


function del_course($id){

	//  echo $id;exit;
	 $db = Database::getInstance();
	 $mysqli = $db->getConnection();
	 $query="delete from tbl_course where course_id=?";
	 $stmt= $mysqli->prepare($query);
	 $stmt->bind_param('s',$id);
	 $stmt->execute();
	 echo "<script>alert('Course has been deleted')</script>";
	 echo "<script>window.location.href='view-course.php'</script>";
 }


 function edit_school_detail($school_full,$school_dep,$session,$regid){

    $db = Database::getInstance();
	$mysqli = $db->getConnection();
	//echo $cshort.$cfull.$udate.$id;exit;
	$query = "update registration set school_full=?,school_dep=? ,session=? where regid=?";
	$stmt= $mysqli->prepare($query);
	$stmt->bind_param('sssi',$school_full,$school_dep,$session,$regid);
	$stmt->execute();
    echo '<script>'; 
    echo 'alert("School Updated Successfully")'; 
    echo '</script>';

}
function edit_school_detail1($regid){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM registration  where regid='".$regid."'";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}

function showSubject(){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM subject ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}


function showSession(){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM session  ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}

function showSubject1($sid){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM subject where subid='$sid' ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}


function create_subject($cshort,$cfull,$sub1,$sub2,$sub3){
		
				if($cshort==""){
			 
			echo "<script>alert('Select  Course Short Name')</script>";
		
		}
		
		
		else if($cfull==""){
			 
			echo "<script>alert('Select  Course Full Name')</script>";
		
		}
		
		else{
			
			
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "insert into subject(cshort,cfull,sub1,sub2,sub3)values(?,?,?,?,?)";
			$stmt= $mysqli->prepare($query);
			if(false===$stmt){
			
				trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			}
			
			else{
			
				$stmt->bind_param('sssss',$cshort,$cfull,$sub1,$sub2,$sub3);
				$stmt->execute();
				echo "<script>alert('Course Added Successfully')</script>";
					
				
			}
		}				
	}

	
function showCountry(){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM countries ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}	
function showStudents(){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM registration ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}	

function showStudents1($id){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM registration  where id='".$id."'";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}	

function regStud($fname,$lname,$gender,$email,$uname,$pword){
 			          
 			        $db = Database::getInstance();
		           	$mysqli = $db->getConnection();
		           	
		           //	echo $session;exit;
   $query = "INSERT INTO `registration` (`fname`, `lname`, `gender`, `email`, `uname`,`pword`) 
                   VALUES(?,?,?,?,?,?)";
			        $stmt= $mysqli->prepare($query);
			        if(false===$stmt){
			
			     	trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			    }
			
			    else{
			
			$stmt->bind_param('ssssss',
		         	$fname,$lname,$gender,$email,$uname,$pword);
			$stmt->execute();
		   	echo "<script>alert('Successfully Registered , your username is $uname and password is $pword')</script>";
		 	header('location:index.php');
				
		  }
				


       }

	   function register($cshort,$cfull,$fname,$mname,$lname,$gender,$gname,$ocp,$income,$category,$ph,
                  $nation,$mobno,$email,$country,$state,$city,$padd,$cadd,$board1,$board2,$roll1,$roll2,
				   $pyear1,$pyear2,$sub1,$sub2,$marks1,$marks2,$fmarks1,$fmarks2,$session){
 			          
 			        $db = Database::getInstance();
		           	$mysqli = $db->getConnection();
		           	
		           //	echo $session;exit;
   $query = "INSERT INTO `registration` (`course`, `subject`, `fname`, `mname`, `lname`, `gender`, `gname`, `ocp`,
                     `income`, `category`, `pchal`, `nationality`, `mobno`, `emailid`, `country`, `state`, `dist`, 
					 `padd`, `cadd`, `board`, `board1`,`roll`,`roll1`,`pyear`,`yop1`,`sub`,`sub1`,`marks`,`marks1`,
					 `fmarks`,`fmarks1`,`session`,regno) 
                   VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			        $reg=rand();
			        $stmt= $mysqli->prepare($query);
			        if(false===$stmt){
			
			     	trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			    }
			
			    else{
			
			$stmt->bind_param('sssssssssssssssssssssssssssssssss',
		         	$cshort,$cfull,$fname,$mname,$lname,$gender,$gname,$ocp,$income,$category,$ph,$nation,$mobno,
					$email,$country,$state,$city,$padd,$cadd,$board1,$board2,$roll1,$roll2,$pyear1,$pyear2,
					$sub1,$sub2,$marks1,$marks2,$fmarks1,$fmarks2,$session,$reg);
			$stmt->execute();
		   	echo "<script>alert('Successfully Registered , your registration number is $reg')</script>";
		 	//header('location:login.php');
				
		  }
				


       }


function edit_course($school_dep,$course_short,$course_full,$udate,$id){

    $db = Database::getInstance();
	$mysqli = $db->getConnection();
	//echo $cshort.$cfull.$udate.$id;exit;
	$query = "update tbl_course set school_dep = ?, course_short=?,course_full=? ,course_date=? where course_id=?";
	$stmt= $mysqli->prepare($query);
	$stmt->bind_param('ssssi',$school_dep,$course_short,$course_full,$udate,$id);
	$stmt->execute();
    echo '<script>'; 
    echo 'alert("Course Updated Successfully")'; 
	echo '</script>';
	echo "<script>window.location.href='view-course.php'</script>";

}



function edit_subject($sub1,$sub2,$sub3,$udate,$id){

    $db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "update subject set sub1=?,sub2=? ,sub3=?,update_date=? where subid=?";
	$stmt= $mysqli->prepare($query);
	$stmt->bind_param('ssssi',$sub1,$sub2,$sub3,$udate,$id);
	$stmt->execute();
    echo '<script>'; 
    echo 'alert("Subject Updated Successfully")'; 
	echo '</script>';
	    echo "<script>window.location.href='view-course.php'</script>";

}

function edit_std($cshort,$cfull,$fname,$mname,$lname,$gender,$gname,$ocp,$income,$category,$ph,
                  $nation,$mobno,$email,$country,$state,$city,$padd,$cadd,$board1,$board2,$roll1,$roll2,
				   $pyear1,$pyear2,$sub1,$sub2,$marks1,$marks2,$fmarks1,$fmarks2,$id){
  // echo $id;exit;
    $db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "update registration set course=?,subject=?,fname=?,mname=?,lname=?,gender=?,gname=?,ocp=?
              , income=?,category=?,pchal=?,nationality=?,mobno=?,emailid=?,country=?,state=?,dist=?
         	 ,padd=?,cadd=?,board=?,roll=?,pyear=?,sub=?,marks=?,fmarks=?,board1=?,roll1=?,yop1=?,sub1=?
              ,marks1=?,fmarks1=? where id=?" ;
    //echo $query;
	$stmt= $mysqli->prepare($query);
	if(false===$stmt){
			
			     	trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			    }

	$rc=$stmt->bind_param('sssssssssssssssssssssssssssssssi',$cshort,$cfull,$fname,$mname,$lname,$gender,$gname,$ocp,$income,$category,$ph,
                  $nation,$mobno,$email,$country,$state,$city,$padd,$cadd,$board1,$board2,$roll1,$roll2,
				   $pyear1,$pyear2,$sub1,$sub2,$marks1,$marks2,$fmarks1,$fmarks2,$id);
				   
    //echo $rc;
 if ( false===$rc ) {
 
            die('bind_param() failed: ' . htmlspecialchars($stmt->error));
  }		   
	$rc=$stmt->execute();
	
	if ( false==$rc ) {
          die('execute() failed: ' . htmlspecialchars($stmt->error));
    }
	else{
         echo '<script>'; 
         echo 'alert(" Successfully Updated")'; 
          echo '</script>';
		}  
  
}





function del_std($id){

   $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $query="delete from registration where id=?";
    $stmt= $mysqli->prepare($query);
    $stmt->bind_param('i',$id);
	$stmt->execute();
    echo "<script>alert('One record has been deleted')</script>";
    echo "<script>window.location.href='view-course.php'</script>";

}

 function del_subject($id){

     //echo $id;exit;
    $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $query="delete from subject where subid=?";
    $stmt= $mysqli->prepare($query);
    $stmt->bind_param('i',$id);
	$stmt->execute();
    echo "<script>alert('Subject has been deleted')</script>";
   // echo "<script>window.location.href='view-course.php'</script>";
}

}

?>
<?php
include('dbcontroller.php');
if(!empty($_POST["sch_id"])) 
{
 $id=intval($_POST['sch_id']);
 $stmt = $DB_con->prepare("SELECT * FROM tbl_school WHERE school_id = :sch_id");
 $stmt->execute(array(':sch_id' => $id));
 ?><option selected="selected">Select School</option><?php
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {
  ?>
<option value="<?php echo htmlentities($row['sch_id']); ?>"><?php echo htmlentities($row['name']); ?></option>
<?php
 }
 
 if(!empty($_POST["dep_id"])) 
{
 $id=intval($_POST['dep_id']);
 $stmt = $DB_con->prepare("SELECT * FROM department WHERE school_short = :dep_id");
 $stmt->execute(array(':dep_id' => $id));
 ?><option selected="selected">Select State</option><?php
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {
  ?>
<option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['name']); ?></option>
<?php
 }
 
}

if(!empty($_POST["did"])) 
{
 $id=intval($_POST['did']);
 $stmt = $DB_con->prepare("SELECT * FROM cities WHERE state_id = :id");
 $stmt->execute(array(':id' => $id));
 ?><option value="">Select City</option><?php
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {
  ?>
<option value="<?php echo htmlentities($row['name']); ?>"><?php echo htmlentities($row['name']); ?></option>
<?php
 }
 
 }


 if(!empty($_POST["cid"])) 
{
 $id=intval($_POST['cid']);
 $stmt = $DB_con->prepare("SELECT * FROM subject WHERE cshort = :id");
 $stmt->execute(array(':id' => $id));

 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {
 
 echo strtoupper($row['sub1']."+".$row['sub2']."+ ".$row['sub3']); 

 }
 
 }


?>
<?php
session_start();

$code = $_SESSION['code'];

$lec_name = $_POST['t1'];
$uname = $_POST['t2'];
$pass = $_POST['t3'];
$des = $_POST['t8'];
$exp = $_POST['t4'];
$adr = $_POST['t5'];
$tel = $_POST['t6'];
$email = $_POST['t7'];

if($lec_name != ""){
$link = mysqli_connect("localhost", "root", "", "time_table");

 

// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
$tbl = "CREATE TABLE IF NOT EXISTS ".$code."_lecturers (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(50) NOT NULL, uname VARCHAR(50) NOT NULL, pass VARCHAR(20) NOT NULL, des VARCHAR(50) NOT NULL, exp INT NOT NULL, adr LONGTEXT, tel BIGINT NOT NULL, email VARCHAR(50) NOT NULL)";
$crt_sql=mysqli_query($link,$tbl);
						

// Attempt insert query execution

$sql="INSERT INTO ".$code."_lecturers (name, uname, pass, des, exp, adr, tel, email) VALUES ('$lec_name', '$uname', '$pass', '$des', '$exp', '$adr', '$tel', '$email' )";
if(mysqli_query($link, $sql)){

	$last_id = mysqli_insert_id($link);
	
	
	for($i=0;$i<count($_POST["chkid"]);$i++) {
	 $strchkid = $_POST['chkid'][$i];
	 
	 if(strpos($strchkid, "sub") !== false){
	 	$upd = "UPDATE ".$code."_subjects SET lec_id =  $last_id  WHERE id = ".substr($strchkid, 3);
   		  if(mysqli_query($link, $upd)){
				}else{
   		 echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	 }else{
	 	$upd = "UPDATE ".$code."_labs SET lec_id =  $last_id  WHERE id = ".substr($strchkid, 3);
   		  if(mysqli_query($link, $upd)){
			 
				}else{
   		 echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	 }
 		 
	}
	mysqli_close($link);
			

  ?>
						<script>
						    document.location="dept_add.php";
						</script>
						<?php

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}

 

// Close connection

mysqli_close($link);
}
					   
?>
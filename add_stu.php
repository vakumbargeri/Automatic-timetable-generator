<?php
session_start();

$code = $_SESSION['code'];

$uname = $_POST['t1'];
$select_sem = $_POST['select_sem'];
$upass = $_POST['t2'];

if($uname != "" && $select_sem != "" && $upass != ""){
$link = mysqli_connect("localhost", "root", "", "time_table");

 

// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
$tbl = "CREATE TABLE IF NOT EXISTS ".$code."_students (id INT AUTO_INCREMENT PRIMARY KEY, uname VARCHAR(50) NOT NULL, pass VARCHAR(50) NOT NULL, sem INT NOT NULL)";
$crt_sql=mysqli_query($link,$tbl);
						 

// Attempt insert query execution

$sql="INSERT INTO ".$code."_students (uname, sem, pass) VALUES ('$uname', '$select_sem', '$upass' )";
if(mysqli_query($link, $sql)){
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
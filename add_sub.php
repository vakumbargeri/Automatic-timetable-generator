<?php
session_start();

$code = $_SESSION['code'];

$sub_name = $_POST['t1'];
$select_sem = $_POST['select_sem'];
$cpw = $_POST['t4'];

if($sub_name != "" && $select_sem != "" && $cpw != ""){
$link = mysqli_connect("localhost", "root", "", "time_table");

 

// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
$tbl = "CREATE TABLE IF NOT EXISTS ".$code."_subjects (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(50) NOT NULL, lec_id INT NOT NULL, sem INT NOT NULL, cpw INT NOT NULL)";
$crt_sql=mysqli_query($link,$tbl);
						

// Attempt insert query execution

$sql="INSERT INTO ".$code."_subjects (name, sem, cpw) VALUES ('$sub_name', '$select_sem', '$cpw' )";
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
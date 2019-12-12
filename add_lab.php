<?php
session_start();

$code = $_SESSION['code'];

$lab_name = $_POST['t1'];
$select_sem = $_POST['select_sem'];
$lpw = $_POST['t4'];
$lb = $_POST['t5'];

if($lab_name != "" && $select_sem != "" && $lpw != "" && $lb != ""){
$link = mysqli_connect("localhost", "root", "", "time_table");

 

// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
$tbl = "CREATE TABLE IF NOT EXISTS ".$code."_labs (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(50) NOT NULL, lec_id INT NOT NULL, sem INT NOT NULL, lpw INT NOT NULL, lb INT NOT NULL)";
$crt_sql=mysqli_query($link,$tbl);
						 

// Attempt insert query execution

$sql="INSERT INTO ".$code."_labs (name, sem, lpw, lb) VALUES ('$lab_name', '$select_sem', '$lpw', '$lb' )";
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
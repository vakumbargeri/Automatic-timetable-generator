<?php
session_start();

$code = $_POST['t1'];
$user = $_POST['t2'];
$pass = $_POST['t3'];
if($code != "" && $user != "" && $pass != ""){
$link = mysqli_connect("localhost", "root", "", "time_table");

 

// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}

 

// Attempt insert query execution

$sql="INSERT INTO dept_table (code, uname, pass) VALUES ('$code', '$user', '$pass' )";
if(mysqli_query($link, $sql)){

	mysqli_close($link);
	?>
						<script>
                                                    alert("Admin added successfully!");
						    document.location="add_dept.html";
						</script>
						<?php


} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}

 

// Close connection

mysqli_close($link);
}

	   
?>
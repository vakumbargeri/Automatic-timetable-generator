<?php
session_start();

$start = date('Y-m-d', strtotime($_POST['start']));
$end = date('Y-m-d', strtotime($_POST['end']));


// Check connection
$link = mysqli_connect("localhost", "root", "", "time_table");
if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}

 

// Attempt insert query execution

if(isset($_POST['Sem_type']))
{
$type=$_POST['Sem_type'];  //  Displaying Selected Value
}

$crt_sql=mysqli_query($link,"CREATE TABLE IF NOT EXISTS Set_sem(id INT AUTO_INCREMENT PRIMARY KEY, start DATE, end DATE, sem_type varchar(5) NOT NULL)");


$sql="INSERT INTO Set_sem (start, end, sem_type) VALUES ('$start', '$end', '$type' )";
if(mysqli_query($link, $sql)){
    mysqli_close($link);

    ?>
	<script>
	   document.location="collage_admin.php";
	</script>
	<?php

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}

 

// Close connection

mysqli_close($link);
			   
?>
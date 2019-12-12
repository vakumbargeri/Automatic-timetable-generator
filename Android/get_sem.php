<?php
$link = mysqli_connect("localhost", "root", "", "time_table");

 

// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}

$query = "SELECT sem_type FROM set_sem WHERE id = 1";
$result = mysqli_query($link,$query);
$rs=mysqli_fetch_assoc($result);
$sem = $rs["sem_type"];

if($sem === "even"){
$n = true;
} else{
$n = false;
}
echo json_encode(array('isSem' => $n));
 

// Close connection

mysqli_close($link);





?>
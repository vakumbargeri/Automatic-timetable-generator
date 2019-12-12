<?php
$json = file_get_contents('php://input');
$obj = json_decode($json);
$user = $obj->{'user'};
$pass = $obj->{'pass'};
$dept = $obj->{'dept'};
$sem = $obj->{'sem'};


$link = mysqli_connect("localhost", "root", "", "time_table");

 

// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}

$query = "SELECT * FROM ".$dept."_students WHERE uname = '$user' AND pass = '$pass' AND sem = '$sem'";
$result = mysqli_query($link,$query);
if($result){
}else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}
$num = mysqli_num_rows($result);

if($num > 0){
$n = true;
} else{
$n = false;
}
echo json_encode(array('isValid' => $n));
 

// Close connection

mysqli_close($link);

?>
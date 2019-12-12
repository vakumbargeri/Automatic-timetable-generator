<?php
$link = mysqli_connect("localhost", "root", "", "time_table");

 

// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}

$sql="SELECT code FROM dept_table";
$result=mysqli_query($link,$sql);
if($result){
}else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}

$arrayName = array();
  while($rs=mysqli_fetch_array($result)){
  //array_push($arrayName, array('dept' => $rs["code"]));
  array_push($arrayName, $rs["code"]);
  }
echo json_encode(array('result' => $arrayName));
// Close connection

mysqli_close($link);





?>
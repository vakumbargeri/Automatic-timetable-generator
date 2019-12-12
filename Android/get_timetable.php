<?php
$json = file_get_contents('php://input');
$obj = json_decode($json);
$dept = $obj->{'dept'};
$sem = $obj->{'sem'};


$link = mysqli_connect("localhost", "root", "", "time_table");

 

// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}

$query = "SELECT * FROM ".$dept."_".$sem."_timetable";
$result = mysqli_query($link,$query);
if($result){
}else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}
$arrayName = array();
  while($rs=mysqli_fetch_array($result)){
      if((int)$rs["id"] < 7){
          array_push($arrayName,
            array($rs["id"],
            $rs["hour1"],
            $rs["hour2"],
            $rs["hour3"],
            $rs["hour4"],
            $rs["hour5"],
            $rs["hour6"],
            $rs["hour7"],
            $rs["hour8"]
            ));
      }
  }
echo json_encode(array('result' => $arrayName));
 

// Close connection

mysqli_close($link);





?>
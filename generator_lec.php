<?php
session_start();

/*--------------------------------------------------------------------*/
function getSemTable($tableName) {
    $link = mysqli_connect("localhost", "root", "", "time_table");

    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }
    $query = "SELECT * FROM  ".$tableName;
    $result = mysqli_query($link,$query);
    $semTable = array();
    while ($rs = mysqli_fetch_array($result)) {
        array_push($semTable, array($rs["hour1"], $rs["hour2"], $rs["hour3"], $rs["hour4"], $rs["hour5"], $rs["hour6"], $rs["hour7"], $rs["hour8"]));
    }
    
    mysqli_close($link);
    return $semTable;
}









/*--------------------------------------------------------------------------*/
function getLecNameOfUname($uname, $code) {
    $link = mysqli_connect("localhost", "root", "", "time_table");

    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }
    $query = "SELECT name FROM ".$code."_lecturers WHERE uname = '$uname'";
    $result = mysqli_query($link,$query);
    $rs = mysqli_fetch_array($result);
    $lec_name = $rs["name"];
    
    mysqli_close($link);
    return $lec_name;    
}











/*--------------------------------------------------------------------------*/
function setSlotName($isLab, $day, $hour, $tableName, $name){
$link = mysqli_connect("localhost", "root", "", "time_table");

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
if($isLab){
	$query = "UPDATE ".$tableName." SET hour".$hour." = '".$name."', hour".($hour + 1)." = '".$name."', hour".($hour + 2)." = '".$name."' WHERE id = ".$day;
	$result = mysqli_query($link,$query);
	if($result){
				}else{
   		 echo "ERROR: Could not able to execute $query. " . mysqli_error($link) . "<br>";
		}
} else{
	$query = "UPDATE ".$tableName." SET hour".$hour." = '".$name."' WHERE id = ".$day;
	$result = mysqli_query($link,$query);
	if($result){
				}else{
   		 echo "ERROR: Could not able to execute $query. " . mysqli_error($link) . "<br>";
		}
}

mysqli_close($link);
//end
}
















/*-----------------------------------------------------------------------------*/
function isLabHandled($uname, $code, $sem) {
    $link = mysqli_connect("localhost", "root", "", "time_table");

    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }
    $query = "SELECT id FROM ".$code."_lecturers WHERE uname = '$uname'";
    $result = mysqli_query($link,$query);
    $rs = mysqli_fetch_array($result);
    $id = $rs["id"];
    
    $lquery = "SELECT name FROM ".$code."_labs WHERE lec_id = '$id'";
    $lresult = mysqli_query($link,$lquery);
    if (mysqli_num_rows($lresult) > 0){
        return true;
    } else {
        return false;
    }
}











/*------------------------------------------------------------------------------*/


$code = $_SESSION['code'];

$link = mysqli_connect("localhost", "root", "", "time_table");

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}

$query = "SELECT sem_type FROM set_sem WHERE id = 1";
$result = mysqli_query($link,$query);
$rs=mysqli_fetch_assoc($result);
$sem = $rs["sem_type"];
$n = 0;
if($sem === "even"){
$n = 2;
} else{
$n = 1;
}

//
$query = "SELECT uname FROM ".$code."_lecturers";
$lresult = mysqli_query($link,$query);
$lec_uname = array();

while ($row = mysqli_fetch_array($lresult)) {
    array_push($lec_uname, $row["uname"]);
    $drp = "DROP TABLE IF EXISTS ".$code."_".$row["uname"]."_timetable";
    $drp_sql=mysqli_query($link,$drp);

    $tbl = "CREATE TABLE IF NOT EXISTS ".$code."_".$row["uname"]."_timetable (id INT AUTO_INCREMENT PRIMARY KEY, hour1 VARCHAR(50) NOT NULL, 
    hour2 VARCHAR(50) NOT NULL,
    hour3 VARCHAR(50) NOT NULL,
    hour4 VARCHAR(50) NOT NULL,
    hour5 VARCHAR(50) NOT NULL,
    hour6 VARCHAR(50) NOT NULL,
    hour7 VARCHAR(50) NOT NULL,
    hour8 VARCHAR(50) NOT NULL)";
    $crt_sql=mysqli_query($link,$tbl);

    for($i = 0;$i < 6;$i++){
        $ins = "INSERT INTO ".$code."_".$row["uname"]."_timetable () VALUES()";
        $crt_sql=mysqli_query($link,$ins);
    }
}

for ($i = 0; $i < count($lec_uname); $i++) {
    for ($j = $n; $j < 7; $j += 2) {
        $arr = getSemTable($code."_".$j."_timetable");
        for ($p = 0; $p < 6; $p++) {
            for ($q = 0; $q < 8; $q++) {
                $pos = strpos($arr[$p][$q], getLecNameOfUname($lec_uname[$i], $code));
                if ((strpos($arr[$p][$q], "Lab Slot") !== false) && isLabHandled($lec_uname[$i], $code, $j)) {
                    setSlotName(false, $p +1 , $q + 1, $code."_".$lec_uname[$i]."_timetable", $arr[$p][$q]." - sem".$j);
                } elseif($pos !== false){
                    setSlotName(false, $p +1 , $q + 1, $code."_".$lec_uname[$i]."_timetable", substr($arr[$p][$q], 0, $pos)."sem".$j);
                }
            }
        }
    }
}


mysqli_close($link);

?>
    <script>
        alert("Faculty Timetable generated Successfully");
        document.location="dept_view.php";
    </script>
<?php


?>
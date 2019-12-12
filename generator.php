<?php
session_start();
set_time_limit(100);

/*----------------------------------------------------------------------------------*/
function labBatchCombination($sem){

$code = $_SESSION['code'];

$link = mysqli_connect("localhost", "root", "", "time_table");

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
$lquery = "SELECT name FROM  ".$code."_labs WHERE sem = ".$sem;
$lresult = mysqli_query($link,$lquery);
$labs = array();
while($res = mysqli_fetch_array($lresult)){
    array_push($labs, $res["name"]);
}


$query = "SELECT lb FROM  ".$code."_labs ORDER BY id ASC LIMIT 1";
$result = mysqli_query($link,$query);
$rs=mysqli_fetch_assoc($result);
$nbatch = $rs["lb"];
$batches = array();
for($i = 0; $i < $nbatch; $i++){
    $batches[$i] = "Batch ".$i;
}

$combi = array();
$k = 0;
for ($i = 0; $i < (labSlots($sem) + 1); $i++) {
    for ($j = 0; $j < count($labs); $j++) {
        if($i === 0){
            $combi[$i][$j] = $labs[$j];
        }  else {
            if(count($batches)> count($labs)){
                $mod = $k%count($batches);
                $combi[$i][$j] = $batches[$mod];
                $k++;
            } elseif (count($batches)< count($labs)) {
                
            } else {
                
            }
        }
    }
}

mysqli_close($link);
return $combi;
//func end
}







/*------------------------------------------------------------------------------------*/

function labSlots($sem){
$code = $_SESSION['code'];

$link = mysqli_connect("localhost", "root", "", "time_table");

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
$lquery = "SELECT id FROM  ".$code."_labs WHERE sem = ".$sem;
$lresult = mysqli_query($link,$lquery);
$nlabs = mysqli_num_rows($lresult);


$query = "SELECT lb FROM  ".$code."_labs ORDER BY id ASC LIMIT 1";
$result = mysqli_query($link,$query);
$rs=mysqli_fetch_assoc($result);
$nbatch = $rs["lb"];
mysqli_close($link);
return max($nlabs, $nbatch);

}









/*-------------------------------------------------------------------------------------*/
function getLabRandomSlot(){
$day = mt_rand(1, 5);
$hour = mt_rand(1, 6);


$arr = array($day, $hour);
return $arr;
}






/*-------------------------------------------------------------------------------------*/
function getRandomSlot(){
$day = mt_rand(1, 6);
$hour = mt_rand(1, 8);


$arr = array($day, $hour);
return $arr;
}







/*--------------------------------------------------------------------------------*/
function isSlotFree($isLab, $day, $hour, $tableName){

$link = mysqli_connect("localhost", "root", "", "time_table");

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
$hour = intval($hour);
if($isLab){
		$query = "SELECT hour".$hour." , hour".($hour + 1)." , hour".($hour + 2)." FROM  ".$tableName." WHERE id = ".$day;
		$result = mysqli_query($link,$query);
		$rs=mysqli_fetch_assoc($result);
		if($rs["hour".$hour] === "" && $rs["hour".($hour + 1)] === "" && $rs["hour".($hour + 2)] === ""){
			mysqli_close($link);
			return true;
		}else{
		mysqli_close($link);
			return false;
		}
}else{
		$query = "SELECT hour".$hour." FROM  ".$tableName." WHERE id = ".$day;
		$result = mysqli_query($link,$query);
		$rs=mysqli_fetch_assoc($result);
		if($rs["hour".$hour] === ""){
		mysqli_close($link);
			return true;
		}else{
		mysqli_close($link);
			return false;
		}
}

//end
}







/*------------------------------------------------------------------------------------------*/
function getSlotName($day, $hour, $tableName){
$link = mysqli_connect("localhost", "root", "", "time_table");

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
$query = "SELECT hour".$hour." FROM  ".$tableName." WHERE id = ".$day;
$result = mysqli_query($link,$query);
$rs=mysqli_fetch_assoc($result);
mysqli_close($link);
return $rs["hour".$hour];
//end
}





/*----------------------------------------------------------------------------------*/
function getLecIdOfSubName($name){
$code = $_SESSION['code'];
$link = mysqli_connect("localhost", "root", "", "time_table");

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
$query = "SELECT lec_id FROM  ".$code."_subjects WHERE name = '$name'";
$result = mysqli_query($link,$query);
$rs=mysqli_fetch_assoc($result);

$lecId =  $rs["lec_id"];
mysqli_close($link);
return $lecId;
//end
}


/*-----------------------------------------------------------------------------------*/

function getLecNameOfSubName($name){
    $code = $_SESSION['code'];
    $link = mysqli_connect("localhost", "root", "", "time_table");

    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }
    $id = getLecIdOfSubName($name);
    $query = "SELECT name FROM  ".$code."_lecturers WHERE id = '$id'";
    $result = mysqli_query($link,$query);
    $rs=mysqli_fetch_assoc($result);

    $lec_name =  $rs["name"];
    mysqli_close($link);
    return $lec_name;
}

/*----------------------------------------------------------------------------------*/
function getLecIdOfLabName($name){
$code = $_SESSION['code'];
$link = mysqli_connect("localhost", "root", "", "time_table");


if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
$query = "SELECT lec_id FROM  ".$code."_labs WHERE name = '$name'";
$result = mysqli_query($link,$query);
if($result){
				}else{
   		 echo "ERROR: Could not able to execute $query. " . mysqli_error($link) . "\n";
		}
$rs=mysqli_fetch_assoc($result);

$lecId =  $rs["lec_id"];
mysqli_close($link);
return $lecId;
//end
}






/*-------------------------------------------------------------------------------------------*/
function isLecFree($isLab, $day, $hour, $tableName, $subName, $sem){//For Class
$code = $_SESSION['code'];


$link = mysqli_connect("localhost", "root", "", "time_table");

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
if($isLab){
		/*if(isSlotFree($isLab, $day, $hour, $tableName) && isSlotFree($isLab, $day, ($hour + 1), $tableName) && isSlotFree($isLab, $day, ($hour + 2), $tableName)){
			return true;
		}else{
			for($i = $hour; $i < ($hour +3); $i++){
				$slotName = getSlotName($day, $hour, $tableName);
				if(substr($slotName, 8) === "Lab Slot"){
					$query = "SELECT lec_id FROM  ".$code."_labs WHERE sem = '$sem'";
					$result = mysqli_query($link,$query);
					while($rs=mysqli_fetch_assoc($result)){
						if($rs["lec_id"] === getLecIdOfSubName($subName)){
							return false;
						}
					}				
				}else{
					$lecId =  getLecIdOfSubName($slotName);
					if($lecId === getLecIdOfSubName($subName)){
						return false;
					}			
				}	
			}
			return true;		
		}*/
}else{
		if(isSlotFree($isLab, $day, $hour, $tableName)){
		mysqli_close($link);
			return true;
		}else{
			$slotName = getSlotName($day, $hour, $tableName);
			if(substr($slotName, 8) === "Lab Slot"){
				$query = "SELECT lec_id FROM  ".$code."_labs WHERE sem = '$sem'";
				$result = mysqli_query($link,$query);
				while($rs=mysqli_fetch_assoc($result)){
					if($rs["lec_id"] === getLecIdOfSubName($subName)){
						mysqli_close($link);
		
						return false;
					}
				}
				mysqli_close($link);
		
				return true;
			
			}else{
				$lecId =  getLecIdOfSubName($slotName);
				if($lecId === getLecIdOfSubName($subName)){
					mysqli_close($link);
		
					return false;
				}else{
					mysqli_close($link);
		
					return true;
				}			
			}		
		}		
}

//end
}








/*-------------------------------------------------------------------------------------------*/
function isLecLabFree($day, $hour, $tableName, $labName, $sem){
$code = $_SESSION['code'];


$link = mysqli_connect("localhost", "root", "", "time_table");


if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
if(isSlotFree(false, $day, $hour, $tableName) && isSlotFree(false, $day, ($hour + 1), $tableName) && isSlotFree(false, $day, ($hour + 2), $tableName)){
	mysqli_close($link);
	return true;
}else{
	for($i = $hour; $i < ($hour +3); $i++){
		$slotName = getSlotName($day, $i, $tableName);
		if(substr($slotName, 8) === "Lab Slot"){
			/*$query = "SELECT lec_id FROM  ".$code."_labs WHERE sem = '$sem'";
			$result = mysqli_query($link,$query);
			while($rs=mysqli_fetch_assoc($result)){
				for($j = 0; $j < count($labName); $i++){
					if($rs["lec_id"] === getLecIdOfLabName($labName[$j])){
						mysqli_close($link);
		echo "isLecLabFree false <br>";
						return false;
					}
				}
			}*/	
			mysqli_close($link);
						return false;			
		}else{
			$lecId =  getLecIdOfSubName($slotName);
			for($j = 0; $j < count($labName); $j++){
				if($lecId === getLecIdOfLabName($labName[$j])){
					mysqli_close($link);
		
					return false;
				}
			}			
		}	
	}
	mysqli_close($link);
		
	return true;		
}

//end
}












/*----------------------------------------------------------------------------------*/
function getAllSubjects($sem){
$code = $_SESSION['code'];
$link = mysqli_connect("localhost", "root", "", "time_table");

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
$query = "SELECT name FROM  ".$code."_subjects WHERE sem = '$sem'";
$result = mysqli_query($link,$query);
$sub = array();
while($rs=mysqli_fetch_assoc($result)){
	array_push($sub, $rs["name"]);
}
mysqli_close($link);
return $sub;
//end
}






/*----------------------------------------------------------------------------------*/
function getClassPerWeek($name){
$code = $_SESSION['code'];
$link = mysqli_connect("localhost", "root", "", "time_table");

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
$query = "SELECT cpw FROM  ".$code."_subjects WHERE name = '$name'";
$result = mysqli_query($link,$query);
$rs=mysqli_fetch_assoc($result);

$cpw =  $rs["cpw"];
mysqli_close($link);
return $cpw;
//end
}









/*----------------------------------------------------------------------------------*/
function getAllLabs($sem){
$code = $_SESSION['code'];
$link = mysqli_connect("localhost", "root", "", "time_table");

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
$query = "SELECT name FROM  ".$code."_labs WHERE sem = '$sem'";
$result = mysqli_query($link,$query);
$lab = array();
while($rs=mysqli_fetch_assoc($result)){
	array_push($lab, $rs["name"]);
}
mysqli_close($link);
return $lab;
//end
}









/*------------------------------------------------------------------------------------------*/
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











/*-------------------------------------------------------------------------------------------*/

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

for($j = $n; $j > 0 && $j < 7; $j += 2){
	$drp = "DROP TABLE IF EXISTS ".$code."_".$j."_timetable";
	$drp_sql=mysqli_query($link,$drp);
	
	$tbl = "CREATE TABLE IF NOT EXISTS ".$code."_".$j."_timetable (id INT AUTO_INCREMENT PRIMARY KEY, hour1 VARCHAR(50) NOT NULL, 
	hour2 VARCHAR(50) NOT NULL,
	hour3 VARCHAR(50) NOT NULL,
	hour4 VARCHAR(50) NOT NULL,
	hour5 VARCHAR(50) NOT NULL,
	hour6 VARCHAR(50) NOT NULL,
	hour7 VARCHAR(50) NOT NULL,
	hour8 VARCHAR(50) NOT NULL)";
	$crt_sql=mysqli_query($link,$tbl);
	
	for($i = 0;$i < 6;$i++){
	$ins = "INSERT INTO ".$code."_".$j."_timetable () VALUES()";
	$crt_sql=mysqli_query($link,$ins);
	}

}
// set all labs
for($j = $n; $j > 0 && $j < 7; $j += 2){

		$slots = labSlots($j);
		$labs = getAllLabs($j);
		for($i=0; $i < $slots; $i++){
			$arr = getLabRandomSlot();
			switch ($j) {
					case 1:
						while( !isSlotFree(true, $arr[0], $arr[1], $code."_".$j."_timetable") || !isLecLabFree($arr[0], $arr[1], $code."_3_timetable", $labs, 3) || !isLecLabFree($arr[0], $arr[1], $code."_5_timetable", $labs,5)){
							$arr = getLabRandomSlot();
						}
						setSlotName(true, $arr[0], $arr[1], $code."_".$j."_timetable", "Lab Slot ".($i+1));
						break;
						
					case 2:
						while( !isSlotFree(true, $arr[0], $arr[1], $code."_".$j."_timetable") || !isLecLabFree($arr[0], $arr[1], $code."_4_timetable", $labs, 4) || !isLecLabFree($arr[0], $arr[1], $code."_6_timetable", $labs,6)){
							$arr = getLabRandomSlot();
						}
						setSlotName(true, $arr[0], $arr[1], $code."_".$j."_timetable", "Lab Slot ".($i+1));
						break;
						
					case 3:
						while( !isSlotFree(true, $arr[0], $arr[1], $code."_".$j."_timetable") || !isLecLabFree($arr[0], $arr[1], $code."_1_timetable", $labs, 1) || !isLecLabFree($arr[0], $arr[1], $code."_5_timetable", $labs,5)){
							$arr = getLabRandomSlot();
						}
						setSlotName(true, $arr[0], $arr[1], $code."_".$j."_timetable", "Lab Slot ".($i+1));
						break;
					case 4:
						while( !isSlotFree(true, $arr[0], $arr[1], $code."_".$j."_timetable") || !isLecLabFree($arr[0], $arr[1], $code."_2_timetable", $labs, 2) || !isLecLabFree($arr[0], $arr[1], $code."_6_timetable", $labs,6)){
							$arr = getLabRandomSlot();
						}
						setSlotName(true, $arr[0], $arr[1], $code."_".$j."_timetable", "Lab Slot ".($i+1));
						break;
						
					case 5:
						while( !isSlotFree(true, $arr[0], $arr[1], $code."_".$j."_timetable") || !isLecLabFree($arr[0], $arr[1], $code."_1_timetable", $labs, 1) || !isLecLabFree($arr[0], $arr[1], $code."_3_timetable", $labs,3)){
							$arr = getLabRandomSlot();
						}
						setSlotName(true, $arr[0], $arr[1], $code."_".$j."_timetable", "Lab Slot ".($i+1));
						break;
						
					case 6:
						while( !isSlotFree(true, $arr[0], $arr[1], $code."_".$j."_timetable") || !isLecLabFree($arr[0], $arr[1], $code."_2_timetable", $labs, 2) || !isLecLabFree($arr[0], $arr[1], $code."_4_timetable", $labs,4)){
							$arr = getLabRandomSlot();
						}
						setSlotName(true, $arr[0], $arr[1], $code."_".$j."_timetable", "Lab Slot ".($i+1));
						break;
						
					default:
						break;
				}
			
		}

}
// set all subjects
for($j = $n; $j > 0 && $j < 7; $j += 2){
		$subName = getAllSubjects($j);
		for($i=0; $i < count($subName); $i++){
			$cpw = getClassPerWeek($subName[$i]);
			for($k = 0; $k < $cpw; $k++){
				$arr = getRandomSlot();
				switch ($j) {
					case 1:
						while( !isSlotFree(false, $arr[0], $arr[1], $code."_".$j."_timetable") || !isLecFree(false, $arr[0], $arr[1], $code."_3_timetable", $subName[$i], 3) || !isLecFree(false, $arr[0], $arr[1], $code."_5_timetable", $subName[$i],5)){
							$arr = getRandomSlot();
						}
						setSlotName(false, $arr[0], $arr[1], $code."_".$j."_timetable", $subName[$i]." - ".getLecNameOfSubName($subName[$i]));
						break;
						
					case 2:
						while( !isSlotFree(false, $arr[0], $arr[1], $code."_".$j."_timetable") || !isLecFree(false, $arr[0], $arr[1], $code."_4_timetable", $subName[$i], 4) || !isLecFree(false, $arr[0], $arr[1], $code."_6_timetable", $subName[$i], 6)){
							$arr = getRandomSlot();
						}
						setSlotName(false, $arr[0], $arr[1], $code."_".$j."_timetable", $subName[$i]." - ".getLecNameOfSubName($subName[$i]));
						break;
						
					case 3:
						while( !isSlotFree(false, $arr[0], $arr[1], $code."_".$j."_timetable") || !isLecFree(false, $arr[0], $arr[1], $code."_1_timetable", $subName[$i], 1) || !isLecFree(false, $arr[0], $arr[1], $code."_5_timetable", $subName[$i], 5)){
							$arr = getRandomSlot();
						}
						setSlotName(false, $arr[0], $arr[1], $code."_".$j."_timetable", $subName[$i]." - ".getLecNameOfSubName($subName[$i]));
						break;
					case 4:
						while( !isSlotFree(false, $arr[0], $arr[1], $code."_".$j."_timetable") || !isLecFree(false, $arr[0], $arr[1], $code."_2_timetable", $subName[$i], 2) || !isLecFree(false, $arr[0], $arr[1], $code."_6_timetable", $subName[$i], 6)){
							$arr = getRandomSlot();
						}
						setSlotName(false, $arr[0], $arr[1], $code."_".$j."_timetable", $subName[$i]." - ".getLecNameOfSubName($subName[$i]));
						break;
						
					case 5:
						while( !isSlotFree(false, $arr[0], $arr[1], $code."_".$j."_timetable") || !isLecFree(false, $arr[0], $arr[1], $code."_1_timetable", $subName[$i], 1) || !isLecFree(false, $arr[0], $arr[1], $code."_3_timetable", $subName[$i], 3)){
							$arr = getRandomSlot();
						}
						setSlotName(false, $arr[0], $arr[1], $code."_".$j."_timetable", $subName[$i]." - ".getLecNameOfSubName($subName[$i]));
						break;
						
					case 6:
						while( !isSlotFree(false, $arr[0], $arr[1], $code."_".$j."_timetable") || !isLecFree(false, $arr[0], $arr[1], $code."_2_timetable", $subName[$i], 2) || !isLecFree(false, $arr[0], $arr[1], $code."_4_timetable", $subName[$i], 4)){
							$arr = getRandomSlot();
						}
						setSlotName(false, $arr[0], $arr[1], $code."_".$j."_timetable", $subName[$i]." - ".getLecNameOfSubName($subName[$i]));
						break;
					default:
						break;
				}
		}
		
	}

}
mysqli_close($link);

?>
						<script>
						    alert("Student Timetable generated successfully");
                                                    document.location="generator_lec.php";
						</script>
						<?php


?>
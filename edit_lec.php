<?php
session_start();

$code = $_SESSION['code'];

$lec_name = $_POST['t1'];
$cuname = $_POST['t2'];
$uname = $_POST['t3'];
$pass = $_POST['t4'];
$des = $_POST['t8'];
$exp = $_POST['t5'];
$adr = $_POST['t6'];
$tel = $_POST['t7'];
$email = $_POST['t9'];

if($lec_name != ""){
$link = mysqli_connect("localhost", "root", "", "time_table");

 

// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
$tbl = "CREATE TABLE IF NOT EXISTS ".$code."_lecturers (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(50) NOT NULL, uname VARCHAR(50) NOT NULL, pass VARCHAR(20) NOT NULL, des VARCHAR(50) NOT NULL, exp INT NOT NULL, adr LONGTEXT, tel BIGINT NOT NULL, email VARCHAR(50) NOT NULL)";
$crt_sql=mysqli_query($link,$tbl);
						

    // Attempt insert query execution

    $sql="UPDATE ".$code."_lecturers SET name = '".$lec_name."', uname = '".$uname."', pass = '".$pass."', des = '".$des."', exp = '".$exp."', adr = '".$adr."', tel = '".$tel."', email = '".$email."' WHERE uname = '".$cuname."'";
    if(mysqli_query($link, $sql)){?>
        <script>
            alert("Record Updated Successfully!");
        </script>
        <?php
        }
     else {
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
     }
            mysqli_close($link);


    ?>
        <script>
           document.location="dept_edit.php";
        </script>
        <?php

        } 

        // Close connection

        mysqli_close($link);

        ?>
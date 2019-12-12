<?php 
session_start();


$uname=$_POST['t1'];
$upass=$_POST['t2'];
$select=$_POST['select_user'];

$_SESSION['t1']=$uname;

$link = mysqli_connect("localhost", "root", "", "time_table");

// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
$ss="SELECT * FROM dept_table WHERE uname='$uname' AND pass='$upass' AND code='$select'";
$res=mysqli_query($link,$ss);

if($res){

    

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}

$row=mysqli_fetch_array($res,MYSQLI_ASSOC);

if($uname == "admin" && $upass=="admin" && $select=="college_admin")
{
	mysqli_close($link);
	?>
	<script>
	   document.location="collage_admin.php";
	</script>
	<?php
	}
	elseif(empty($row))
{
  echo"invalid user!try again";
}
else
{
	mysqli_close($link);
	$_SESSION['code']=$select;
	?>
	<script>
		document.location="dept_admin.php";
	</script>
	<?php
		
}
mysqli_close($link);

?>
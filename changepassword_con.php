<?php
session_start();

$username=$_SESSION['t1'];

$password=$_POST['t2'];

$new=$_POST['t3'];

$confirm=$_POST['t4'];

$login="false";


$con=mysql_connect("localhost","root","");
mysql_select_db("time_table",$con);

$sql="select * from login where username='$username' and password='$password'";

$res=mysql_query($sql);

while($row=mysql_fetch_array($res))
{

      if($username==$row['username'] && $password==$row['password'])
	  {
	     $login="true";
	  }
	  
	  else
	  {
	     $login="false";
	  }

}


  if($login=="true")
  {
  
      if($new==$confirm)
	  {
         $sql="update login set password='$new' where username='$username'";
		 mysql_query($sql);	
		 
		 echo "Update Your Password Successfully.. "." "."<a href=login.html> Login Here</a>";
	  }
	  
	  else
	  {
	     echo "new password and confirm password must be same "." "."<a href=changepass.php> Try Again</a>";
	  }
	  
}

else

echo "invalid username or password "." "."<a href=changepass.php> Try Again</a>";	  
?>
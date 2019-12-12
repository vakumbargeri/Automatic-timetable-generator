
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Automated Timetable Generator</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Archive Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js"></script>
</head>
<body>
<!-- header -->
	<div class="content-main">
		<div class="container">
			<div class="col-md-3 top-left">
				<div class="logo">
					<a href="index.html" style="color:#FFFFFF; font-weight:bold;'">College Time Table Generator</a>
				</div>
				<h4 class="menn">&nbsp;</h4>
		    <label></label>
		    <div class="clearfix"> </div>
				</div>
			<div class="col-md-9 top-right">
		<div class="about-content">
		 <h2>Welcome to Login Panel!</h2>
		 <div class="about-section">
			 <div class="about-grid">
             <form name="form1" method="post" action="new_login_check.php">
				 <table width="411" height="148">
                   <tr>
                     <td width="132"><strong>Username</strong></td>
                     <td width="170">
                       <label>
                       <input type="text" name="t1" id="t1">
                       </label>                                        </td>
                   </tr>
                   <tr>
                     <td><strong>Password</strong></td>
                     <td><input type="password" name="t2" id="t2"></td>
                   </tr>
				   <tr>
				   <td><strong>Select user type</strong></td>
                     <td><select name="select_user" size="1" >
				         <option selected="selected" value="college_admin">College admin/ Principal</option>
						 <?php
						 $con=mysqli_connect("localhost","root","","time_table");
						 if (mysqli_connect_errno())
						 {
						 ?>
						 <script>
						 	alert("Failed to connect to MySQL: " . mysqli_connect_error());
							</script>
							<?php
  						 }
						 						 
						 $crt_sql=mysqli_query($con,"CREATE TABLE IF NOT EXISTS dept_table(id INT AUTO_INCREMENT PRIMARY KEY, code varchar(10) NOT NULL,uname varchar(20) NOT NULL, pass varchar(20) NOT NULL)");
						$mresult=mysqli_query($con,$crt_sql);
						 
						 $sql="SELECT code FROM Dept_table";
						 $result=mysqli_query($con,$sql);
						 				
						$select= '<select name="select">';
						  while($rs=mysqli_fetch_assoc($result)){
                          echo "<option value='".htmlspecialchars($rs["code"])."' >".htmlspecialchars($rs["code"])." admin/ H.O.D</option>";
						  }
						  
						  $select.='</select>';
						  echo $select;	
						  
						 ?>
			           </select>
					   </td>
                   </tr>
                   <tr>
                     <td>&nbsp;</td>
                     <td><label>
                       <input name="button" type="submit" class="bg-primary" id="button" value="LOGIN">
                     </label></td>
                   </tr>
                 </table>
               </form> 
				 <h3>&nbsp;</h3>
		   </div>
		  </div>
		</div>
	 </div>
		<div class="clearfix"> </div>
	</div>
	</div>
	<!-- footer -->
	<div class="footer">
		<div class="container">
			<p>Copyrights © 2017 College Time Table Generator<a href="http://w3layouts.com/"></a></p>
		</div>
	</div>
	<!-- footer -->
        </body>
</html>


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
<script type="text/javascript" src="showhide.js"></script>
</head>
<body>
<!-- header -->
	<div class="content-main">
		<div class="container">
			<div class="col-md-3 top-left">
				<div class="logo">
				<a href="index.html" style="color:#FFFFFF; font-weight:bold;'">College Time Table Generator</a>
				</div>
				<h4 class="menn">Menu</h4>
				<label></label>
				<div class="head-nav">
					<span class="menu"> </span>
						<ul>
							<li><a href="dept_admin.php">Home</a></li>
							<li class="active"><a href="dept_add.php">Add</a></li>
							<li><a href="dept_edit.php">Edit</a></li>
							<li><a href="dept_generate.php">Generate Timetable</a></li>
							<li><a href="dept_view.php">View Timetable</a></li>
                            <li><a href="changepass.php">Change password</a></li>
                            <li><a href="index.html">Logout</a></li>


						  <div class="clearfix"> </div>
						</ul>
						<!-- script-for-nav -->
					<script>
						$( "span.menu" ).click(function() {
						  $( ".head-nav ul" ).slideToggle(300, function() {
							// Animation complete.
						  });
						});
					</script>
				<!-- script-for-nav --> 	
				</div>
				<div class="clearfix"> </div>
				<div class="project">
					
				</div>
		  </div>
			<div class="col-md-9 top-right">
		<div class="about-content">
		 <h2>Add Details of <?php session_start();
								echo $_SESSION['code']; ?> Department</h2>
		 <div class="about-section">
			 <div class="about-grid">
				 <h3>
			   <div align="center">
				   <form name="form1" method="post" action="">
				     <p align="left">
				       <select name="select" size="1" id="select" onChange="changeform()">
				         <option selected="selected">SELECT</option>
				         <option value="sub">Subjects</option>
					 <option value="lab">Labs</option>
				         <option value="lec">Lecturers</option>
				         <option value="stu">Students</option>
			           </select>
				       <label>
				       </label>
				     </p>

				   </form>
		   </div>
		   <div id="show_sub" style="display:none">
				 <form method="post"  action="add_sub.php" >
                	<table width="500" height="148">
                   <tr>
                     <td width="500"><strong>Subject name </strong></td>
                     <td width="170">
                       <label>
                       <input type="text" name="t1" id="t1">
                       </label>                                        </td>
                   </tr>
				   <tr>
                     <td><strong>Select Semester </strong> </td>
                     <td><select name="select_sem" size="1" >
				         <option selected="selected" value="select">SELECT</option>
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
						 
						 
						 $sql="SELECT sem_type FROM set_sem";
						 $result=mysqli_query($con,$sql);
						 
						 $rs=mysqli_fetch_assoc($result);
						 if($rs["sem_type"] === "even" ){
						 	$sem_list = array("2", "4", "6");
						 } else {
						 	$sem_list = array("1", "3", "5");
						}
						 				
						$select= '<select name="select">';
						  for($x = 0; $x < 3; $x++){
                          echo "<option value='".htmlspecialchars($sem_list[$x])."' >".htmlspecialchars($sem_list[$x])."</option>";
						  }
						  
						  $select.='</select>';
						  echo $select;	
						  
						 ?>
			           </select>
					   </td>
                   </tr>
				   <tr>
                     <td><strong>Number of Class per week </strong> </td>
                     <td><input type="number" min="1" max="10" value="4" name="t4" id="t4"></td>
                   </tr>
                   <tr>
                     <td>&nbsp;</td>
                     <td><label>
                       <input name="button" type="submit" class="bg-primary" id="button" value="ADD">
                     </label></td>
                   </tr>
                 </table>

				</form>
				</div>
</div>
		<div id="show_lab" style="display:none">
				 <form method="post"  action="add_lab.php">
                	<table width="411" height="148">
                   <tr>
                     <td width="132"><strong>Lab name </strong></td>
                     <td width="170">
                       <label>
                       <input type="text" name="t1" id="t1">
                       </label>                                        </td>
                   </tr>
				   <tr>
                     <td><strong>Select Semester </strong> </td>
                     <td><select name="select_sem" size="1" >
				         <option selected="selected" value="select">SELECT</option>
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
						 
						 
						 $sql="SELECT sem_type FROM set_sem";
						 $result=mysqli_query($con,$sql);
						 
						 $rs=mysqli_fetch_assoc($result);
						 if($rs["sem_type"] === "even" ){
						 	$sem_list = array("2", "4", "6");
						 } else {
						 	$sem_list = array("1", "3", "5");
						}
						 				
						$select= '<select name="select">';
						  for($x = 0; $x < 3; $x++){
                          echo "<option value='".htmlspecialchars($sem_list[$x])."' >".htmlspecialchars($sem_list[$x])."</option>";
						  }
						  
						  $select.='</select>';
						  echo $select;	
						  
						 ?>
			           </select>
					   </td>
                   </tr>
				   <tr>
                     <td><strong>Number of Hours per Lab </strong> </td>
                     <td><input type="number" min="1" max="4" value="3" name="t4" id="t4"></td>
                   </tr>
				    <tr>
                     <td><strong>Number of Lab batches</strong> </td>
                     <td><input type="number" min="1" max="10" value="2" name="t5" id="t5"></td>
                   </tr>
                   <tr>
                     <td>&nbsp;</td>
                     <td><label>
                       <input name="button" type="submit" class="bg-primary" id="button" value="ADD">
                     </label></td>
                   </tr>
                 </table>

				</form>
				</div>
				
			<div id="show_lec" style="display:none">
				 <form method="post"  action="add_lec.php">
                	<table width="754" height="453">

  <tr>
    <td width="272"><strong>Faculty Name </strong></td>
    <td width="470"><label>
      <input name="t1" type="text" id="t1" />
    </label></td>
  </tr>
  <tr>
    <td width="272"><strong>User Name </strong></td>
    <td width="470"><label>
      <input name="t2" type="text" id="t2" />
    </label></td>
  </tr>
  <tr>
    <td width="272"><strong>Password</strong></td>
    <td width="470"><label>
      <input name="t3" type="password" id="t3" />
    </label></td>
  </tr>
  <tr>
    <td><strong>Designation</strong></td>
    <td><label>
	  <select name="t8" size="1" id="t8" >
				         <option selected="selected" value="Lecturer">Lecturer</option>
                                                <option value="Mechanic">Mechanic</option>
						 <option value="Lab Instructor">Lab Instructor</option>
						 <option value="Lab Assistant">Lab Assistant</option>
						 <option value="Assistant Professor">Assistant Professor</option>
						 <option value="Associate Professor">Associate Professor</option>
						 <option value="Professor">Professor</option>
						 <option value="HOD">H.O.D</option>
	</select>
    </label></td>
  </tr>
  <tr>
    <td><strong>Experience (In years)</strong></td>
    <td><input type="number" min="1" max="50" name="t4" id="t4"></td>
  </tr>
  <tr>
    <td><strong>Address</strong></td>
    <td><label>
      <textarea name="t5" id="t5"></textarea>
    </label></td>
  </tr>
  <tr>
    <td><strong>Contact No. </strong></td>
    <td><input name="t6" type="tel" id="t6" maxlength="10" /></td>
  </tr>
  <tr>
    <td><strong>Email ID </strong></td>
    <td><input name="t7" type="email" id="t7" /></td>
  </tr>
  <tr>
    <td><strong>Subjects/ Labs Handled</strong></td>
    <td><label>
	  <?php

		$code = $_SESSION['code'];
						 $con=mysqli_connect("localhost","root","","time_table");
						 if (mysqli_connect_errno())
						 {
						 ?>
						 <script>
						 	alert("Failed to connect to MySQL: " . mysqli_connect_error());
							</script>
							<?php
  						 }
						 
						 
						 $sub="SELECT id, name FROM ".$code."_subjects WHERE lec_id = 0";
						 $result=mysqli_query($con,$sub);
						 					 
						 
						 while($row = mysqli_fetch_assoc($result)) {
     						echo "<input type='checkbox' name='chkid[]' value='"."sub".$row['id']."'>" . " ". $row['name'];
							echo "<br />";
						 }
						 
						 $lab="SELECT id, name FROM ".$code."_labs WHERE lec_id = 0";
						 $result=mysqli_query($con,$lab);
						 echo "<br />";
						 					 
						 
						 while($row = mysqli_fetch_assoc($result)) {
						 	echo "<input type='checkbox' name='chkid[]' value='"."lab".$row['id']."'>" . " ". $row['name'];
							echo "<br />";
						 }
						  
						 ?>
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input type="submit" name="Submit" value="Submit" />
    </label></td>
  </tr>
</table>

	</form>
		</div>	
				
			<div id="show_stu" style="display:none">
				 <form method="post"  action="add_stu.php">
                	<table width="411" height="148">
                   <tr>
                     <td width="132"><strong>User name </strong></td>
                     <td width="170">
                       <label>
                       <input type="text" name="t1" id="t1">
                       </label>                                        </td>
                   </tr>
                   <tr>
                     <td><strong>Password </strong> </td>
                     <td><input type="password" name="t2" id="t2"></td>
                   </tr>
				   <tr>
                     <td><strong>Semester </strong> </td>
                     <td><select name="select_sem" size="1" >
				         <option selected="selected" value="select">SELECT</option>
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
						 
						 
						 $sql="SELECT sem_type FROM set_sem";
						 $result=mysqli_query($con,$sql);
						 
						 $rs=mysqli_fetch_assoc($result);
						 if($rs["sem_type"] === "even" ){
						 	$sem_list = array("2", "4", "6");
						 } else {
						 	$sem_list = array("1", "3", "5");
						}
						 				
						$select= '<select name="select">';
						  for($x = 0; $x < 3; $x++){
                          echo "<option value='".htmlspecialchars($sem_list[$x])."' >".htmlspecialchars($sem_list[$x])."</option>";
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
                       <input name="button" type="submit" class="bg-primary" id="button" value="ADD">
                     </label></td>
                   </tr>
                 </table>

				</form>
				</div>
</div>
		  </div>
		</div>
	 </div>
		<div class="clearfix"> </div>
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
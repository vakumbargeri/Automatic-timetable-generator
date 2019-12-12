
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
<script type="text/javascript" src="showhide_timetable.js"></script>


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
							<li><a href="dept_add.php">Add</a></li>
							<li class="active"><a href="dept_edit.php">Edit</a></li>
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
		 <h2> Edit Profile of Faculty</h2>
		 <div class="about-section">
			 <div class="about-grid">
                             <div align="center">
				<form method="post"  action="edit_lec.php">
                                    <table width="754" height="453">

                                        <tr>
                                          <td width="272"><strong>Faculty Name </strong></td>
                                          <td width="470"><label>
                                            <input name="t1" type="text" id="t1" />
                                          </label></td>
                                        </tr>
                                        <tr>
                                          <td width="272"><strong>Current User Name </strong></td>
                                          <td width="470"><label>
                                            <input name="t2" type="text" id="t2" />
                                          </label></td>
                                        </tr>
                                        <tr>
                                          <td width="272"><strong>New User Name </strong></td>
                                          <td width="470"><label>
                                            <input name="t3" type="text" id="t3" />
                                          </label></td>
                                        </tr>
                                        <tr>
                                          <td width="272"><strong>New Password</strong></td>
                                          <td width="470"><label>
                                            <input name="t4" type="password" id="t4" />
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
                                          <td><input type="number" min="1" max="50" name="t5" id="t5"></td>
                                        </tr>
                                        <tr>
                                          <td><strong>Address</strong></td>
                                          <td><label>
                                            <textarea name="t6" id="t6"></textarea>
                                          </label></td>
                                        </tr>
                                        <tr>
                                          <td><strong>Contact No. </strong></td>
                                          <td><input name="t7" type="tel" id="t7" maxlength="10" /></td>
                                        </tr>
                                        <tr>
                                          <td><strong>Email ID </strong></td>
                                          <td><input name="t9" type="email" id="t9" /></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                          <td><label>
                                            <input type="submit" name="Submit" value="Submit" />
                                          </label></td>
                                        </tr>
                                      </table>

	</form>
<form name="form1" method="post" action="">
				     

				   </form>
		   </div>
                             
		  
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
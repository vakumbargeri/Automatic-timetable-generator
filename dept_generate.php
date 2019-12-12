
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
							<li><a href="dept_add.php">Add</a></li>
							<li><a href="dept_edit.php">Edit</a></li>
							<li class="active"><a href="dept_generate.php">Generate Timetable</a></li>
							<li><a href="dept_view.php">View Timetable</a></li>
                            <li><a href="changepass.php">Change Password</a></li>
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
		 <h2> Generate Timetable  of 
	       <?php session_start();
								echo $_SESSION['code']; ?> Department</h2>
		 <div class="about-section">
			 <div class="about-grid">
				 <h3>
			   <div align="center">
				   <form name="form1" method="post" action="generator.php">					 
					 <table width="411" height="148" align="left">
					                  
                   <tr>
                     <td>Generate Timetable for all Semesters</td>
                     <td><label>
                       <input name="button" type="submit" class="bg-primary" id="button" value="Generate Timetable">
                     </label></td>
                   </tr>
                 </table>
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
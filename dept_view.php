
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
<script type="text/javascript" src="showhide_timetable.js"></script>
<script src="js/jspdf.debug.js"></script>
<script src="js/jspdf.min.js"></script>
<script src="js/jspdf.js"></script>
<script src="js/from_html.js"></script>
<script src="js/split_text_to_size.js"></script>
<script src="js/standard_fonts_metrics.js"></script>
<script type="text/javascript" src="save_pdf.js"></script>

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
							<li><a href="dept_generate.php">Generate Timetable</a></li>
							<li class="active"><a href="dept_view.php">View Timetable</a></li>
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
		 <h2> Timetables  of <?php session_start();echo $_SESSION['code']; ?> Department</h2>
		 <div class="about-section">
			 <div class="about-grid">
                             <div align="center">
				   <form name="form1" method="post" action="">
				     <p align="left">
				       <select name="select" size="1" id="select" onChange="changeform_timetable()">
				         <option value="sel" selected="selected">SELECT</option>
				         <option value="stu_timetable">Students</option>
				         <option value="lec_timetable">Faculty</option>
			           </select>
				       <label>
				       </label>
				     </p>

				   </form>
		   </div>
                             <div id="show_stu_timetable" style="display:none">
                                 <form method="post" action="" >
				 <h3 align="center"> Timetable for Semester <?php $code = $_SESSION['code'];
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
							echo $n;
							?></h3>
			     <div align="center">					 
					<table width="100%" height="80%" border="0" align="center" cellpadding="20" cellspacing="5" bordercolor="#000000" bgcolor="#EEEEEE" class="table-bordered">
                   <tr>
                     <td align="center" valign="middle" bgcolor="#9999FF"><strong>Day</strong></td>
                     <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 1</strong></td>
					 <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 2</strong></td>
					 <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 3</strong></td>
					 <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 4</strong></td>
					 <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 5</strong></td>
					 <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 6</strong></td>
					 <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 7</strong></td>
					 <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 8</strong></td>
                   </tr>
				   <?php
						$query = "SELECT * FROM ".$code."_".($n)."_timetable";
						$result = mysqli_query($link,$query);
						while($rs=mysqli_fetch_assoc($result)){
							$id = $rs["id"];
							switch ($id) {
								case 1: $week = "Monday";
									break;
								case 2: $week = "Tuesday";
									break;
								case 3: $week = "Wednesday";
									break;
								case 4: $week = "Thursday";
									break;
								case 5: $week = "Friday";
									break;
								case 6: $week = "Saturday";
									break;
								default: break;
							}			
					?>
                   <tr>
                     <td align="center" valign="middle" bgcolor="#9999FF"><strong><?php echo $week;?></strong></td>
					 <?php
					 	echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($rs["hour1"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($rs["hour2"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($rs["hour3"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($rs["hour4"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($rs["hour5"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($rs["hour6"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($rs["hour7"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($rs["hour8"])."</td>";
						}
                     ?>
                   </tr>
                 </table>
				    <div class="about-section">
                      <div class="about-grid">
                        <h3 align="center">Timetable for Semester <?php echo $n + 2;?></h3>
                        <div align="center">
                          <table width="100%" height="80%" border="0" align="center" cellpadding="20" cellspacing="5" bordercolor="#000000" bgcolor="#EEEEEE" class="table-bordered">
                            <tr>
                              <td align="center" valign="middle" bgcolor="#9999FF"><strong>Day</strong></td>
                              <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 1</strong></td>
                              <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 2</strong></td>
                              <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 3</strong></td>
                              <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 4</strong></td>
                              <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 5</strong></td>
                              <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 6</strong></td>
                              <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 7</strong></td>
                              <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 8</strong></td>
                            </tr>
                            <?php
						$query = "SELECT * FROM ".$code."_".($n + 2)."_timetable";
						$result = mysqli_query($link,$query);
						while($rs=mysqli_fetch_assoc($result)){
							$id = $rs["id"];
							switch ($id) {
								case 1: $week = "Monday";
									break;
								case 2: $week = "Tuesday";
									break;
								case 3: $week = "Wednesday";
									break;
								case 4: $week = "Thursday";
									break;
								case 5: $week = "Friday";
									break;
								case 6: $week = "Saturday";
									break;
								default: break;
							}			
					?>
                   <tr>
                     <td align="center" valign="middle" bgcolor="#9999FF"><strong><?php echo $week;?></strong></td>
					 <?php
					 	echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($rs["hour1"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($rs["hour2"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($rs["hour3"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($rs["hour4"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($rs["hour5"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($rs["hour6"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($rs["hour7"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($rs["hour8"])."</td>";
						}
                     ?>
                            </tr>
                          </table>
                          <div class="about-section">
                            <div class="about-grid">
                              <h3>Timetable for Semester <?php echo $n + 4;?></h3>
                              <div align="center">
                                <table width="100%" height="80%" border="0" align="center" cellpadding="20" cellspacing="5" bordercolor="#000000" bgcolor="#EEEEEE" class="table-bordered">
                                  <tr>
                                    <td align="center" valign="middle" bgcolor="#9999FF"><strong>Day</strong></td>
                                    <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 1</strong></td>
                                    <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 2</strong></td>
                                    <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 3</strong></td>
                                    <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 4</strong></td>
                                    <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 5</strong></td>
                                    <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 6</strong></td>
                                    <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 7</strong></td>
                                    <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 8</strong></td>
                                  </tr>
                                 <?php
						$query = "SELECT * FROM ".$code."_".($n + 4)."_timetable";
						$result = mysqli_query($link,$query);
						while($rs=mysqli_fetch_assoc($result)){
							$id = $rs["id"];
							switch ($id) {
								case 1: $week = "Monday";
									break;
								case 2: $week = "Tuesday";
									break;
								case 3: $week = "Wednesday";
									break;
								case 4: $week = "Thursday";
									break;
								case 5: $week = "Friday";
									break;
								case 6: $week = "Saturday";
									break;
								default: break;
							}			
					?>
                   <tr>
                     <td align="center" valign="middle" bgcolor="#9999FF"><strong><?php echo $week;?></strong></td>
					 <?php
					 	echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($rs["hour1"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($rs["hour2"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($rs["hour3"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($rs["hour4"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($rs["hour5"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($rs["hour6"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($rs["hour7"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($rs["hour8"])."</td>";
						}
                     ?>
                                  </tr>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                                    </div>
                             </div>
                                     </form>
                             </div>
                             
                             <div id="show_lec_timetable" style="display:none">
                                 <?php $code = $_SESSION['code'];
                                    $link = mysqli_connect("localhost", "root", "", "time_table");
                                    if($link === false){
                                    die("ERROR: Could not connect. " . mysqli_connect_error());
                                    }
                                    $query = "SELECT name,uname FROM ".$code."_lecturers";
                                    $result = mysqli_query($link,$query);
                                    
                                    while ($rs = mysqli_fetch_array($result)) {
                                        $name = $rs["name"];
                                        $uname = $rs["uname"];
                                        ?><h3 align="center"> Timetable for Prof. <?php echo $name; ?></h3>
                                        <div align="center">
                                        <form name="form1" method="post" action="">					 
                                             <table width="100%" height="80%" border="0" align="center" cellpadding="20" cellspacing="5" bordercolor="#000000" bgcolor="#EEEEEE" class="table-bordered">
                                                <tr>
                                                <td align="center" valign="middle" bgcolor="#9999FF"><strong>Day</strong></td>
                                                <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 1</strong></td>
                                                <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 2</strong></td>
                                                <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 3</strong></td>
                                                <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 4</strong></td>
                                                <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 5</strong></td>
                                                <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 6</strong></td>
                                                <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 7</strong></td>
                                                <td align="center" valign="middle" bgcolor="#9999FF"><strong>Slot 8</strong></td>
                                                </tr>
                                        <?php
                                        $tquery = "SELECT * FROM ".$code."_".$uname."_timetable";
                                        $tresult = mysqli_query($link,$tquery);
                                        while($trs=mysqli_fetch_assoc($tresult)){
                                            $id = $trs["id"];
                                            switch ($id) {
                                                    case 1: $week = "Monday";
                                                            break;
                                                    case 2: $week = "Tuesday";
                                                            break;
                                                    case 3: $week = "Wednesday";
                                                            break;
                                                    case 4: $week = "Thursday";
                                                            break;
                                                    case 5: $week = "Friday";
                                                            break;
                                                    case 6: $week = "Saturday";
                                                            break;
                                                    default: break;
                                            }
                                            ?>
                                            <tr>
                                            <td align="center" valign="middle" bgcolor="#9999FF"><strong><?php echo $week;?></strong></td>
                                            <?php
					 	echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($trs["hour1"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($trs["hour2"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($trs["hour3"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($trs["hour4"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($trs["hour5"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($trs["hour6"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($trs["hour7"])."</td>";
						echo "<td align='".htmlspecialchars("center")."' valign='".htmlspecialchars("middle")."' >".htmlspecialchars($trs["hour8"])."</td>";
                                        }
                                            ?>
                                            </tr>
                                            </table>
                                        </form>
                                        </div>
                                        <br>
                                        <br>
                                            <?php
                                            
                                    }
                                 
                                    
                                ?>
                                 
                                
                             </div>		  
</div>

</div>
		  </div>
                            <p align="center"><strong><strong><button id="download" style="display:none" onclick="save_to_pdf()">Download</button></strong></strong></p>
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
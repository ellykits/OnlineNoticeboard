<?php
    ini_set('max_execution_time', 300); //300 seconds = 5 minutes
    include_once "../lib/session_verify.php";
    require_once "../lib/Database.php";
    require_once "../lib/Notice.php";
    require_once "../lib/Admin.php";
    require_once "../lib/Mailer.php";
    
    $ntc = new Notice(new Database());
    $admin = new Admin(new Database());
    $ntc_no = $_GET['ntc'];
    if(isset($_GET['ntc'])){
        $ntc_no = $_GET['ntc'];
        $notice_to_send  = $ntc->getNoticeRecord($ntc_no);        
        $details = $notice_to_send['details'];
        $time_posted = $notice_to_send['time_posted'];
        $subject = $notice_to_send['subject'];
        $posted_by = $notice_to_send['posted_by'];
        $doc_name = $notice_to_send['doc_name'];
        $attachment = $notice_to_send['file_location'];
        $sent_to = $notice_to_send['sent_to'];    
        $mailed = $notice_to_send['mailed'];  
             
       
    }

 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>MAIL_NOTICE</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  
    
    <!--  Material Dashboard and Kit CSS   -->
    <link href="../assets/css/material-dashboard.css" rel="stylesheet"/>
    <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet" />

    <link href="../assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="../assets/css/material-icons.min.css" rel="stylesheet" />    
    
</head>

<body>

	<div class="wrapper">
	    <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->
	       <div class="logo">
				<a href="index.php" class="simple-text">
					Online Notice Board
				</a>
			</div>

            	<div class="sidebar-wrapper">
	            <ul class="nav">
	                <li >
	                    <a href="dashboard.php">
	                        <i class="material-icons">dashboard</i>
	                        <p>Dashboard</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="admin_profile.php">
	                        <i class="material-icons">edit</i>
	                        <p>My Profile</p>
	                    </a>
	                </li>
	               <li>
	                    <a href="cod.php">
	                        <i class="material-icons">supervisor_account</i>
	                        <p>COD</p>
	                    </a>
	                </li>
                     <li>
                        <a href="department.php">
                            <i class="material-icons">room</i>
	                        <p>Departments</p>
	                    </a>
                    </li>
                    <li>
                        <a href="courses.php">
                            <i class="material-icons">school</i>
	                        <p>Courses</p>
	                    </a>
                    </li>
                    <li>
	                    <a href="students.php">
	                        <i class="material-icons">supervisor_account</i>
	                        <p>Students</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="notices.php">
	                        <i class="material-icons">library_books</i>
	                        <p>Notices</p>
	                    </a>
	                </li>
                    <li>
	                    <a href="logout.php">
	                       <i class="material-icons">close</i>
	                        <p>LOGOUT</p>
	                    </a>
	                </li>
	               
	            </ul>
	    	</div>
	    </div>
        <div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">MAIL NOTICE</a>
					</div>
				</div>
			</nav>

	        <div class="content">
	            <div class="container-fluid well" style="background: #ffffff;">
                    <div class="row">
                       <h3 class="text-success text-center">LIST OF STUDENT RECIPIENTS WITH THEIR EMAIL ADDRESSES</h3>
                       <h3 class="text-center text-danger">Targeted Recipients : <?=$sent_to?></h3>
                    </div>
	                <div class="row">
	                   <div class="col-md-12">
                            <div >
                                <table id="courses_table" class="table table-condensed table-bordered table-hover">
                                    <thead>
                                        <th>Name</th>                                       
                                        <th>Email</th>
                                        <th>Department</th>
                                        <th>Course</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = $admin->getEmailRecipients($sent_to);
                                            while($row = $query->fetch_assoc()){
                                                echo"<tr>
                                                        <td>$row[name]</td>   
                                                        <td>$row[email]</td>                                                        
                                                        <td>$row[department]</td>
                                                        <td>$row[course]</td>
                                                     </tr>";
                                            }
                                         ?>
                                    </tbody>
                                    <tfoot>
                                         <tr> 
                                            <th>Name</th>                                       
                                            <th>Email</th>
                                            <th>Department</th>
                                            <th>Course</th>
                                        </tr>
                                    </tfoot>
                                </table>                               
                            </div>
                       </div>
	                </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="./notices.php" class="btn btn-primary"><span class="fa fa-backward"></span> Back</a>
                        </div>
                    </div>
	            </div>
	        </div>
            
            <footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul>
							<li>
								<a href="index.php">
									Home
								</a>
							</li>
							<li>
								<a href="about.html">
									About
								</a>
							</li>
						
						</ul>
					</nav>
					<p class="copyright pull-right">
						&copy; <script>document.write(new Date().getFullYear())</script>
					</p>
				</div>
			</footer>
	    </div>        
	</div><!-- End of wrapper div --> 

</body>
   
	<!--   Core JS Files   -->
	<script src="../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="../assets/js/data.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/js/material.min.js" type="text/javascript"></script>    
    <script src="../assets/js/dataTables.min.js" type="text/javascript"></script>
    <script src="../assets/js/dataTables.bootstrap.min.js" type="text/javascript"></script>


	<!-- Material Dashboard javascript methods -->
	<script src="../assets/js/bootstrap-notify.js"></script>

	<!-- custom methods,to include in  project! -->
	<script src="../assets/js/custom.js"></script>

    
     <!--   Custom Scripts    -->
     <script type="text/javascript">
           
            $(document).ready(function(){   
                   $('#courses_table').DataTable({
                        order:[[1,'asc']]
                   });			
            });			
     </script>

</html>
<?php
  
        if($mailed=="NO"){
            $db = new Database();
            $mailer= new Mailer($db);
            $isEmailSent = $mailer->sendEmail($ntc_no,$sent_to,$subject,$details,$details,$attachment);    
            if($isEmailSent){
                $notice_details = array(
                    "notice_no" => $ntc_no,
                    "mailed" =>"YES"
               );
               $db->returnQuery("UPDATE  `onbs`.`notice` SET  `mailed` =  'YES' WHERE  `notice`.`notice_no` =  '$_GET[ntc]';");
                echo "<script type='text/javascript'>showNotification('top','center','<b>Email sent to  Students Successfuly</b>, The email has been sent to all the targeted students ','success')</script>";
            
            }    
        }else{
             echo "<script type='text/javascript'>showNotification('top','center','Email ALREADY sent <b></b>, the email had been sent already','info')</script>";
        }          
    
 ?>
<?php  include_once "../lib/session_verify.php";
require_once "../lib/Database.php";
require_once "../lib/Admin.php";
require_once "../lib/Notice.php";
require_once "../lib/Student.php";
require_once "../lib/COD.php";

$admin = new Admin(new Database);
$ntc = new Notice(new Database);
$cod = new COD(new Database);
$std = new Student(new Database);

$notices_count = $admin->countRecords("notice");
$cod_count = $admin->countRecords("cod");
$students_count = $admin->countRecords("student");
$admin_count =$admin->countRecords("admin");

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>ADMINISTRATIVE REPORTS</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css" rel="stylesheet"/>

    <link href="../assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="../assets/css/material-icons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/js/reports-plugins/buttons.dataTables.min.css"/>  
    <link rel="stylesheet" href="../assets/css/jquery-ui.css"/>  
	<link rel="stylesheet" href="../assets/css/jquery-ui.theme.css"/>  
    
    
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
	                <li class="active">
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
						<a class="navbar-brand" href="#">ONBS Dashboard</a>
					</div>
					<div class="collapse navbar-collapse">
					
				</div>
			</nav>

			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="orange">
									<i class="material-icons">info_outline</i>
								</div>
								<div class="card-content">
									<p class="category">TOTAL NOTICES</p>
									<h3 class="title"><?php echo $notices_count['total_count']; ?></h3>
								</div>
								<div class="card-footer">
									 <div class="stats">
										<i class="material-icons">date_range</i> As on date <script>var date = new Date(); var current_date = date.getDate() +" of this month, the year "+ date.getFullYear();document.write(current_date)</script> 
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="green">
									<i class="material-icons">supervisor_account</i>
								</div>
								<div class="card-content">
									<p class="category">TOTAL NO. of STUDENTS</p>
									<h3 class="title"><?php echo $students_count['total_count']; ?></h3>
								</div>
								<div class="card-footer">
									 <div class="stats">
										<i class="material-icons">date_range</i> As on date <script>var date = new Date(); var current_date = date.getDate() +" of this month, the year "+ date.getFullYear();document.write(current_date)</script> 
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="red">
									<i class="material-icons">supervisor_account</i>
								</div>
								<div class="card-content">
									<p class="category">TOTAL No. of COD/HOD</p>
									<h3 class="title"><?php echo $cod_count['total_count']; ?></h3>
								</div>
								<div class="card-footer">
								    <div class="stats">
										<i class="material-icons">date_range</i> As on date <script>var date = new Date(); var current_date = date.getDate() +" of this month, the year "+ date.getFullYear();document.write(current_date)</script> 
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="blue">
									<i class="material-icons">account_circle</i>
								</div>
								<div class="card-content">
									<p class="category">REGISTERED ADMIN(S)</p>
									<h3 class="title"><?php echo $admin_count['total_count']; ?></h3>
								</div>
								<div class="card-footer">
								    <div class="stats">
										<i class="material-icons">date_range</i> As on date <script>var date = new Date(); var current_date = date.getDate() +" of this month, the year "+ date.getFullYear();document.write(current_date)</script> 
									</div>
								</div>
							</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="card card-nav-tabs">
								<div class="card-header" data-background-color="black">
									<div class="nav-tabs-navigation">
										<div class="nav-tabs-wrapper">
											<span class="nav-tabs-title">Task: </span>
											<ul class="nav nav-tabs" data-tabs="tabs">
												<li class="active">
													<a href="#delete" data-toggle="tab">
														<span class="fa fa-cog"></span> 
														Delete Actions
													<div class="ripple-container"></div></a>
												</li>
											
											</ul>
										</div>
									</div>
								</div>
								<div class="card-content">
									<div class="tab-content" >
										<div style="text-align: center;" class="tab-pane active" id="delete">
											<button data-toggle='modal'  data-target='#deleteModal'  class="btn btn-warning"><span class="fa fa-trash"></span> Discard Old Notices</button>
										  	<button type="button" onclick="deleteRecord('cod','null','null')" class="btn btn-warning"><span class="fa fa-trash"></span> Delete All COD/HOD</button>
                                            <button type="button" onclick="deleteRecord('std','null','null')" class="btn btn-warning"><span class="fa fa-trash"></span> Delete All Students</button>
										
                                        </div>										
									</div>
								</div>
							</div>
						</div>
						
					</div>
				
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="card card-nav-tabs">
								<div class="card-header" data-background-color="purple">
									<div class="nav-tabs-navigation">
										<div class="nav-tabs-wrapper">
											<span class="nav-tabs-title">REPORTS: </span>
											<ul class="nav nav-tabs" data-tabs="tabs">
												<li class="active">
													<a href="#notice" data-toggle="tab">
														<i class="material-icons">library_books</i>
														Notices
													<div class="ripple-container"></div></a>
												</li>
												<li class="">
													<a href="#cod" data-toggle="tab">
														<i class="material-icons">supervisor_account</i>
														COD
													<div class="ripple-container"></div></a>
												</li>
												<li class="">
													<a href="#student" data-toggle="tab">
														<i class="material-icons">supervisor_account</i>
														STUDENT
													<div class="ripple-container"></div></a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="card-content">
									<div class="tab-content">
										<div class="tab-pane active" id="notice">
											<?php echo $ntc->displayNoticeReport();?>
										</div>
										<div class="tab-pane" id="cod">
											<?php echo $cod->displayCODReport();?>
										</div>
										<div class="tab-pane" id="student">
											<?php echo $std->displayStudentReport();?>
										</div>
									</div>
								</div>
							</div>
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
	</div>
     <!-- Sart DelModal -->
    <div id="deleteModal" class="modal fade" data-width="760px" id="readerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
    					<i class="material-icons">clear</i>
    				</button>
    				<h4 class="modal-title">DELETE NOTICES?</h4>
    			</div>
    			<div class="modal-body" id="id_more_info">                    
                        <div class="row">
                        <div class="col-sm-12">
                        
                            <label>From Date (Begining)</label>
                            <input id="from_date" class="datepicker form-control" type="text"/>
                            <label>To Date (End)</label>
                            <input  id="to_date" class="datepicker form-control" type="text"/>                          
                        </div>                            
                        
                      </div>
                </div>     
            
    			<div class="modal-footer">        
      	             <button type="button" onclick="deleteRecord('note',$('#from_date').val(),$('#to_date').val())" class="btn btn-danger " data-dismiss="modal"><span class="fa fa-trash"></span> Delete</button>        
    				<button type="button" class="btn btn-simple " data-dismiss="modal">Close</button>
    			</div>
    		</div>
    	</div>
    </div>
    <!--  End DelModal -->	
</body>

	<!--   Core JS Files   -->
	<script src="../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>	
	<script src="../assets/js/material.min.js" type="text/javascript"></script>
    <script src="../assets/js/dataTables.min.js" type="text/javascript"></script>
    <script src="../assets/js/data.js" type="text/javascript"></script>
     <script src="../assets/js/date.js" type="text/javascript"></script>
    <script src="../assets/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/js/jquery-ui-datepicker.js" type="text/javascript"></script>
	<!--  Notifications Plugin    -->
	<script src="../assets/js/bootstrap-notify.js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="../assets/js/material-dashboard.js"></script>

	<!-- Material Dashboard Custom methods, and JQUERY report plugins to include it in your project! -->
	<script src="../assets/js/custom.js"></script>
    <script src="../assets/js/reports-plugins/dataTables.buttons.min.js"></script>
    <script src="../assets/js/reports-plugins/jszip.min.js"></script>
    <script src="../assets/js/reports-plugins/pdfmake.min.js"></script>
    <script src="../assets/js/reports-plugins/vfs_fonts.js"></script>
    <script src="../assets/js/reports-plugins/buttons.flash.min.js"></script>
    <script src="../assets/js/reports-plugins/buttons.html5.min.js"></script>
    <script src="../assets/js/reports-plugins/buttons.print.min.js"></script> 
    <!--Custom scripts -->    
    
 <!--   Custom Scripts    -->
     <script type="text/javascript">            
            $(document).ready(function(){   
                   $('#notice_table').DataTable({
                        dom: 'Bfrtip',
                         buttons: [
                             'copy', 'csv', 'excel', 'pdf', 'print'
                         ],
                         order:[[0,'desc']]
                   });	
                   $('#cod_table').DataTable({
                         dom: 'Bfrtip',
                         buttons: [
                             'copy', 'csv', 'excel', 'pdf', 'print'
                         ]
                   });
                   $('#student_table').DataTable({
                         dom: 'Bfrtip',
                         buttons: [
                             'copy', 'csv', 'excel', 'pdf', 'print'
                         ]
                   });
                   $('.datepicker').datepicker({
                        dateFormat:"yy-mm-dd"
                   });
                  		
            });	
   		                                 
           
                           
     </script>
     
</html>

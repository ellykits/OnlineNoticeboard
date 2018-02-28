<?php
    include_once "../lib/session_verify.php";
    require_once "../lib/Database.php";
    require_once "../lib/Student.php";
    require_once "../lib/Department.php";
   
    $dept = new Department(new Database());
    $query = $dept->loadDepartments();
    $student = new Student(new Database());
 

 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>STUDENT</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    
    
    <!--  Material Dashboard and Kit CSS   -->
    <link href="../assets/css/material-dashboard.css" rel="stylesheet"/>
    <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet" />
    

    <!--     Fonts and icons    
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'> -->
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
                    <li class="active">
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
						<a class="navbar-brand" href="#">STUDENT</a>
					</div>
				</div>
			</nav>

	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                   <div class="col-md-12">
                            <div class="well" style="background: #ffffff;">
                                <button onclick="setupEditorModal('new')" data-toggle='modal'  data-target='#editorModal'  class ='btn btn-primary'><i  class='fa fa-plus'></i> Add new student</button>
                                <hr class=""/>
                                <form method="POST" action="students.php">
                                     <?php echo $student->getStudentsDetails();?>
                                </form>
                               
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
	</div><!-- End of wrapper div --> 
	<!-- Sart EditorModal -->
    <div class="modal fade" id="editorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
        <div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    			     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
    					<i class="material-icons">clear</i>
    				</button>
                    <h4 class="modal-title">Editor Modal</h4>
    			</div>
    			<div class="modal-body" id="id_editor_modal_body">
    				<div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title" id="id_editor_modal_title">Edit Student</h4>									
	                            </div>
	                            <div class="card-content">
	                                <form id="editor_form" method="post" action="cod.php">
	                                    <div class="row">	                                        
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Student_no</label>
													<input id="id_student_no" name="student_no" type="text" class="form-control" >
												</div>
	                                        </div>
                                            <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Full Name</label>
													<input id="id_full_name" name="full_name" type="text" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Gender</label>
													<select id="id_gender" name="gender"class="form-control" >
                                                        <option selected="selected" value="">--select--</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
												</div>
	                                        </div>
	                                    </div>
	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Department</label>
													<select id="id_dept" name="dept" class="form-control" >
                                                       <?php 
                                                       while($record = $query->fetch_assoc()){
                                                            echo "<option value='$record[dept_name]'>$record[dept_name]</option>";
                                                       }
                                                        
                                                     ?>
                                                       
                                                    </select>
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Course</label>
													<select onfocus="populate_dropdown_element('#id_dept',this,'pop_courses')" id="id_course" name="course" class="form-control">
                                                        
                                                    </select>
												</div>
	                                        </div>
                                           
	                                    </div>
                                        <div class="row">
                                            <div class="col-md-6">
											 	   <label class="control-label">Responsibility</label>
													<select onchange="populatePositions()" id="id_responsibility" name="responsibility"class="form-control" >
                                                        <option selected="selected" value="">--select--</option>                                                       
                                                        <option value="Regular">Regular</option>  
                                                        <option value="Leader">Official</option>                                                     
                                                    </select>
	                                        </div>
	                                        <div class="col-md-6">
											
                                                	<label class="control-label">Position</label>
           	                                        <select onfocus="populatePositions()" id="id_position" name="position"class="form-control" >
                                                                                                               
                                                    </select>
											
	                                        </div>
                                        </div>
                                        <div class="row">
                                           
                                            <div class="col-md-7">
												<div class="form-group label-floating">
													<label class="control-label">Email</label>
													<input  id="id_email" name="email" type="email" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-5">
												<div class="form-group label-floating">
													<label class="control-label">Phone</label>
													<input id="id_phone" name="phone" type="text" class="form-control" >
												</div>
	                                        </div>
	                                    </div>
	                                    <div class="row">
                                            <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Physical Address</label>
													<input id="id_p_address" name="p_address" type="text" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Postal Code</label>
													<input id="id_p_code" name="p_code" type="text" class="form-control" >											       
                                            	</div>
	                                        </div>
	                                        <button id="btn_reset" class="btn" type="reset" hidden="hidden">Reset</button>
	                                    </div>
	                                </form>
	                            </div>
	                        </div>
    			</div>
    			<div class="modal-footer" id="id_editor_modal_footer">
    				<!--<button type='button' class='btn btn-info'><i class='fa fa-save'></i> Update Changes</button>
    				<button type='button' class='btn btn-danger btn-simple' data-dismiss='modal'>Close</button> -->
    			</div>
    		</div>
    	</div>
    
    </div>
    <!--  End EditorModal -->
    <!-- Sart DeleteModal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
    					<i class="material-icons">clear</i>
    				</button>
    				<h4 class="modal-title">Confirm Delete</h4>
    			</div>
    			<div class="modal-body" id="">
                    <form method="post" action="cod.php">                                     
        				<p>Are you sure you want to delete this Students's record?</p>
                    </form>                    
                </div>
    			<div class="modal-footer">
                	<button id="confirm_del_btn" type="submit" class="btn ">Yes</button>
    				<button type="button" class="btn btn-danger " data-dismiss="modal">No</button>
    			</div>
    		</div>
    	</div>
    </div>
    <!--  End DeleteModal -->			
</body>
   
	<!--   Core JS Files   -->
	<script src="../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="../assets/js/data.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/js/material.min.js" type="text/javascript"></script>    
    <script src="../assets/js/dataTables.min.js" type="text/javascript"></script>
    <script src="../assets/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
	
	<!--  Notifications Plugin    -->
	<script src="../assets/js/bootstrap-notify.js"></script>



	<!-- Material Dashboard javascript methods -->
	<script src="../assets/js/material-dashboard.js"></script>

	<!-- custom methods,to include in  project! -->
	<script src="../assets/js/custom.js"></script>

    
     <!--   Custom Scripts    -->
     <script type="text/javascript">
            function setupEditorModal(purpose){
                    if(purpose === 'new'){
		                clearModalFormFields();
                       $('#id_editor_modal_title').html("Add new record");
                        $('#id_editor_modal_footer').html("<button type='button' onclick=\"add_record('std')\" class='btn btn-primary'><i class='fa fa-save'></i> Save Record</button><button type='button' class='btn btn-danger btn-simple' data-dismiss='modal'>Close</button>");
                    }else{
                        $('#id_editor_modal_title').html("Edit record");
                        $('#id_editor_modal_footer').html("<button type='button' onclick=\"edit_record('std')\" class='btn btn-info'><i class='fa fa-save'></i> Update Changes</button><button type='button' class='btn btn-danger btn-simple' data-dismiss='modal'>Close</button>");
               
                      }            
            }
            function populatePositions(){
                  var selected = $("#id_responsibility").val(); 
                  if(selected =="Regular"){
                         $("#id_position").html("");
                         $("#id_position").append("<option value='Comrade'>Commoner</option>");                        
                         
                  }else if(selected =="Leader"){
                         $("#id_position").html("");                         
                         var positions = ["President(Students' Chairperson)","Secretary(General)", "Secretary(Finance)","Secretary(Academic)","Accommodation Official","Sports & Entertainment"];
                         for(var i=0; i<positions.length; i++){
                            
                            $("#id_position").append("<option>"+positions[i]+"</option>"); 
                         }   
                  }else{
                         $("#id_position").html("");
                         $("#id_position").append("<option value=''>--select responsibility first--</option>");
                  }
            }
           
              
           
            $(document).ready(function(){                 
                populatePositions();
                $('#student_table').DataTable();			
            });			
     </script>

</html>


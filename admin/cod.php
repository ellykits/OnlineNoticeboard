<?php
    include_once "../lib/session_verify.php";
    require_once "../lib/Database.php";
    require_once "../lib/COD.php";
    require_once "../lib/Department.php";
    $cod = new COD(new Database());
    $dept = new Department(new Database());
    $query = $dept->loadFaculties();
 
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>COD</title>

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
	               <li class="active">
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
						<a class="navbar-brand" href="#">COD</a>
					</div>
				</div>
			</nav>

	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                   <div class="col-md-12">
                            <div class="well" style="background: #ffffff;">
                                <button onclick="setupEditorModal('new')" data-toggle='modal'  data-target='#editorModal'  class ='btn btn-primary'><i  class='fa fa-plus'></i> Add new COD</button>
                                <hr class=""/>
                                <form method="POST" action="cod.php">
                                     <?php echo $cod->getCODDetails();?>
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
	                                <h4 class="title" id="id_editor_modal_title">Edit COD</h4>									
	                            </div>
	                            <div class="card-content">
	                                <form id="editor_form" method="post" action="cod.php">
                                        
	                                    <div class="row">	                                        
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Job_code</label>
													<input id="id_job_code" name="job_code" type="text" class="form-control" >
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
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
												</div>
	                                        </div>
	                                    </div>
	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Faculty</label>
													<select id="id_faculty" name="faculty"class="form-control" >                                                       
                                                     <?php 
                                                       while($record = $query->fetch_assoc()){
                                                            echo "<option value='$record[faculty]'>$record[faculty]</option>";
                                                       }
                                                        
                                                     ?>
                                                    </select>
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Department</label>
													<select onfocus="populate_dropdown_element('#id_faculty',this,'pop_depts')"   id="id_dept" name="dept" class="form-control">
                                                    
                                                    </select>
												</div>
	                                        </div>
                                           
	                                    </div>
                                        <div class="row">
                                            <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Job_title</label>
													<select  id="id_job_title" name="job_title"class="form-control" >                                                       
                                                        <option>Junior Tutor</option>   
                                                        <option>Assistant Lecturer</option> 
                                                        <option>Senior Lecturer</option>  
                                                        <option>Associate Professor</option>  
                                                        <option>Profession</option>                                                     
                                                    </select>
												</div>
	                                        </div>
	                                        
	                                        <div class="col-md-6">
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
													<input id="id_p_address" name="p_address" type="text" class="form-control" />
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Postal Code</label>
													<input id="id_p_code" name="p_code" type="text" class="form-control" />                                                    
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
        				<p>Are you sure you want to delete this COD's record?</p>
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
                    $('#id_editor_modal_footer').html("<button type='button' onclick=\"add_record('cod')\" class='btn btn-primary'><i class='fa fa-save'></i> Save Record</button><button type='button' class='btn btn-danger btn-simple' data-dismiss='modal'>Close</button>");
                }else{
                    $('#id_editor_modal_title').html("Edit record");
                    $('#id_editor_modal_footer').html("<button type='button' onclick=\"edit_record('cod')\" class='btn btn-info'><i class='fa fa-save'></i> Update Changes</button><button type='button' class='btn btn-danger btn-simple' data-dismiss='modal'>Close</button>");
               
                }              
            }
           
            $(document).ready(function(){               
                $('#cod_table').DataTable();			
            });			
     </script>

</html>


<?php
    include_once "../lib/session_verify.php";
    require_once "../lib/Database.php";
    require_once "../lib/Notice.php";
    $ntc = new Notice(new Database());
 

 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>POST NOTICE</title>

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
				<a href="../index.php" class="simple-text">
					Online Notice Board
				</a>
			</div>

            	<div class="sidebar-wrapper">
	            <ul class="nav">
	                <li >
	                    <a href="student_dashboard.php">
	                        <i class="material-icons">dashboard</i>
	                        <p>Dashboard</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="student_profile.php">
	                        <i class="material-icons">edit</i>
	                        <p>My Profile</p>
	                    </a>
	                </li>
	                <li  class="active">
	                    <a href="student_poster.php">
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
						<a class="navbar-brand" href="#">NOTICE</a>
					</div>
				</div>
			</nav>

	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                   <div class="col-md-12">
                            <div class="well" style="background: #ffffff;">
                                <button onclick="setupEditorModal('new')" data-toggle='modal'  data-target='#editorModal'  class ='btn btn-default'><i  class='fa fa-plus'></i> Add new notice</button>
                                <hr class=""/>
                                
                                <?php 
                                    $current_user =$_SESSION['current_user']." - ".$_SESSION['role'];
                                    
                                     echo $ntc->getNotices($current_user);
                                
                                ?>
                                
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
        <form id="editor_form" method="post" action="./student_poster.php" enctype="multipart/form-data">
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
	                                
                                        <div class="row">
                                             <?php 
                                                date_default_timezone_set("Africa/Nairobi");                                               
                                                $random_notice ="NTC";                                                
                                                $time = time();                                                
                                                $random_notice =$random_notice.$time;
                                            ?>
                                            <div class="col-md-6">                                                                                       
												<div class="form-group label-floating">
													<label class="control-label">Notice_no</label>
													<input id="id_notice_no" value="<?php echo $random_notice;?>" name="notice_no" type="text" class="form-control" >
												</div>
	                                        </div>
                                            <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Posted by</label>
													<input id="id_posted_by" value="<?php echo $current_user;?>" name="posted_by" type="text" class="form-control" >
												</div>
	                                        </div>                                        
	                                       
	                                    </div>	                                    
                                        <div class="row">
                                            <div class="col-md-12">
												<div class="form-group label-floating">
													<label class="control-label">Subject</label>
													<input id="id_subject" name="subject"class="form-control" />                                                    
												</div>
	                                        </div>                                        
	                                       
	                                    </div>
	                                    <div class="row">
                                            <div class="col-md-12">
												<div class="form-group label-floating">
													<label class="control-label">Details</label>
													<textarea id="id_details" name="details" class="form-control" ></textarea>
												</div>
	                                        </div>	                                      
                                        </div>
                                        <div class="row">                                           
                                             <div class="col-md-12">
												<div class="form-group label-floating">
													<label class="control-label">Select file to upload</label>
													<input id="id_uploaded_file" type="file" name="uploaded_file"  />                                                    
												</div>                                                
	                                        </div>  
                                            <button id="btn_reset" class="btn" type="reset" hidden="hidden">Reset</button>	                                                                             
	                                    </div>	                               
	                            </div>
	                        </div>
    			</div>
    			<div class="modal-footer" id="id_editor_modal_footer">
    				<!--<button type='button' class='btn btn-info'><i class='fa fa-save'></i> Update Changes</button>
    				<button type='button' class='btn btn-danger btn-simple' data-dismiss='modal'>Close</button> -->
    			</div>
    		</div>
    	</div>
        </form>
    </div>
    <!--  End EditorModal -->
    <!-- Sart DeleteModal -->
    <div class="modal fade" data-width="760px" id="readerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
    					<i class="material-icons">clear</i>
    				</button>
    				<h4 class="modal-title">READ NOTICE</h4>
    			</div>
    			<div class="modal-body" id="id_more_info">
                                 
                </div>
    			<div class="modal-footer">                
    				<button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
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
	<!--  Charts Plugin -->
	<script src="../assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="../assets/js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

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
                        $('#id_editor_modal_footer').html("<button type='submit' class='btn btn-primary'><i class='fa fa-save'></i> Post Notice</button><button type='button' class='btn btn-danger btn-simple' data-dismiss='modal'>Close</button>");
                    }else{
                        $('#id_editor_modal_title').html("Edit record");
                        $('#id_editor_modal_footer').html("<button type='button' onclick=\"edit_record('note')\" class='btn btn-info'><i class='fa fa-save'></i> Update Changes</button><button type='button' class='btn btn-danger btn-simple' data-dismiss='modal'>Close</button>");
               
                      }            
            }
            $(document).ready(function(){   
                   $('#notice_table').DataTable({
                        order:[[0,'desc']]
                   });				
            });			
     </script>

</html>

<?php

    if(isset($_POST['notice_no'])){        
        include_once "../lib/upload.php";        
        $posted_time =  time();
        $date=date("Y-m-d");    
        global $attachment;
        global $$file_uploaded_path;
        $ntc_details = array(
            'notice_no' => $_POST['notice_no'],
            'posted_by'=>$_POST['posted_by'],
            //'date_posted' => date("Y-m-d",strtotime($date)),
           //'time_posted'=>$posted_time,        
            'subject' => $_POST['subject'],       
            'details' =>$_POST['details'],
            'doc_name' =>$attachment,
            'file_location' => $file_uploaded_path,
            'sent_to'=>'All'
        );
           if($shouldSubmitData){
                $isNoticeAdded = $ntc->addNotice($ntc_details);
                if($isNoticeAdded === "1"){    
                        echo $message;
                        echo "<script>showNotification('top','center','Notice Upload  <b>Successful</b>, the notice has been successfully uploaded','success');
                              setTimeout(function(){
                               window.location='./student_poster.php';
                            },2000)
                            </script> ";
        				
                 }else{
                       echo "<script>showNotification('top','center','ERROR <b>Encountered</b>, system failed to save the record','danger');
                       showNotification('top','center','INFO <b></b>, you may have left out the required fields','info');</script>";
                    
                 }
            }else{
                 echo $message;
                  echo "<script>
                              setTimeout(function(){
                               window.location='./student_poster.php';
                            },3000)
                            </script> ";
            }
    
    }
?>
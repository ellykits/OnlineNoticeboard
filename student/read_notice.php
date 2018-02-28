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

	<title>READ_NOTICE</title>

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
	                <li>
	                    <a href="dashboard.php">
	                        <i class="material-icons">dashboard</i>
	                        <p>Dashboard</p>
	                    </a>
	                </li>
	                <li >
	                    <a href="regular_student.php">
	                        <i class="material-icons">edit</i>
	                        <p>My Profile</p>
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
						<a class="navbar-brand" href="#">NOTICE DASHBOARD</a>
					</div>
				</div>
			</nav>
            <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                   <div class="">
                            <div class="well" style="background-image:url('../assets/img/ntc2.jpg');">
                                <div style="background: rgba(0,0,0,0.3);;">
                                     <h3 style="color: white;" class="center-block">Descriptive Details of Notice</h3><hr/>
                                    <div class="row">
                                         <?php                             
                                        require_once "../lib/Database.php";
                                        require_once "../lib/Notice.php";
                                        if(isset($_GET['ntc_no'])){
                                            $ntc_no = $_GET['ntc_no'];
                                        }                                      
                                        $notice_details = $ntc->getNoticeRecord($ntc_no); 
                                                              
                                     ?>  
                                         <div class="card">                                     
                                            <div class="card-header" data-background-color="#fff"><h2 class="text-center text-capitalize"><?=$notice_details['subject']?></h2>  </div>
                                            <div class="card-content">
                                                <strong><em><h3>This Notice was posted by<span class="text-capitalize"> <?=$notice_details['posted_by']?></span></h3></em></strong>
                                                <strong><em><h4>Date &amp; Time: <span class="text-capitalize"> <?=$notice_details['time_posted']?></span></h4></em></strong>                                                
                                                <p><?=$notice_details['details']?></p>
                                                <?php
                                                    if($notice_details['doc_name']!=""){
                                                        $file_name = $notice_details['doc_name'];
                                                        $file_path = $notice_details['file_location'];
                                                    }else{
                                                        $file_name = "No Attachment";
                                                        $file_path = "#";
                                                    }
                                                ?>
                                                <strong><a href="<?=$file_path?>"><?=$file_name?></a></strong>
                                            </div>
                                            
                                         </div>  
                                                                   
                                    </div>
                                     <a class="btn btn-info" style="color: white;" href="./dashboard.php">BACK</a>
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
	</div><!-- End of wrapper div --> 
	
    <!-- Sart More info modal -->
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
    <!--  End MoreInfoModal -->			
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
            
            $(document).ready(function(){   
                   $('#notice_table').DataTable();			
            });			
     </script>

</html>

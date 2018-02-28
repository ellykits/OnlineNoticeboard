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

	<title>STUDENT_DASHBOARD</title>

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
	                <li class="active">
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
                                    <div class="row">
                                        <div class="col-sm-6">
                                             <div class="dropdown">
                                            	<a href="#" class="btn dropdown-toggle" data-toggle="dropdown">
                                                	Show Notices For
                                                	<b class="caret"></b>
                                            	</a>
                                            	<ul class="dropdown-menu">
                                                    <?php
                                                        $targets= $ntc->loadTargets();
                                                        while($row = $targets->fetch_assoc()){
                                                            echo "<li><a href='./dashboard.php?target=$row[sent_to]'>$row[sent_to]</a></li>";
                                                        }
                                                    
                                                    ?>
                                            		
                                            	</ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <a class="btn" href="#latest">Show Latest Notices</a>
                                        </div>
                                    </div>                               
                                   
                                    <div class="jumbotron" style="background: white;">
                                         <?php                             
                                            require_once "../lib/Database.php";
                                            if(!isset($_GET['target'])){
                                                $target = "All";
                                            }else{
                                                $target = $_GET['target'];
                                            }
                                            echo $ntc->showNoticeByTarget($target);                       
                                         ?>  
                                    </div>
                                    <h3 style="color: white;" class="text-center">SHOWING 10 LATEST NOTICES</h3><hr/>
                                    <div class="row" id="latest">
                                         <?php                             
                                        require_once "../lib/Database.php";
                                     
                                        $ntc = new Notice(new Database());
                                        $ntc->showNotices(10);                       
                                     ?>                                    
                                    </div>
                                     <a class="btn btn-info" style="color: white;" href="./notices.php">See all notices posted so far...</a>
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
                   $('#notice_table').DataTable({
                        order:[[0,'desc']]
                   });			
            });			
     </script>

</html>

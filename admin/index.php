<?php 
session_start();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>ONLINE NOTICEBOARD</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	
	<!-- CSS Files -->
    
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/material-kit.css" rel="stylesheet"/>   
    <link href="../assets/css/material-icons.min.css" rel="stylesheet" />   

</head>

<body class="signup-page">
	<nav class="navbar navbar-transparent navbar-absolute">
    	<div class="container">
        	<!-- Brand and toggle get grouped for better mobile display -->
        	<div class="navbar-header">
        		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
            		<span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
        		</button>
        		<a class="navbar-brand hd" href="../index.php"  >ONLINE NOTICEBOARD SYSTEM</a>

        	</div> 

        	<div class="collapse navbar-collapse" id="navigation-example">
        		<ul class="nav navbar-nav navbar-right">
         
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
        	</div>
    	</div>
    </nav>

    <div class="wrapper">
		<div class="header header-filter" style="background-image: url('../assets/img/ntc.jpg'); background-size: cover; background-position: top center;">
			<div class="container">               
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div data-color='green' class="card card-signup">
							<form class="form" method="POST" action="./index.php">
								<div class="header header-primary text-center">
									<h4>COD/ADMIN SIGN IN</h4>								
								</div>
								<p class="text-divider">Credentials required</p>
								<div class="content">

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">face</i>
										</span>
										<input required="" name="username" type="text" class="form-control" placeholder="Username...">
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input required="" name="password" type="password" placeholder="Password..." class="form-control" />
									</div>

									<!-- If you want to add a checkbox to this form, uncomment this code

									<div class="checkbox">
										<label>
											<input type="checkbox" name="optionsCheckboxes" checked>
											Subscribe to newsletter
										</label>
									</div> -->
								</div>
								<div class="footer text-center">
									<button class="btn btn-simple btn-primary btn-lg">Login</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>            
		</div><!-- End of header div -->
      
    </div><!-- End of wrapper div -->
    <!--   Core JS Files   -->
	<script src="../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/js/material.min.js"></script>
	<script src="../assets/js/material-kit.js" type="text/javascript"></script>
   <script src="../assets/js/bootstrap-notify.js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="../assets/js/material-dashboard.js"></script>

	<!-- custom methods,to include in  project! -->
	<script src="../assets/js/custom.js"></script>

    </body>
</html>
 <?php 
        require_once "../lib/Database.php";
        require_once "../lib/Admin.php";
        require_once "../lib/COD.php";
        
        if(isset($_POST['username'])&& isset($_POST['password'])){                                           
            $admin = new Admin(new Database);
            $cod = new COD(new Database);
            $isSuccess = $admin->loginAdmin($_POST['username'],$_POST['password']);
           
            if($isSuccess == "false"){
                $isCodLoginSuccess = $cod->loginCOD($_POST['username'],$_POST['password']);                
                 if($isCodLoginSuccess == "false"){
                    echo "<script type='text/javascript'>showNotification('top','center','User Login <b>Failed</b> Either the username or password is NOT correct','danger')</script>";
                 }  
            }
            
        }
         ob_flush();
        ?>


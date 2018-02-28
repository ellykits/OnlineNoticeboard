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
    
	<!--     Fonts and icons     
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
     <link href="assets/css/material-icons.min.css" rel="stylesheet" />   
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css" rel="stylesheet"/>   
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />

</head>

<body class="signup-page">
    <a href="index.php" ><h3 style="margin:0px 0px;text-align: center; color:white; background-color: #6F6963; padding: 20px;">ONLINE NOTICE BOARD SYSTEM</h3>
	</a>
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
        		
               <!--</a><a class="navbar-brand" style="text-align: center;" href="index.php" >ONLINE NOTICEBOARD SYSTEM</a>--!>
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
                        <li>
								<a href="admin/index.php">
									Staff
								</a>
						</li>
        		</ul>
        	</div>
    	</div>
    </nav>
    
    <div class="wrapper">
        
		<div class="header header-filter" style="background-image: url('assets/img/ntc2.jpg'); background-size: cover; background-position: top center;">
			<div class="container">               
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">
							<form id="login" class="form" method="POST" action="index.php">
								<div class="header header-primary text-center">
									<h4>STUDENTS SIGN IN</h4>								
								</div>
								<p class="text-divider">Credentials required</p>
								<div class="content">

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">face</i>
										</span>
										<input name="username" type="text" class="form-control" placeholder="Username...">
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<input name="email" type="email" class="form-control" placeholder="Email...">
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input name="password" required="" type="password" placeholder="Password..." class="form-control" />
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
        <div class="main main-raised" style="background-image: url('assets/img/ntc.jpg'); background-position: center;">
			<div class="container">
		    	<div class="section text-center section-landing">
	                <div class="row">
	                    <div class="col-md-8 col-md-offset-2">
	                        <h2 class="title">What is Online Noticeboard?</h2>
	                        <h5 class="">Online noticeboard is an online platform for students and staffs where they can get updated notices or information. Students and staff can log in to their accounts to view more information plus they can check thier emails for the latet updates</h5>
	                    </div>
	                </div>

					<div class="container">
                        <h3 class="title text-info" style="color: white;">Latest Notices</h3>
					   <div class="row">
                     
                         <?php                             
                            require_once "lib/Database.php";
                            require_once "lib/Notice.php";
                            $ntc = new Notice(new Database());
                            $ntc->displayNotices(6);                       
                        ?>
                       </div>                      
					</div>
                </div>
            </div>
        </div><!-- End of mid content div -->
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
    </div><!-- End of wrapper div -->

    	<!--   Core JS Files   -->
    	<script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
    	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    	<script src="assets/js/material.min.js"></script>
    	<script src="assets/js/material-kit.js" type="text/javascript"></script>
    	<!-- Material Dashboard javascript methods -->
    	<script src="assets/js/material-dashboard.js"></script>
        <script src="assets/js/bootstrap-notify.js" type="text/javascript"></script>
    	<!-- custom methods,to include in  project! -->
    	<script src="assets/js/custom.js"></script>

    </body>
</html>
<?php 
      
        require_once "lib/Student.php";
        
        if(isset($_POST['username'])&& isset($_POST['password'])&& isset($_POST['email'])){                                           
            $std = new Student(new Database);
            $std->loginStudent($_POST['username'],$_POST['email'],$_POST['password']);
        }
         ob_flush();
?>

<?php
    include_once "../lib/session_verify.php";
    require_once "../lib/Database.php";
    require_once "../lib/Admin.php";
    $admin = new Admin(new Database());
 

 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin_Profile</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard and Kit CSS    -->
    <link href="../assets/css/material-dashboard.css" rel="stylesheet"/>
    

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
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
	                <li class="active">
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
						<a class="navbar-brand" href="#">Profile</a>
					</div>
				</div>
			</nav>

	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-8">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Edit Profile</h4>
									<p class="category">Complete your profile</p>
	                            </div>
	                            <div class="card-content">
                                 <?php 
                                       $details = ($admin->getAdminDetails($_SESSION['user_id']));
                                 ?>
	                                <form method="post">
	                                    <div class="row">
	                                        
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Username</label>
													<input value="<?=$details['username']?>" name="username" type="text" class="form-control" >
												</div>
	                                        </div>
                                            <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Password</label>
													<input value="<?=$details['password']?>" name="password" type="password" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Email address</label>
													<input value="<?=$details['email']?>" name="email" type="email" class="form-control" >
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Full Name</label>
													<input value="<?=$details['name']?>" name="admin_name" type="text" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Phone No.</label>
													<input value="<?=$details['phone']?>" name="phone_no" type="text" class="form-control" >
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-12">
												<div class="form-group label-floating">
													<label class="control-label">Adress</label>
													<input value="<?=$details['address']?>" name="address" type="text" class="form-control" >
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">City</label>
													<input value="<?=$details['city']?>"name="city" type="text" class="form-control" >
												</div>
	                                        </div>
	                                        
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Postal Code</label>
													<input value="<?=$details['p_code']?>" name="p_code" type="text" class="form-control" >
												</div>
	                                        </div>
	                                    </div>


	                                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
	                                    <div class="clearfix"></div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
						<div class="col-md-4">
                           
    						<div class="card card-profile">    						
    							<div class="content">
    								<h6 class="category text-gray">Current Details</h6>
    								<h4 class="card-title"><?= $details['name']?></h4>(<?= $details['username']?>)
    								<p class="card-content">
                                        <span class="text-info">Email</span><br /> <?= $details['email']?>
   									</p>  
                                    <p class="card-content">
                                        <span class="text-info">Phone </span><br /> <?= $details['phone']?>
   									</p> 
                                     <p class="card-content">
                                        <span class="text-info">Physical Address: </span>
                                         <?= $details['p_code']?>-<?= $details['city']?><br />(<?= $details['address']?>)
   									</p>    							
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

</body>

	<!--   Core JS Files   -->
	<script src="../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/js/material.min.js" type="text/javascript"></script>
    
	<!--  Notifications Plugin    -->
	<script src="../assets/js/bootstrap-notify.js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="../assets/js/material-dashboard.js"></script>

	<!-- Material Dashboard custome methods,to include in  project! -->
	<script src="../assets/js/custom.js"></script>

</html>
<?php
 
 if(isset($_POST['username']) && isset($_POST['password']) && isset ($_POST['email'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone_no = $_POST['phone_no'];
    $email = $_POST['email'];
    $p_address = $_POST['address'];
    $p_code = $_POST['p_code'];    
    $city = $_POST['city'];    
    $name = $_POST['admin_name'];
  
   
   $admin_details = array(
    'username' => $username,
    'email' => $email,
    'password'=>$password,
    'name'=>$name,
    'address'=>$p_address,    
    'city'=>$city,
    'p_code'=>$p_code,
    'phone'=>$phone_no
   
    
    );
       
    $admin->editAdministrator($admin_details);       
}
?>

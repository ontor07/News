<?php 
include("../database/connection.php");
$db =new database();
session_name("admin");
session_start();
if(isset($_SESSION['email']))
{
	echo "<script>location = '../backend/'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="images/favicon.ico" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
<div class="auth-wrapper">
	<div class="auth-content text-center">
		<img src="assets/images/logo.png" alt="" class="img-fluid mb-4">
		<div class="card borderless">
			<div class="row align-items-center ">
				<div class="col-md-12">
					<div class="card-body">
						<h4 class="mb-3 f-w-400">Signin</h4>
						<hr>
						<?php 
						$email = isset($_POST['email'])?$_POST['email']:'';
						$password = isset($_POST['password'])?$_POST['password']:'';
				
						if(isset($_POST["login"]))
						{
							$email = mysqli_real_escape_string($db->link,$email);
							$password = mysqli_real_escape_string($db->link,md5($password));
					
							$sql = $db->link->query("SELECT * FROM `create_admin` WHERE `mail`='$email' AND `password`='$password'");
					
							if(mysqli_num_rows($sql) > 0)
							{
								$fetch = $sql->fetch_assoc();
						
								$_SESSION['admin_id'] = $fetch['id'];
								$_SESSION['username'] = $fetch['username'];
								$_SESSION['email'] = $fetch['mail'];
								$_SESSION['image'] = $fetch['image'];
								$_SESSION['phone'] = $fetch['phone'];
								$_SESSION['adress'] = $fetch['adress'];
								$_SESSION['type'] = $fetch['type'];
								$_SESSION['admin_type'] = $fetch['admin_type'];
						
								if($_SESSION['type'] == 1)
								{
									echo "<script>location = '../backend/'</script>";
								}
								else
								{
									echo "<div class='alert alert-danger'>You Are Not Active User</div>";
								}
							}
							else
							{
								echo "<div class='alert alert-danger'>These Credential Does Not Match to Our Record</div>";
							}
						}
						?>
						<form class="login100-form validate-form" method="post">
							<div  class="form-group mb-3" required>
								<input class="form-control" type="email" name="email" placeholder="Enter username">
							</div>

							<div class="form-group mb-4" required>
								<input class="form-control" type="password" name="password" placeholder="Enter password">
								<span class="focus-input100"></span>
							</div>

							<div class="container-login100-form-btn">
								<button class="btn btn-block btn-primary mb-4" type="submit" name="login">
									Login
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<script src="js/vendor-all.min.js"></script>
<script src="js/plugins/bootstrap.min.js"></script>

<script src="js/pcoded.min.js"></script>

</body>
</html>
<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to index page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 
// Include config file
require_once 'config/config.php';

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
$email = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, email, first_name, last_name, phone_number, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $email, $first_name, $last_name, $phone_number, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;      	
                            $_SESSION["email"] = $email;      	
                            $_SESSION["firstname"] = $first_name;      	
                            $_SESSION["lastname"] = $last_name;      	
                            $_SESSION["phonenumber"] = $phone_number;      	
                            
							// Get data
							$sql = "SELECT * FROM users WHERE username = 'test'";
							$result = $link->query($sql);

							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									$rank = $row["rank"];
									$created_at = $row["created_at"];
									
									if ($rank == "") {
										$rank = "user";
									}
									else {
										$_SESSION["rank"] = $rank; 
									}
									
									$date = str_replace('/', '-', $created_at);
									$_SESSION["created_at"] = date('d-m-Y', strtotime($date)); 
									
								}
							} else {
								// nothing | 0 results
							}
							
							    
							
                            // Redirect user to index page
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Caming Maasvallei | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Caming</b>Maasvallei</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

	
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<div class="form-group has-feedback <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
			<label>username</label>
			<input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
			<span class="help-block"><?php echo $username_err; ?></span>
		</div>    
		<div class="form-group has-feedback <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
			<label>Password</label>
			<input type="password" name="password" class="form-control">
			<span class="help-block"><?php echo $password_err; ?></span>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary btn-block btn-flat" value="Login">
		</div>
		<p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
	</form>
	
	<?php
	/*
	MOET WEG
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form-group has-feedback <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
        <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $username; ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"><?php echo $username_err; ?></span>
      </div>
      <div class="form-group has-feedback <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
        <input type="password" class="form-control" name="password"  placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"><?php echo $password_err; ?></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
	*/
	?>
    <!--
    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    -->
    <!-- /.social-auth-links -->

    <a href="/forgot.php">I forgot my password</a><br>
    <a href="/register.php" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>



<?php
/*
	session_start();
 
	if(isset($_POST['login'])){
		//connection
		$conn = new mysqli('localhost', 'root', '', 'manager');
 
		//get the user with the email
		$sql = "SELECT * FROM members WHERE email = '".$_POST['email']."'";
		$query = $conn->query($sql);
		if($query->num_rows > 0){
			$row = $query->fetch_assoc();
			//verify password
			if(password_verify($_POST['password'], $row['password'])){
				//action after a successful login
				//for now just message a successful login
				$_SESSION['success'] = 'Login successful';
			}
			else{
				$_SESSION['error'] = 'Password incorrect';
			}
		}
		else{
			$_SESSION['error'] = 'No account with that email';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up login form first';
	}
 
	header('location: index.php');
*/
?>
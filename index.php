<?php 
include("config.php");
include('userClass.php');
$userClass = new userClass();

$errorMsgReg='';
$errorMsgLogin='';
if (!empty($_POST['loginSubmit'])) 
{
$usernameEmail=$_POST['usernameEmail'];
$password=$_POST['password'];
 if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 )
   {
    $uid=$userClass->userLogin($usernameEmail,$password);
    if($uid)
    {
        $url=BASE_URL.'home.php';
        header("Location: $url");
    }
    else
    {
        $errorMsgLogin="Please check login details.";
    }
   }
   else
  {
  	$errorMsgLogin="Gimme your credentials!";
  }

}

if (!empty($_POST['signupSubmit'])) 
{

	$username=$_POST['usernameReg'];
	$email=$_POST['emailReg'];
	$password=$_POST['passwordReg'];
    $name=$_POST['nameReg'];
    if (empty($username)||empty($email)||empty($password)||empty($name))
    {
    	$errorMsgReg="Enter all the details!";
    }
    else
    {
		$username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
		$email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
		$password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);

		if($username_check && $email_check && $password_check && strlen(trim($name))>0) 
		{
		    $uid=$userClass->userRegistration($username,$password,$email,$name);
		    if($uid)
		    {
		    	$url=BASE_URL.'home.php';
		    	header("Location: $url");
		    }
		    else
		    {
		      $errorMsgReg="Username or Email already exits.";
		    }
	    
		}
	}
}
if(!empty($session_uid) || !empty($_SESSION['uid']))
{
	$url=BASE_URL.'home.php';
	header("Location: $url");
}
else
{ 

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to chatyapp</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two|Tangerine|Rock+Salt" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" href="assets/icon.png" type="image/x-icon">
	<link rel="icon" href="assets/icon.png" type="image/x-icon">
</head>
<body>
	<div class="header">
		<h1>Let's Talk!!</h1>
	</div>

	<div class="row">
		<div class="col-1"></div>
		<div class="col-4 card left">
			<h1>Login</h1>
			<form method="post" action="" name="login">
				<input type="text" name="usernameEmail" placeholder="Username or Email" class="email" autocomplete="off">
				<input type="password" name="password" placeholder="Password" class="password">
				<div class="errorMsg"><?php echo $errorMsgLogin; ?></div>
				<input type="submit" class="button" name="loginSubmit" value="Login">
			</form>
		</div>
		<div class="col-2"> </div>
		<div class="col-4 card right">
			<h1>Registration</h1>
			<form method="post" action="" name="signup">
				<input type="text" name="nameReg" autocomplete="off" placeholder="Name" />
				<input type="text" name="emailReg" autocomplete="off" placeholder="Email" />
				<input type="text" name="usernameReg" autocomplete="off" placeholder="Username" />
				<input type="password" name="passwordReg" autocomplete="off" placeholder="Password" />
				<div class="errorMsg"><?php echo $errorMsgReg; ?></div>
				<input type="submit" class="button" name="signupSubmit" value="Signup">
			</form>
		</div>
		<div class="col-1"></div>
	</div>
	<footer class="card footer home">
		Created by: Rishi K. Rajpoot
	</footer>
</body>
</html>

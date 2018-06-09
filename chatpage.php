<?php
//session_start();
include('config.php');
include('session.php');
$userDetails=$userClass->userDetails($session_uid);
//$_SESSION['user'] = (isset($_GET['user']) === true) ? (int)$_GET['user'] : 0;
$_SESSION['fromid']=$session_uid;
$id=$_GET['id'];

$_SESSION['toid']=$id;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to TalkBack</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light|Tangerine|Rock+Salt" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" href="assets/icon.png" type="image/x-icon">
	<link rel="icon" href="assets/icon.png" type="image/x-icon">
</head>
<body>
	<div class="header">
		<h1>Let's Talk!!</h1>
	</div>
	<div class="header">
		<h3>Welcome &nbsp;&nbsp;<?php echo $userDetails->name; ?></h3>
	</div>
	<div class="row">
		<div class="col-1"></div>
		<div class="col-6 chat card">
			<div class="messages"></div>
		</div>
		<div class="col-1"></div>
		<div class="col-3 card">
			<textarea class="entry" placeholder="Press ENTER to send or SHIFT+ENTER for newline"></textarea>
		</div>
		<div class="col-1"></div>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="chat.js"></script>
</body>
</html>
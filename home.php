 <?php
include('config.php');
include('session.php');
$userClass = new userClass();
$userDetails=$userClass->userDetails($session_uid);
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
	<div class="col-10 card users">
	<div class="header">Talk to:</div>
		<?php
		$data=$userClass->alluser();
		foreach ($data as $row) 
		{
			if($row['username']!=$userDetails->username)
				echo '<div class="row"><div class="col-1"></div>
					<div class="col-10 card userlist">
						<a href="chatpage.php?id='.$row['uid'].'">'.$row['username'].'</a>
					</div>
					<div class="col-1"></div></div>';
		}
		?>
	</div>
	<div class="col-1"></div>
	</div>


<h4><a href="<?php echo BASE_URL; ?>logout.php">Logout</a></h4>
</body>
</html>

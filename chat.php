 <?php

require 'init.php';
@include("config.php");
include('userClass.php');
$userClass = new userClass();

$userDetails=$userClass->userDetails($_SESSION['fromid']);
if(isset($_POST['method'])===true && empty($_POST['method'])===false)
{
	$chat=new Chat();
	$method=trim($_POST['method']);
	if($method==='fetch')
	{
		$messages=$chat->fetchMessages($_SESSION['fromid'],$_SESSION['toid']);
		if(empty($messages)===true)
		{
			echo 'No chat yet!';
		}
		else
		{
			foreach ($messages as $message) 
			{
				if($userDetails->username==$message['username'])
				{
					echo '<div class="message left">
						  <b>'.$message['username'].'</b>
						<p>'.nl2br($message['msg']).'</p>
						
					</div>';
				}
				else
				{
					echo '<div class="message right">
						  <b>'.$message['username'].'</b>
						<p>'.nl2br($message['msg']).'</p>
						
					</div>';
				}
				
			}
		}
	}
	else if($method==='throw' && $_POST['message'])
	{
		$message=trim($_POST['message']);
		if(empty($message)===false)
			$chat->throwMessage($_SESSION['fromid'],$_SESSION['toid'],$message);
	}
}
?>
<?php  
	mb_internal_encoding("UTF-8"); //  mb_strlen  работает с двухбайтовыми. 
	session_start();
	require_once ("model.php");
	require_once ("validate.php");
	require_once ("mess_action.php");

	$dbConnect=openDbConnection();
	$username=$_POST['name'];
	$msg=$_POST['text']; 

	$Validator= new Validator();

		if ($Validator->validateMsg($msg)) {
			$_SESSION['msg']=$msg;
		}
		else $Validator->errName("Неправильно заполнено поле Text Message");

		if ($Validator->validateUsername($username) ) {
			$_SESSION['username']=$username;
		}
		else $Validator->errText("Неправильно заполнено поле Name");


		if ($Validator->validateUsername($username) and $Validator->validateMsg($msg)) {

			$username = escape($dbConnect,$username);
			$msg = escape($dbConnect,$msg);
			$date = date("h:i:s D F Y");

			$QueryAdd="INSERT INTO message (name,date,text) VALUES('$username','$date','$msg')";

			mysqli_query ($dbConnect,$QueryAdd);

		//	header('Content-type: application/json')
			$username = stripslashes($username);
			$username = htmlspecialchars($username, ENT_QUOTES);
			$msg = stripslashes($msg);
			$msg = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $msg);
			$arrNameText=array(
				"username"=>$username,
				"msg"=>$msg,
			);
			echo json_encode($arrNameText);

			unset($_SESSION['msg']);
			unset($_SESSION['username']);
		}
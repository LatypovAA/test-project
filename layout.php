<?php  
	mb_internal_encoding("UTF-8");
	session_start();
	$ValidationFailed=false;
	if (isset($_SESSION['validName'])) {
		$ValidationFailedName=$_SESSION['validName'];
		unset($_SESSION['validName']);	
	}
	if (isset($_SESSION['validText'])) {
		$ValidationFailedText=$_SESSION['validText'];
		unset($_SESSION['validText']);	
	}
	if (isset($_SESSION['username'])){
		$username=$_SESSION['username'];
		unset($_SESSION['username']);
	}
	if (isset($_SESSION['msg'])){
		$msg=$_SESSION['msg'];
		unset($_SESSION['msg']);
	}
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">	
	<meta charset="UTF-8">
	<title><?php echo $title; ?></title>
</head>
<body>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
   	 <script src="js/bootstrap.min.js"></script>
   	 <script src="js/tinymce/tinymce.min.js"></script>
   	 <script src="js/jsValidation.js"></script>
   	 <script src="js/delMess.js"></script>
   	 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>


	<div class="container">

		<form class="span12 offset1 content_for_margin_bottom" method="post"  id="commentBlock">
				<?php echo $content;?>
		</form>


		<div class="span8 alert alert-error alertAlign errDisplay" id="nameErr">enter the correct name</div>
		<div class="span8 alert alert-error alertAlign errDisplay" id="textErr">enter the correct message</div>

		<form class="span11 formalign " method="post" id="feedback">
			<input  type="text" class="input_name_magin_bottom" name="name" id="name" placeholder="Enter your name"<?php if (isset($username)) : ?> value="<?php  echo htmlspecialchars($username)?>"> <?php else : ?> > <?php endif; ?>
			<textarea name="text" id="text"><?php if (isset($msg)) echo htmlspecialchars($msg) ?></textarea>
			<button  type="submit" class="btn" name="action" value="add" id="send">submit</button>
			<button  type="submit" class="btn pull-right" name="actionDel" value="delete" id="delAllMess">delete ALL !!!</button>
		</form>

	</div>

	  <button style="display:none" value="<?php echo date("h:i:s D F Y"); ?>" id="date">dateForJs</button>
	
</body>
</html>
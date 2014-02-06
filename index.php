
<?php  
	require_once ("model.php");
	require_once ("controllers.php");
	$uri = $_SERVER['REQUEST_URI'];

	if ("/bootstrap/index.php" == $uri) {
		show_action();
	}
	else {
		header ("Status: 404 Not Found");
		echo "<html><body><h1>Page not found</h1></body></html>";
	}



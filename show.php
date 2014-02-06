<?php
	require_once ("model.php");

	$posts = getAllPosts();

	require_once ("templates/list.php");
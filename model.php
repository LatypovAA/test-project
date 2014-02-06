<?php
	function openDbConnection() {
		$host="localhost";
		$dbName="guests";
		$user="root";
		$password="";
		$link=mysqli_connect($host,$user,$password,$dbName);
		return $link;
	}

	function closeDbConnection($link) {
		mysqli_close($link);
	}

	function getAllPosts () {
		$link = openDbConnection();
		$query = "SELECT * FROM message ORDER BY date DESC";

		$result = mysqli_query($link,$query);
		$posts = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$posts[] = $row;  
		}

		closeDbConnection ($link);

		return $posts;
	}

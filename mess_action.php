<?php

	class Mess {

		public function checkDelCurMes($action2){
			if ($action2="delCur") {
				return true;
			}
			return false;
		}
		public function checkDelAllMess($actionDel){
			if ($actionDel="delete") {
				return true;
			}
			return false;
		}

		public function delAllMess() {
			$host="localhost";
			$name="guests";
			$user="root";
			$password="";
			$link=mysqli_connect($host,$user,$password,$name);
			$QueryDelAll="DELETE FROM message WHERE id > 0 ";
			mysqli_query ($link,$QueryDelAll);
		}
		public function delCurMess() {
			$id=$_POST['id'];
			$host="localhost";
			$name="guests";
			$user="root";
			$password="";
			$link=mysqli_connect($host,$user,$password,$name);
			$QueryDelMes="DELETE FROM message WHERE id= '$id' ";
			mysqli_query ($link,$QueryDelMes);
		}
	}
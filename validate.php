<?php
	class Validator	{
		

		public function errName ($errName) {

			$_SESSION['validName']=$errName;
		}
		public function errText ($errText) {

			$_SESSION['validText']=$errText;
		}

		public function validateUsername($username){

			if ((mb_strlen($username)>=3) and (mb_strlen($username)<=10)) {
				return true;
			}

			return false;
		}

		public function validateMsg($msg){

			if (!empty($msg) && (strlen($msg)<400)) {
				return true;
			}
			return false;
		}		
		
	}
	
	function escape ($link,$v) {
		return mysqli_real_escape_string($link,$v);
	}

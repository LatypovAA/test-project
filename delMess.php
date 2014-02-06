<?php
require_once ("mess_action.php");

$delMess=$_POST['delMess'];

$Mess= new Mess();

if ($delMess="delAllMess") {
	$Mess->delAllMess();
}
if  ($delMess="delCurMess"){
	$Mess->delCurMess();

}
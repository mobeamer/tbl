<?php

////////////////////////////////////////////////////////////////////////////////
//
// The following handles logouts
//
//		Inputs:
//			(POST required)
//			action
//			username
//			password
//
////////////////////////////////////////////////////////////////////////////////
$rootPath = "../";
$excludeSecurityCheck=true;
include_once $rootPath . "shared/global-includes.php";
header('Content-type: application/json');
$out = new DataPacket();


if($_GET["action"] == "logout" || $_POST["action"] == "logout")
{
	$_SESSION["userID"] = "";
	setCookie("recallID","");

	if($defaultPage != "")
	{
		header("Location:$defaultPage");
	}
	else
	{
		header("Location:" . $_SERVER['HTTP_REFERER'] . "?loginErrMsg=You have been logged out.");
	}
}


$username = $_POST["username"];
$password = $_POST["password"];

if($_POST["action"] == "login")
{
	$_SESSION["userID"] = "";
	$username = $_POST["username"];
	$password = $_POST["password"];

	//Create the sql to select the user
	$sql = "Select userID from tbl.tbl_user ";
	$sql.= " where userName='" . clean($conn,$username) . "' ";
	$sql.= " and userPass='" . clean($conn,md5($password)) . "'";

	$userInfo = executeQuery($conn,$sql);

	//check to make sure we got a row of data
	if($row = mysqli_fetch_row($userInfo))
	{
		//We got a row of data so we can now authenticate the user
		$temp = $row[0];
		$_SESSION[$_SESSION["userVarName"]] = $temp;
    
		$userID = $temp;

		if($_POST["rememberMe"] == "Y")
		{
			setcookie("recallID", "$userID", time()+60*60*24*30);
		}

		echo $out->generateOutput();
		
		exit();
	}
	else
	{

		$out->logError("Invalid Login");
		
		echo $out->generateOutput();

	}

}




?>
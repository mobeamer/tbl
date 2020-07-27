<?php


////////////////////////////////////////////////////////////////////////////////
//
// The following handles registration
//		Inputs:
//			(POST required)
//			action
//			username
//			password
//			email
//			postUrl
//
////////////////////////////////////////////////////////////////////////////////
$rootPath = "../";
$excludeSecurityCheck=true;
include_once $rootPath . "shared/global-includes.php";
header('Content-type: application/json');
$out = new DataPacket();

$username = $_POST["username"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];
$email = $_POST["email"];
$postUrl = $_GET["postUrl"];
if($postUrl == "") $postUrl = $_POST["postUrl"];



if($_POST["action"] == "register")
{
	$_SESSION["userID"] = "";
	$username = $_POST["username"];
	$password = $_POST["password"];
	$confirmPassword = $_POST["confirmPassword"];
	$email = $_POST["email"];


	if($username == "" || $password == "" || $confirmPassword=="" || $email == "")
		$out->logError("Please select a username, email and password");

	if($password != $confirmPassword)
		$out->logError("Password does not match.");

	if($username)
	{
		//select user from table
		$sql = "Select userID  from tbl.tbl_user where username='" . clean($conn,$username) . "'";

		$q = executeQuery($conn,$sql);

		//if we find any names then return an error
		if(mysqli_num_rows($q) > 0)
			$out->logError("That name is taken.");
	}

	if($email)
	{
		//select user from table
		$sql = "Select userID  from tbl.tbl_user where email='" . clean($conn,$email) . "'";

		$q = executeQuery($conn,$sql);

		//if we find any names then return an error
		if(mysqli_num_rows($q) > 0)
			$out->logError("That email is taken.");
	}



	if(!$out->hasError())
	{
		$sql = "insert into tbl.tbl_user (userName, userPass, email, lastLogin)
				values ('" . clean($conn,$username) . "'
				,'" . clean($conn,md5($password)) . "'
				,'" . clean($conn,$email) . "'
				,now()
				)";
		executeQuery($conn,$sql);


		$sql = "Select userID from tbl.tbl_user ";
		$sql.= " where userName='" . clean($conn,$username) . "' ";
		$sql.= " and userPass='" . clean($conn,md5($password)) . "'";

		$userInfo = executeQuery($conn,$sql);

		if($row = mysqli_fetch_row($userInfo))
		{
			//We got a row of data so we can now authenticate the user
			$temp = $row[0];
			$_SESSION[$_SESSION["userVarName"]] = $temp;
			$userID = $temp;
			echo $out->generateOutput();
			exit();
		}

		echo $out->generateOutput();
		
		exit();
	}
	else
	{

		echo $out->generateOutput();

	}



}
?>
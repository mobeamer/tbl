<?php
session_start();

$_SESSION["prefix"] = "mb";
$defaultAfterLogin = "dashboard.php";


$_SESSION["userVarName"] = "staffingAppUserID";

$userID = $_SESSION[$_SESSION["userVarName"]];
  
$conn = @mysqli_connect($db_host, $db_user, $db_passwd);

if(@mysqli_connect_errno($con))
{
  $valid = "N";
  $errMsg = "There was an issue connecting with the database server";
  die($errMsg);
}
else
{
  mysqli_select_db($conn, $database);

  if(@mysqli_connect_errno($con))
  {
    $valid = "N";
    $errMsg = "There was an issue connecting with the database";
    die($errMsg);
  }
}




function executeQuery($con, $sql)
{
	$q = mysqli_query($con,switchTables($sql)) or die($sql . "<P>" . mysqli_error($con));

	return $q;
}


function getKey($con, $sql)
{
	$q = mysqli_query($con,switchTables($sql)) or die($sql . "<P>" . mysqli_error($con));

	$row= mysqli_fetch_row($q);

	return $row[0];
}


function getDataObject($con, $sql)
{
	$q = mysqli_query($con, switchTables($sql)) or die($sql . "<P>" . mysqli_error($con));

	$row= mysqli_fetch_object($q);

	return $row;
}

function switchTables($sql)
{
	return str_replace("mb_", $_SESSION["prefix"]  . "_", $sql);
}

function varClean($value)
{
	$value = trim($value);

	$value = strip_tags($value);

	//$value = mysql_real_escape_string($value);

	return $value;
}


function dbClean($con, $value)
{
	$value = varClean($value);

	$value = mysqli_real_escape_string($con, $value);

	return $value;
}

function clean($conn, $value){return dbClean($conn, $value);}


function cleanBreaks($value)
{
	$value = str_replace("\r\n","",$value);
	$value = str_replace("\n","",$value);
	return $value;
}

function getVar($varName)
{
  $val = $_GET[$varName];
  if($val =="") $val = $_POST[$varName];
  
  return $val;
  
}


?>
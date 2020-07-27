<?php


////////////////////////////////////////////////////////////////////////////////
//
// The following handles registration
//		Inputs:
//			(POST required)
//			username
//			password
//			email
//			postUrl
//
////////////////////////////////////////////////////////////////////////////////
$rootPath = "../";
$excludeSecurityCheck=true;
include_once $rootPath . "shared/global-includes.php";

$out = new DataPacket();

$out->log("Connected to database...");

echo $out->generateOutput();
?>
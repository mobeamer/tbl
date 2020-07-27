<?php


////////////////////////////////////////////////////////////////////////////////
//
// The following handles registration
//		Inputs:
//			(POST required)
//			action = (save/add/new)
//			companyName
//			companyUrl
//			companyDesc
//
////////////////////////////////////////////////////////////////////////////////
$rootPath = "../";
$excludeSecurityCheck=true;
include_once $rootPath . "shared/global-includes.php";
header('Content-type: application/json');
$out = new DataPacket();

$companyName = $_POST["companyName"];
$companyDesc = $_POST["companyDesc"];
$companyUrl = $_POST["companyUrl"];



if($_POST["action"] == "new")
{
	

	if(!$out->hasError())
	{
		$sql = "insert into tbl.tbl_biz (bizName, bizDesc, bizUrl,isActiveRecord, insertedByUserID,insertedDateTime)
				values ('" . clean($conn,$companyName) . "'
				,'" . clean($conn,$companyDesc) . "'
				,'" . clean($conn,$companyUrl) . "'
                ,1
                ,-1
                ,now()
				)";
		executeQuery($conn,$sql);

        $out->addGrowl("Company Saved");

		echo $out->generateOutput();
		
		exit();
	}
	else
	{

		echo $out->generateOutput();

	}



}
?>
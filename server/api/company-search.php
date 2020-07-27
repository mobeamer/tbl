<?php


////////////////////////////////////////////////////////////////////////////////
//
// The following handles registration
//		Inputs:
//			(POST/GET)
//
////////////////////////////////////////////////////////////////////////////////
$rootPath = "../";
$excludeSecurityCheck=true;
include_once $rootPath . "shared/global-includes.php";
header('Content-type: application/json');
$out = new DataPacket();

$sql = "select bizID, bizName, bizUrl, bizDesc from tbl.tbl_biz order by bizID desc";

$bizQ = executeQuery($conn, $sql);

$out->data->biz = [];

while($biz = $bizQ->fetch_object())
{
    $out->data->biz[] = $biz;
}

echo $out->generateOutput();

?>
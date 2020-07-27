<?php

function newLogSession($conn, $userID)
{
  if($userID > 0)
  {
    $sql = "insert into tbl.tbl_log_session (userID) values ('$userID')";
    executeQuery($conn, $sql);

    $logSessionID = getKey($conn, "select max(logSessionID) from tbl_log_session");
  }
  else
  {
    $logSessionID = -1;
  }

  
  return $logSessionID;
}

function logIt($conn, $logSessionID, $debugLevel, $userID, $msg)
{
  $sql = "insert into tbl.tbl_log (logSessionID, debugLevel, userID, msg) values ('$logSessionID','$debugLevel','$userID','$msg')";
  executeQuery($conn, $sql);
}


function getLogs($conn, $logSessionID)
{
  $sql = "select logID, debugLevel, msg from tbl.tbl_log where logSessionID = $logSessionID";
  $q = executeQuery($conn, $sql);
  $out = [];
  while($data = $q->fetch_object())
  {
      array_push($out, $data->msg);
  }

  return $out;
}
?>
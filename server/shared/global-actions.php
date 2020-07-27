<?php

if($userID > 0)
{
  $sql = getQuery("user-obj", "$userID");
  $user = getDataObject($conn, $sql);
  //print_r($user);  
}

$logSessionID = newLogSession($conn, $userID);

?>
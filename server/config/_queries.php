<?php


function getQuery($qryKey, $option)
{
    $qry["user-obj"] ="select userID, username, email, employeeID, securityLevel from tbl.tbl_user where userID = |ID|";

    $sql = $qry[$qryKey];
    $sql = str_ireplace("|ID|", $option, $sql);
    $sql = str_ireplace("|OPTION|", $option, $sql);

    return $sql;
}

  
  
?>
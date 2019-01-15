<?php
function koneksi_db(){
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "fabelio";

    $link = @mysql_connect($host,$user,$pass);

    mysql_select_db($db,$link);

    if (!$link) {
      echo "error : ".mysql_error();
    }

    return $link;
}

error_reporting(E_ALL ^ E_DEPRECATED);
?>

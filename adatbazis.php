<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$dbconn = @mysqli_connect("localhost", "root", "", "tartalomkezelo");
@mysqli_query($dbconn, "SET NAMES utf8");

?>
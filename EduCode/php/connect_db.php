<?php 
require_once "config.php"; // Not included in GitHub Repo for safety, this is the source for $servername, $username etc

$db = new mysqli($servername, $username, $password, $dbname);

if($db->connect_error){
    header("location: /Edu-Code/EduCode/pages/errors/database_error.php");
}

?>
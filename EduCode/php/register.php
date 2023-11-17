<?php

include "connect_db.php";

session_start();

//connect to db
$db = connect("u2259541");

// define insert query
$sql = $db->prepare("INSERT INTO ac_users (username, email, userPassword) VALUES (?, ?, ?);");
$sql->bind_param("sss",$_POST["username"], $_POST["email"], $_POST["password"],);
$sql->execute();

// define query to auto log in new user
$sql = $db->prepare("SELECT userID FROM ac_users WHERE email = ?;");
$sql->bind_param("s", $_POST["email"]);
$sql->execute();
$result = $sql->get_result();

if ($result === FALSE){
    die("<html><body><h1> Error: Query unsuccessful </h1> <p>Arc Code are sorry for the inconvinience, please try again later  </p></body></html>");
    return 0;

}

$row = $result->fetch_assoc();

// log in
$_SESSION["id"] = $row["userID"];
print_r($_SESSION["id"]);

header("Location: ../index.php", 301);
exit();

?>
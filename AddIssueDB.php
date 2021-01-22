<?php

require_once "Connect.php";
$conn = getConnection();

//PArameters
$user = 1;          //hardcoded for now
$title = $_POST["title"];
$description = $_POST["description"];
$start = $_POST["start"];
$end = $_POST["end"];

if($stmt = $conn->prepare("INSERT INTO Issues (user_id, title_issue, description, start_date, end_date) VALUES (?,?,?,?,?)")){
    $stmt->bind_param("sssss", $user, $title, $description, $start, $end);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
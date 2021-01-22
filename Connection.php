<?php

//return new \PDO('mysql:host=localhost;dbname=IssueTracker', 'root', '', $pdoOptions);
		
function getConnection(){
	$connection = mysqli_connect("localhost","root","","IssueTracker",3306);
	return $connection;
}
	

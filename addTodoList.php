<?php

$exerciseID = $_GET['id'];

try {
	$con = new PDO("mysql:host=localhost;dbname=cs174", "cs174", "group76");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO todolist(exercise_id)
	VALUES (".$exerciseID.")";
    // use exec() because no results are returned
	$con->exec($sql);

	$message1 = "New exercise added successfully to your todo list";
	echo "<script type='text/javascript'>alert('$message1');</script>";
}
catch(PDOException $e)
{
	$message2 = "already in your todo list";
	echo "<script type='text/javascript'>alert('$message2');</script>";
}

?>
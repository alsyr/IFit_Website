<?php

$exerciseID= (int)$_GET['delete'];

try {
	$con = new PDO("mysql:host=localhost;dbname=cs174", "cs174", "group76");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "DELETE FROM todolist
	WHERE exercise_id = ".$exerciseID;
    // use exec() because no results are returned
	$con->exec($sql);

	$message1 = "exercise successfully deleted from your todo list";
	echo "<script type='text/javascript'>alert('$message1');</script>";
}
catch(PDOException $e)
{
	print 'ERROR: '.$ex->getMessage();
}

?>
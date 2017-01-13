<?php

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$age = $_POST['age'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$address = $_POST['email'];

$bmi = $weight/(($height*$height)/10000);

try {
	$con = new PDO("mysql:host=localhost;dbname=cs174", "cs174", "group76");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//$sql = "INSERT INTO user(first,last,age,weight,height)
	//VALUES (".$firstName\".",".\"$lastName\".",".$age.",".$weight.",".$height.")";
	$sql = "INSERT INTO user(first,last,age,weight,height)" .
	           "VALUES('$firstName', '$lastName', $age, $weight, $height);";
	$con->exec($sql);

	if($bmi>19 && $bmi<25){
		$sql2 = "INSERT INTO user_status(weight_status)" .
	           "VALUES('Normal');";
	}
	else if($bmi>30 && $bmi<39){
		$sql2 = "INSERT INTO user_status(weight_status)" .
	           "VALUES('Obesity');";
	}
	else if($bmi>26 && $bmi<29){
		$sql2 = "INSERT INTO user_status(weight_status)" .
	           "VALUES('Overweight');";
	}
	else if($bmi>40 && $bmi<99){
		$sql2 = "INSERT INTO user_status(weight_status)" .
	           "VALUES('Severe Obesity');";
	}
	else{
		$sql2 = "INSERT INTO user_status(weight_status)" .
	           "VALUES('Underweight');";
	}

	$con->exec($sql2);
}
catch(PDOException $e)
{
	print 'ERROR: '.$e->getMessage();
}

?>
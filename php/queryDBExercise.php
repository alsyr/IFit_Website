<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Query to exercises that a particular member should perform</title>
</head>

<body>
	<?php
	class UserStatus
	{
		private $id;
		private $first;
		private $last;
		private $weight_status;
		private $name;
		private $repetition;

		public function getId()  { return $this->id; }
		public function getFirst()  { return $this->first; }
		public function getLast()  { return $this->last; }
		public function getWeightStatus()     { return $this->weight_status; }
		public function getExercise()  { return $this->name; }
		public function getRepetition()   { return $this->repetition; }
	}

	function createTableRow(UserStatus $u)
	{
		print "        <tr>\n";
		print "            <td>" . $u->getFirst()  . "</td>\n";
		print "            <td>" . $u->getLast()   . "</td>\n";
		print "            <td>" . $u->getWeightStatus()  . "</td>\n";
		print "            <td>" . $u->getExercise()  . "</td>\n";
		print "            <td>" . $u->getRepetition()   . "</td>\n";
		print "        </tr>\n";
	}

	$id = filter_input(INPUT_GET, "id");

	try {
		if (empty($id)) {
			throw new Exception("Missing id.");
		}

            	// Connect to the database.
		$con = new PDO("mysql:host=localhost;dbname=cs174",
			"cs174", "group76");
		$con->setAttribute(PDO::ATTR_ERRMODE,
			PDO::ERRMODE_EXCEPTION);

		$query = "SELECT user.first AS 'First Name', user.last AS 'Last Name', user_status.weight_status AS 'Weight Status', exercise.name AS Exercise, exercise.repetition AS Repetition FROM user, user_status, weight_exercise, exercise";

		// Fetch the matching database table rows.
		$data = $con->query($query);
		$data->setFetchMode(PDO::FETCH_CLASS, "UserStatuts");

             	// We're going to construct an HTML table.
		print "    <table border='1'>\n";

            	// Fetch the database field names.
		$result = $con->query($query);
		$row = $result->fetch(PDO::FETCH_ASSOC);

            	// Construct the header row of the HTML table.
		print "            <tr>\n";
		foreach ($row as $field => $value) {
			print "                <th>$field</th>\n";
		}
		print "            </tr>\n";

		// Constrain the query if we got id.
		$query = "SELECT user.first, user.last, user_status.weight_status, exercise.name, exercise.repetition ".
		"FROM user, user_status, weight_exercise, exercise ".
		"WHERE user.user_id = user_status.user_id ".
		"AND weight_exercise.exercise_id = exercise.exercise_id ".
		"AND user_status.weight_status = weight_exercise.weight_status ".
		"AND user.user_id = :id";

		$ps = $con->prepare($query);
		$ps->bindParam(':id',  $id);

		// Fetch the matching database table rows.
		$ps->execute();
		$ps->setFetchMode(PDO::FETCH_CLASS, "UserStatus");

		if ($ps->rowCount() == 0) {
			throw new Exception("No match for $id");
		} 

		print "<h1>Status of Member id: $id</h1>\n";

            	// Construct the HTML table row by row.
		while ($userStatus = $ps->fetch()) {
			print "        <tr>\n";
			createTableRow($userStatus);
			print "        </tr>\n";
		}

		print "    </table>\n";
		
	}
	catch(PDOException $ex) {
		echo 'ERROR: '.$ex->getMessage();
	}  
	catch(Exception $ex) {
		echo 'ERROR: '.$ex->getMessage();
	}     

	?>
</body>
</html>

            
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Query to get all members trained by a particular trainer</title>
</head>

<body>
	<?php
	class User
	{
		private $user_id;
		private $first;
		private $last;
		private $age;
		private $weight;
		private $height;
		private $phone_number;
		private $address;

		public function getUserId()     { return $this->user_id; }
		public function getFirst()  { return $this->first; }
		public function getLast()   { return $this->last; }
		public function getAge() { return $this->age; }
		public function getWeight()     { return $this->weight; }
		public function getHeight()  { return $this->height; }
		public function getPhoneNumber()   { return $this->phone_number; }
		public function getAddress() { return $this->address; }
	}

	function createTableRow(User $u)
	{
		print "        <tr>\n";
		print "            <td>" . $u->getFirst()  . "</td>\n";
		print "            <td>" . $u->getLast()   . "</td>\n";
		print "        </tr>\n";
	}

	$last = filter_input(INPUT_GET, "last");

	try {
		
		if (empty($last)) {
			throw new Exception("Missing Trainer's Name.");
		}

            	// Connect to the database.
		$con = new PDO("mysql:host=localhost;dbname=cs174",
			"cs174", "group76");
		$con->setAttribute(PDO::ATTR_ERRMODE,
			PDO::ERRMODE_EXCEPTION);

		$query = "SELECT user.first AS 'First Name', user.last AS 'Last Name' FROM user";  

            	// Fetch the matching database table rows.
		$data = $con->query($query);
		$data->setFetchMode(PDO::FETCH_CLASS, "User");

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

		// Constrain the query if we got last name.
		$query = "SELECT user.first, user.last ".
		"FROM user, user_trainer, trainer ".
		"WHERE user.user_id = user_trainer.user_id ".
		"AND trainer.trainer_id = user_trainer.trainer_id ".
		"AND trainer.last = :last";

		$ps = $con->prepare($query);
		$ps->bindParam(':last',  $last);
		

            	// Fetch the matching database table rows.
		$ps->execute();
		$ps->setFetchMode(PDO::FETCH_CLASS, "User");

		if ($ps->rowCount() == 0) {
			throw new Exception("No match for $last");
		} 

		print "<h1>Members trained by $last</h1>\n";

            	// Construct the HTML table row by row.
		while ($user = $ps->fetch()) {
			print "        <tr>\n";
			createTableRow($user);
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
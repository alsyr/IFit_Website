<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Query to get all member trained by a particular trainer</title>
</head>

<body>
	<?php
	function constructTable($data)
	{
            // We're going to construct an HTML table.
		print "    <table border='1'>\n";

            // Construct the HTML table row by row.
		$doHeader = true;
		foreach ($data as $row) {

                // The header row before the first data row.
			if ($doHeader) {
				print "        <tr>\n";
				foreach ($row as $name => $value) {
					print "            <th>$name</th>\n";
				}
				print "        </tr>\n";
				$doHeader = false;
			}

                // Data row.
			print "        <tr>\n";
			foreach ($row as $name => $value) {
				print "            <td>$value</td>\n";
			}
			print "        </tr>\n";
		}

		print "    </table>\n";
	}

	$id = filter_input(INPUT_GET, "id");

	try {
		if (empty($id)) {
			throw new Exception("Missing id.");
		}

		print "<h1>Status of Member id: $id</h1>\n";

            // Connect to the database.
		$con = new PDO("mysql:host=localhost;dbname=cs174",
			"cs174", "group76");
		$con->setAttribute(PDO::ATTR_ERRMODE,
			PDO::ERRMODE_EXCEPTION);

		$query = "SELECT user.first AS 'First Name', user.last AS 'Last Name', user_status.weight_status AS 'Weight Status', exercise.name AS Exercise, exercise.repetition AS Repetition ".
		"FROM user, user_status, weight_exercise, exercise ".
		"WHERE user.user_id = user_status.user_id ".
		"AND weight_exercise.exercise_id = exercise.exercise_id ".
		"AND user_status.weight_status = weight_exercise.weight_status ".
		"AND user.user_id = :id";
		$ps = $con->prepare($query);

            // Fetch the matching row.
		$ps->execute(array(':id' => $id));
		$data = $ps->fetchAll(PDO::FETCH_ASSOC);

            // $data is an array.
		if (count($data) > 0) {
			constructTable($data);
		}
		else {
			print "<h3>(No match.)</h3>\n";
		}
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
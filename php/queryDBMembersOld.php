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

	$last = filter_input(INPUT_GET, "last");

	try {
		if (empty($last)) {
			throw new Exception("Missing Trainer's Name.");
		}

		print "<h1>Members trained by $last</h1>\n";

            // Connect to the database.
		$con = new PDO("mysql:host=localhost;dbname=cs174",
			"cs174", "group76");
		$con->setAttribute(PDO::ATTR_ERRMODE,
			PDO::ERRMODE_EXCEPTION);

		$query = "SELECT user.first AS 'First Name', user.last AS 'Last Name' ".
		"FROM user, user_trainer, trainer ".
		"WHERE user.user_id = user_trainer.user_id ".
		"AND trainer.trainer_id = user_trainer.trainer_id ".
		"AND trainer.last = :last ".
		"ORDER BY user.first, user.last ";
		$ps = $con->prepare($query);

            // Fetch the matching row.
		$ps->execute(array(':last' => $last));
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
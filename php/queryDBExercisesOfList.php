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

$userId = filter_input(INPUT_POST, 'id');
if ($userId == 0) return;

try {
    	// Connect to the database.
	$con = new PDO("mysql:host=localhost;dbname=cs174",
		"cs174", "group76");
	$con->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);

	// Prepared statement query.
	//$query = "SELECT user.first AS 'First Name', user.last AS 'Last Name', user_status.weight_status AS 'Weight Status', exercise.name AS Exercise, exercise.repetition AS Repetition ".
	$query = "SELECT user_status.weight_status, exercise.name, exercise.repetition ".
	"FROM user, user_status, weight_exercise, exercise ".
	"WHERE user.user_id = user_status.user_id ".
	"AND weight_exercise.exercise_id = exercise.exercise_id ".
	"AND user_status.weight_status = weight_exercise.weight_status ".
	"AND user.user_id = :id";
	$ps = $con->prepare($query);
	$ps->bindParam(':id', $userId);
	$ps->execute();

	createTable($ps);
}
catch(PDOException $ex) {
	print 'ERROR: '.$ex->getMessage();
}
catch(Exception $ex) {
	print 'ERROR: '.$ex->getMessage();
}

function createTable(PDOStatement $ps)
{
	print "<table>\n";
	createHeaderRow($ps);
	$ps->execute();
	$ps->setFetchMode(PDO::FETCH_CLASS, "UserStatus");

    	// Construct the data rows.
	while ($userStatus = $ps->fetch()) {
		print "<tr>\n";
		createDataRow($userStatus);
		print "</tr>\n";
	}

	print "</table>\n";
}

function createHeaderRow(PDOStatement $ps)
{
	$row = $ps->fetch(PDO::FETCH_ASSOC);
	print "<tr>\n";
	foreach ($row as $field => $value) {
		print "<th>$field</th>\n";
	}
	print "</tr>\n";
}

function createDataRow(UserStatus $userStatus)
{
	print "<tr>\n";
	print "<td>" . $userStatus->getWeightStatus()   . "</td>\n";
	print "<td>" . $userStatus->getExercise()    . "</td>\n";
	print "<td>" . $userStatus->getRepetition()   . "</td>\n";
	print "</tr>\n";
}
?>
<?php
class Exercise
{
	private $exercise_id;
	private $name;
	private $description;
	private $category;
	private $repetition;

	public function getExerciseId()     { return $this->exercise_id; }
	public function getName()  { return $this->name; }
	public function getDescription()   { return $this->description; }
	public function getCategory() { return $this->category; }
	public function getrepetition()     { return $this->repetition; }
}


$category = filter_input(INPUT_POST, 'category');
if ($category == "") return;

try {
    	// Connect to the database.
	$con = new PDO("mysql:host=localhost;dbname=cs174",
		"cs174", "group76");
	$con->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);

	// Prepared statement query.
	$query = "SELECT name, repetition, exercise_id ".
	"FROM exercise ".
	"WHERE category = :category ".
	"ORDER BY name";
	$ps = $con->prepare($query);
	$ps->bindParam(':category', $category);
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
	print "<iframe width='0' height='0' border='0' name='dummyframe' id='dummyframe'></iframe>\n";
	print "<table>\n";
	createHeaderRow($ps);
	$ps->execute();
	$ps->setFetchMode(PDO::FETCH_CLASS, "Exercise");

    	// Construct the data rows.
	while ($exercise = $ps->fetch()) {
		print "<tr>\n";
		createDataRow($exercise);
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

function createDataRow(Exercise $exercise)
{
	print "<tr>\n";
	print "<td>" . $exercise->getName()    . "</td>\n";
	print "<td>" . $exercise->getRepetition()   . "</td>\n";
	print "<td><form method='post' action='addTodoList.php?id=".$exercise->getExerciseId()."' target='dummyframe'><input type='submit' value='+'></form></td>\n";
	print "</tr>\n";
}
?>
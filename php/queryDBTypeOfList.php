<?php
class Exercise
{
	private $exercise_id;
	private $name;
	private $description;
	private $category;
	private $repetition;

	public function getExerciceId()     { return $this->exercise_id; }
	public function getName()  { return $this->name; }
	public function getDescription()   { return $this->description; }
	public function getCategory() { return $this->category; }
	public function getrepetition()     { return $this->repetition; }
}


try {

            // Connect to the database.
	$con = new PDO("mysql:host=localhost;dbname=cs174",
		"cs174", "group76");
	$con->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);

	$query = "SELECT category FROM exercise GROUP BY category";  

            // Fetch the matching database table rows.
	$ps = $con->prepare($query);
	$ps->execute();
	$ps->setFetchMode(PDO::FETCH_CLASS, "Exercise");

    	// Construct menu options. Start with a blank option.
	print "<option value=0>$full</option>";
	while ($exercise = $ps->fetch()) {
		$category    = $exercise->getCategory();

		print "<option value='$category'>$category</option>";
	}
}
catch(PDOException $ex) {
	print 'ERROR: '.$ex->getMessage();
}
catch(Exception $ex) {
	print 'ERROR: '.$ex->getMessage();
}
?>
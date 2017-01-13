<?php
class Trainer
{
	private $trainer_id;
	private $first;
	private $last;
	private $gender;

	public function getTrainerId()     { return $this->trainer_id; }
	public function getFirst()  { return $this->first; }
	public function getLast()   { return $this->last; }
	public function getGender() { return $this->gender; }
}


try {

            // Connect to the database.
	$con = new PDO("mysql:host=localhost;dbname=cs174",
		"cs174", "group76");
	$con->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);

	//$query = "SELECT trainer.trainer_id, trainer.first, trainer.last, trainer.gender FROM trainer ORDER BY last";  
	$query = "SELECT trainer_id, first, last, gender FROM trainer ORDER BY last";  

            // Fetch the matching database table rows.
	$ps = $con->prepare($query);
	$ps->execute();
	$ps->setFetchMode(PDO::FETCH_CLASS, "Trainer");

    	// Construct menu options. Start with a blank option.
	print "<option value=0>$full</option>";
	while ($trainer = $ps->fetch()) {
		$trainer_id    = $trainer->getTrainerId();
		$first = $trainer->getFirst();
		$last  = $trainer->getLast();
		$gender  = $trainer->getGender();
		$full  = $first . " " . $last;

		print "<option value='$trainer_id'>$full</option>";
	}
}
catch(PDOException $ex) {
	print 'ERROR: '.$ex->getMessage();
}
catch(Exception $ex) {
	print 'ERROR: '.$ex->getMessage();
}
?>
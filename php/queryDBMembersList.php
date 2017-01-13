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


try {

            // Connect to the database.
	$con = new PDO("mysql:host=localhost;dbname=cs174",
		"cs174", "group76");
	$con->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);

	$query = "SELECT user_id, first, last FROM user ORDER BY last";  

            // Fetch the matching database table rows.
	$ps = $con->prepare($query);
	$ps->execute();
	$ps->setFetchMode(PDO::FETCH_CLASS, "User");

    	// Construct menu options. Start with a blank option.
	print "<option value=0>$full</option>";
	while ($user = $ps->fetch()) {
		$user_id    = $user->getuserId();
		$first = $user->getFirst();
		$last  = $user->getLast();
		$full  = $first . " " . $last;

		print "<option value='$user_id'>$full</option>";
	}
}
catch(PDOException $ex) {
	print 'ERROR: '.$ex->getMessage();
}
catch(Exception $ex) {
	print 'ERROR: '.$ex->getMessage();
}
?>
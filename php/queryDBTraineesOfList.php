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

$trainerId = filter_input(INPUT_POST, 'id');
if ($trainerId == 0) return;

try {
    	// Connect to the database.
	$con = new PDO("mysql:host=localhost;dbname=cs174",
		"cs174", "group76");
	$con->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);

	// Prepared statement query.
	$query = "SELECT user.first, user.last ".
	"FROM user, user_trainer, trainer ".
	"WHERE user.user_id = user_trainer.user_id ".
	"AND trainer.trainer_id = user_trainer.trainer_id ".
	"AND trainer.trainer_id = :trainer_id ".
	"ORDER BY user.last";
	$ps = $con->prepare($query);
	$ps->bindParam(':trainer_id', $trainerId);
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
	$ps->setFetchMode(PDO::FETCH_CLASS, "User");

    	// Construct the data rows.
	while ($u = $ps->fetch()) {
		print "<tr>\n";
		createDataRow($u);
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

function createDataRow(User $u)
{
	print "<tr>\n";
	print "<td>" . $u->getFirst()   . "</td>\n";
	print "<td>" . $u->getLast()    . "</td>\n";
	print "</tr>\n";
}
?>
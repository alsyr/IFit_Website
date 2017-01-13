<?php include('includes/header.html'); ?>
<?php include('includes/headerPrograms.html'); ?>

<link rel="stylesheet" href="css/iFitBasic.css">
<link rel="stylesheet" href="css/dropMenu.css">
<style type="text/css">
/* make default button size sane */
.ui-state-default {
	font-size: 20px;
	font-weight: lighter;
	color: #dedc00;
	background-color: #fff;
}

table a:link {
	color: #666;
	font-weight: bold;
	text-decoration:none;
}
table a:visited {
	color: #999999;
	font-weight:bold;
	text-decoration:none;
}
table a:active,table a:hover {
	color: #bd5a35;
	text-decoration:underline;
}
table {
	font-family:Arial, Helvetica, sans-serif;
	color:#666;
	font-size:12px;
	text-shadow: 1px 1px 0px #fff;
	background:#eaebec;
	margin:20px;
	border:#ccc 1px solid;

	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;

	-moz-box-shadow: 0 1px 2px #d1d1d1;
	-webkit-box-shadow: 0 1px 2px #d1d1d1;
	box-shadow: 0 1px 2px #d1d1d1;
}
table th {
	padding:21px 25px 22px 25px;
	border-top:1px solid #fafafa;
	border-bottom:1px solid #e0e0e0;

	background: #ededed;
	background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
	background: -moz-linear-gradient(top,  #ededed,  #ebebeb);
}
table th:first-child{
	text-align: left;
	padding-left:20px;
}

table tr:first-child th:first-child{
	-moz-border-radius-topleft:3px;
	-webkit-border-top-left-radius:3px;
	border-top-left-radius:3px;
}

table tr:first-child th:last-child{
	-moz-border-radius-topright:3px;
	-webkit-border-top-right-radius:3px;
	border-top-right-radius:3px;
}

table tr{
	text-align: center;
	padding-left:20px;
}

table tr td:first-child{
	text-align: left;
	padding-left:20px;
	border-left: 0;
}

table tr td {
	padding:18px;
	border-top: 1px solid #ffffff;
	border-bottom:1px solid #e0e0e0;
	border-left: 1px solid #e0e0e0;
	
	background: #fafafa;
	background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
	background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa);
}

table tr.even td{
	background: #f6f6f6;
	background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6));
	background: -moz-linear-gradient(top,  #f8f8f8,  #f6f6f6);
}

table tr:last-child td{
	border-bottom:0;
}

table tr:last-child td:first-child{
	-moz-border-radius-bottomleft:3px;
	-webkit-border-bottom-left-radius:3px;
	border-bottom-left-radius:3px;
}

table tr:last-child td:last-child{
	-moz-border-radius-bottomright:3px;
	-webkit-border-bottom-right-radius:3px;
	border-bottom-right-radius:3px;
}

table tr:hover td{
	background: #f2f2f2;
	background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
	background: -moz-linear-gradient(top,  #f2f2f2,  #f0f0f0);	
}

</style>


<script language="javascript">
$(document).ready(function() {

	$('.delete').click(function() {
		var parent = $(this).closest("tr");
	// var parent = $(this).parent().parent();
    	//closest("div.course_container")
    	//course_container
    	$.ajax({
    		type: 'get',
    		url: 'removeFromTodoList.php', 
    		data: 'ajax=1&delete=' + $(this).attr('id'),
    		beforeSend: function() {
    			parent.animate({'backgroundColor':'#fb6c6c'},300);
    		},
    		success: function() {
    			parent.fadeOut(300,function() {
    				parent.remove();
    			});
    		}
    	});	        
    });		
});
</script>

<div class="page">
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


	try {
    	// Connect to the database.
		$con = new PDO("mysql:host=localhost;dbname=cs174", "cs174", "group76");
		$con->setAttribute(PDO::ATTR_ERRMODE,
			PDO::ERRMODE_EXCEPTION);

	// Prepared statement query.
		$query = "SELECT name, repetition, todolist.exercise_id ".
		"FROM exercise, todolist ".
		"WHERE exercise.exercise_id = todolist.exercise_id ".
		"ORDER BY name";
		$ps = $con->prepare($query);
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
		print "<td><input type='button' id=".$exercise->getExerciseId()." class='delete' value='-'></td>\n";
		print "</tr>\n";
	}
	?>
</div>
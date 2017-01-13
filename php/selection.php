<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Selection for Adhesion</title>
</head>

<body>
	<p>
		<?php
		//Get form input
		$title = filter_input(INPUT_POST,"title");
		$first = filter_input(INPUT_POST,"firstName");
		$last = filter_input(INPUT_POST,"lastName");
		$contribution = filter_input(INPUT_POST,"contribution");
		$birthMonth = filter_input(INPUT_POST,"month");
		$birthDay = filter_input(INPUT_POST,"day");
		$birthYear = filter_input(INPUT_POST,"year");
		$firstTime = filter_input(INPUT_POST, "answer");
		$error = "One or multiple fields are missing or wrong. Recheck please!!!";
		$againMember = "Sorry, you are already a member. You cannot apply twice!!!";
		$output = $first . " " .$last;


		if($firstTime == "yes"){		
			switch ($title) {
				case "mister":
				$output = "Mister ". $output;
				break;
				case "madam":
				$output = "Madam ". $output;
				break;
				case "miss":
				$output = "Miss ". $output;
				break;
				default:
				$output = $error;
			}
			if(filter_has_var(INPUT_POST, "donation")){
				$output = "Thank you " .$output. " for your financial donation to the MJU";
			}
			if(filter_has_var(INPUT_POST, "supply")){
				$output = "Thank you " .$output ."  for your supply donation to the MJU";
			}
		}
		else if($firstTime == "no"){
			$output = $againMember;
		}

		print $output;

		?>
	</p>
</body>
</html>


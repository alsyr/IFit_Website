<?php include('includes/header.html'); ?>
<?php include('includes/headerLogin.html'); ?>
<link rel="stylesheet" href="css/iFitBasic.css">

<script>
$(function() {
	$( "#datepicker" ).datepicker();
});
</script>
<script type = "text/javascript">
function validate()
{
	firstName  = document.getElementById("firstName").value;
	lastName  = document.getElementById("lastName").value;
	phone = document.getElementById("phone").value;
	email = document.getElementById("email").value;

	errors = "";

	if (firstName == "") {
		errors += "Missing first name.\n";
	} 

	if (lastName == "") {
		errors += "Missing last name.\n";
	} 

	phoneRE = /^\d{3} +\d{3} +\d{4}$/;
	if (!phone.match(phoneRE)){
		errors += "Invalid phone number. " +
		"Example: 999 999 9999\n";
	} 

	emailRE = /^.+@.+\..{2,4}$/;
	if (!email.match(emailRE)){
		errors += "Invalid email address. " +
		"Should be xxxxx@xxxxx.xxx\n";
	} 

	if (errors != "") {
		alert(errors);
	}
	if(email.match(emailRE) && phone.match(phoneRE) && firstName != "" && lastName != ""){
		alert("Congratulation!!!\nYou made it!!!");
	}
}
</script>

<iframe name="myIframe" style="visibility:hidden;display:none">
</iframe>

<div class="page">
<form action="addUser.php" method="post" onsubmit="return validate(this)" target="myIframe">
	<fieldset>
		<legend>Adhesion</legend>
		<p>
			<label>First name:</label>
			<input name="firstName" type="text" id="firstName">
		</p>
		<p>
			<label>Last name:</label>
			<input name="lastName" type="text" id="lastName">
		</p>
		<p>
			<label>Age:</label>
			<input name="age" type="number" id="age">
		</p>
		<p>
			<label>Weight in kg:</label>
			<input name="weight" type="number" id="weight">
		</p>
		<p>
			<label>Height in cm:</label>
			<input name="height" type="number" id="height">
		</p>
		<p>
			<label>Phone Number:</label>
			<input name="phoneNumber" type="text" value = "ddd ddd dddd" id = "phone" />
		</p>
		<p>
			<label>Email:</label>
			<input name="email" type="text" value = "xxxxx@xxxxx.xxx" id = "email" />
		</p>
		<input type="submit" onclick = "" value="submit">
	</fieldset>
</form>
</div>

</div>
<!-- end container -->

<?php include('includes/footerHome.html'); ?>
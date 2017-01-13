<?php include('includes/header.html'); ?>
<?php include('includes/headerTrainers.html'); ?>

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
</style>
<script type="text/javascript" src="js/trainers-programs.js"></script>

<div class="dropMenuOption">
	<h1>Members' coach</h1>
	<h3>
		People trained by &nbsp;
		<select id="trainermenu"></select>
	</h3>
	<div id="output"></div>

	<h1>Exercises that should be done by a particular member and his/her weight status</h1>
	<h3>
		Exercises that should be done by &nbsp;
		<select id="exercisemenu"></select>
	</h3>
	<div id="output2"></div>
</div>
</div>
<!-- end container -->

<?php include('includes/footerHome.html'); ?>
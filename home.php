<?php include('includes/header.html'); ?>
<?php include('includes/headerHome.html'); ?>

<!-- bxSlider Javascript file -->
<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link rel="stylesheet" href="css/jquery.bxslider.css"/>
<script>

function initMap() {
	var myLatLng = {lat: -25.363, lng: 131.044};

	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 4,
		center: myLatLng
	});

	var marker = new google.maps.Marker({
		position: myLatLng,
		map: map,
		title: 'Hello World!'
	});
}

</script>

<div class="backgroundBanner">
	<section class="backgroundPic">
		<img src="./images_files/working_out2.jpg" width="600" alt="" class="background_pic">
	</section>

	<div class="wrapper">
		<a href="programs.php" class="programsButton">See All Programs</a>
	</div>
</div>
<div class="page">

	<!-- ==== START MAIN ==== -->
	<main role="main">

		<section class="post">
			<h1>iPlanner, The Way To Stay Fit and Healthy</h1>

			<div class="post-blurb">
				<p>Lorem ipsum dolor sit amet, ut harum abhorreant nam. His ea purto definitiones. Iudico oblique te vix, sed cu mazim comprehensam. Mollis aperiam at qui. Dico omittam ullamcorper ei quo. Utroque propriae ex mel, mel oratio ponderum ad, no cum stet labores verterem. Eum id habeo persecuti assueverit, eu has cotidieque voluptatibus, et liber timeam ius. Per debitis consequat et, eu rationibus temporibus eos. Ubique nemore ut pro. … <a href="http://localhost/iFit_project/iFit/home.php#" class="more">Read More</a></p>
			</div>

			<footer class="footer">
				<p class="post-footer">Posted by John Smith and Eric Gardner <time datetime="2015-09-20T11:20" class="pubdate">September 20, 2015 at 11:20pm</time></p>
			</footer>
		</section>

		<!--========= slideshow=======-->
		<section class="post">
			<h1> People feel more confident now than before!</h1>
			<div class="slideshow">
				<ul class="bxslider">
					<li><img src="./images_files/slideshow11.jpg" height="400" width="400"/></li>
					<li><img src="./images_files/slideshow22.jpg" height="400" width="400"/></li>
					<li><img src="./images_files/slideshow33.jpg" height="400" width="400"/></li>
					<li><img src="./images_files/slideshow44.jpg" height="400" width="400"/></li>
				</ul>
			</div>
			<div class="post-blurb">
				<p>
					At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat...<a href="about.php" class="more">Read More</a></p></p>
				</div>


			</section>
			<!--========= End of slideshow=======-->
			<section class="post">
				<h1>Our Mission: your HEALTH!!!</h1>

				<img src="./images_files/fit_mission.jpg" width="370" alt="" class="post-photo">

				<div class="post-blurb">
					<p>Lorem ipsum dolor sit amet, ut harum abhorreant nam. His ea purto definitiones. Iudico oblique te vix, sed cu mazim comprehensam. Mollis aperiam at qui. Dico omittam ullamcorper ei quo. Utroque propriae ex mel, mel oratio ponderum ad, no cum stet labores verterem. Eum id habeo persecuti assueverit, eu has cotidieque voluptatibus, et liber timeam ius. Per debitis consequat et, eu rationibus temporibus eos. Ubique nemore ut pro.In est epicurei argumentum, vix regione petentium patrioque ex, sea deleniti insolens salutatus at. An everti maiorum vix. Sit cu alia equidem consectetuer, unum novum no sit, est no verear latine. Ei eos nibh putent. Meis ponderum his ad. Vis eu tritani rationibus scripserit, electram postulant adversarium id quo.Ne vel similique contentiones. Dicta luptatum salutandi sea an, duo at tation scripserit. Pri impedit delicatissimi ad, an sanctus molestiae pro. Mel an ridens mnesarchum … <a href="http://localhost/iFit_project/iFit/home.php#" class="more">Read More</a></p>
				</div>



				<footer class="footer">
					<p class="post-footer">Posted by Paul Gauthier <time datetime="2015-09-19T11:20" class="pubdate">September 19, 2015 at 09:20am</time></p>
				</footer>	
			</section>



		</main>
		<!-- end main -->

	</div>
	<!-- end sidebar -->

</div>
<!-- end container -->

<div class="find_us">
	<div class="empty_space"></div>
	<address class="address">
		Find Us At: 
		San Jose State University,
		1 Washington Sq,
		San Jose, CA 95192			
	</address>
	<p align="center"><iframe class="google_map"frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="960px" height="243" src="http://maps.google.com/maps?q=San jose state&ie=UTF8&t=satellite&z=15&output=embed"><div><small></small></div><div><small></small></div></iframe></p>


	<?php include('includes/footerHome.html'); ?>
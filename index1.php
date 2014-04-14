<!DOCTYPE HTML>
<!--
	Prologue 1.2 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
	<title>Prologue by HTML5 UP</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600" rel="stylesheet" type="text/css" />
	<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
	<script src="js/jquery.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-panels.min.js"></script>
	<script src="js/init.js"></script>
	<noscript>
		<link rel="stylesheet" href="css/skel-noscript.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-wide.css" />
	</noscript>
	<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
</head>


<body>
	
	<script type="text/javascript">
	function PreviewImage() {
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("file").files[0]);

		oFReader.onload = function (oFREvent) {
			document.getElementById("uploadPreview").src = oFREvent.target.result;
		};
	};
	</script>

	<script>
	var x=document.getElementById("demo");
	function getLocation()
	{
		if (navigator.geolocation)
		{
			navigator.geolocation.getCurrentPosition(showPosition);
		}
		else{x.innerHTML="Geolocation is not supported by this browser.";}
	}

	function showPosition(position)
	{
		var a =document.getElementById("lat");
		var b =document.getElementById("lon");
		a.value= position.coords.latitude;
		b.value=  position.coords.longitude;
  //x.innerHTML="Latitude: " + position.coords.latitude +  "<br>Longitude:" + position.coords.longitude;	
}
</script>

<!-- Header -->
<div id="header" class="skel-panels-fixed">

	<div class="top">

		<!-- Logo -->
		<div id="logo">
			<span class="image avatar48"><img src="images/avatar.jpg" alt="" /></span><br>
			<h1 id="title">HackIllinois</h1>
			<span class="byline">Find out what something is from just taking its picture!</span>
		</div>

		<!-- Nav -->
		<nav id="nav">
							<!--
							
								Prologue's nav expects links in one of two formats:
								
								1. Hash link (scrolls to a different section within the page)
								
								   <li><a href="#foobar" id="foobar-link" class="skel-panels-ignoreHref"><span class="fa fa-whatever-icon-you-want">Foobar</span></a></li>

								2. Standard link (sends the user to another page/site)

								   <li><a href="http://foobar.tld"><span class="fa fa-whatever-icon-you-want">Foobar</span></a></li>
							
								-->
								<ul>
									<li><a href="#upload" id="top-link" class="skel-panels-ignoreHref"><span class="fa fa-home">Upload an Image</span></a></li>

									<li><a href="#about" id="about-link" class="skel-panels-ignoreHref"><span class="fa fa-envelope">What is it?</span></a></li>


									<li><a href="#details" id="contact-link" class="skel-panels-ignoreHref"><span class="fa fa-envelope">Details</span></a></li>

									<li><a href="#question" id="contact-link" class="skel-panels-ignoreHref"><span class="fa fa-envelope">Questions Asked</span></a></li>

									<li><a href="#us" id="contact-link" class="skel-panels-ignoreHref"><span class="fa fa-user">About Us</span></a></li>

									
								</ul>
							</nav>

						</div>

						<div class="bottom">






							<!-- Social Icons -->
							<ul class="icons">
								<li><a href="#" class="fa fa-twitter solo"><span>Twitter</span></a></li>
								<li><a href="#" class="fa fa-facebook solo"><span>Facebook</span></a></li>
								<li><a href="#" class="fa fa-github solo"><span>Github</span></a></li>
								<li><a href="#" class="fa fa-dribbble solo"><span>Dribbble</span></a></li>
								<li><a href="#" class="fa fa-envelope solo"><span>Email</span></a></li>
							</ul>

						</div>

					</div>

					<!-- Main -->
					<div id="main">



						<!-- Upload Image -->
						<section id="upload" class="one">
							<div class="container">


								<header>

									<!-- <img src="images/pic01.jpg" style= "max-width:100%; max-height:100%;"/></a> -->
									<br><br>
									<h2>Don't know what it is? Upload the image!</h2>
								</header>

								<p>Upload the image to find details about what the object is, and what others most commonly ask about the object. Click the upload file below, choose an image, and hit submit.</p>

										 <center>
                                                                                        <div><img id="uploadPreview" style= "max-width:100%; max-height:100%;" /></div>
                                                                                </center>
								<form method="post" action="main.php" enctype="multipart/form-data">

									
									<div class="row">
										<div class="12u">
											<center>
											
											<input type="file"  name="file" onchange="PreviewImage();"  id="file" />
											<input type="submit" value="submit" name="submit">
									
											</center>
										</div>
									</div>
									
									<!--
									LATITUDE: <input type="text" name="lat" id="lat" disabled>
									<p></p>
									LONGITUDE: <input type="text" name="lon" id="lon" disabled >
									<p></p>
									<input type="button" name="aa" onclick="getLocation()" value="get location">
									<p></p>
									-->

								</form>

							</div>
						</section>



						<!-- About -->
						<section id="about" class="two">
							<div class="container">

								<header>
									<h2 class="alt">What is it?</h2>

									<div>Text goes here. </div>
								</header>


							</div>
						</section>
						
						

						<!-- About Me -->
						<section id="details" class="three">
							<div class="container">

								<header>
									<h2>Details about this object.</h2>
								</header>



								<p>This is a ...</p>

							</div>
						</section>

						<!-- About Me -->
						<section id="question" class="four">
							<div class="container">

								<header>
									<h2>Most commonly asked questions about this object.</h2>
								</header>



								<p>Ohio State University</p>

							</div>
						</section>


						<!-- About Me -->
						<section id="us" class="five">
							<div class="container">

								<header>
									<h2>About Us</h2>
								</header>



								<p>We are a team of three students from The Ohio State University studying Computer Science and Engineering. Our names are Shashank Agarwal, Amna Khan, and Nimit Goyal. Shashank is a first year graduate student, Amna is a senior undergraduate student, and Nimit is a first year graduate student as well.</p>
								<p>To Contact Us: <br> 

								Shashank Agarwal: agarwal.202@osu.edu<br>
								Amna Khan: khan.261@osu.edu <br>
								Nimit Goyal: goyal@osu.edu <br>

							</div>
						</section>



					</div>



				</body>
				</html>

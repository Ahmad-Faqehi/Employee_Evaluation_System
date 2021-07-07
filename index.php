<?php include "includes/Database.php";
$emp =$conn->query("select count(*) from  employee ")->fetchColumn();
$evl =$conn->query("select count(*) from  evaluator ")->fetchColumn();
$pro =$conn->query("select count(*) from  evolution ")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="utf-8"/>
		<title>Employee Performance Evaluation System</title>
		<meta name="description" content="Creative Agency, Marketing Agency Template">
		<meta name="keywords" content="Creative Agency, Marketing Agency">
		<meta name="author" content="rajesh-doot">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="theme-color" content="#8bc0d9">
		<!--student-favicon-->
		<link href="images/favicon.png" rel="icon">
		<!--plugin-css-->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/plugin.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
		<!-- template-style-->
		<link href="css/style.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
	</head>
	<body>
			<!--Start Preloader -->
		<!-- <div class="onloadpage" id="page_loader">
			<div class="pre-content">
				<div class="logo-pre"><img src="images/logo.png" alt="Logo" class="img-fluid" /></div>
				<div class="pre-text-"><span>Niwax - Creative Agency & Portfolio HTML Template Are 2 Seconds Away.</span>Have Patience</div>
			</div>
		</div> -->
		<!--End Preloader -->
		<!--Start Header -->
		<header class="header-pr nav-bg-w main-header navfix fixed-top menu-white">
			<div class="container-fluid m-pad">
				<div class="menu-header">
					<div class="dsk-logo"><a class="nav-brand" href="digital-agency.html">
						<img src="images/white-logo1.png" alt="Logo" class="mega-white-logo"/>
						<img src="images/logo1.png" alt="Logo" class="mega-darks-logo"/>
					</a></div>
					<div class="custom-nav" role="navigation">
						<ul class="nav-list">
							<li class="sbmenu"><a href="#" class="menu-links">Home</a></li>
						<li class="sbmenu"><a href="#xabout" class="menu-links">Abou</a></li>
						<li class="sbmenu"><a href="#xService" class="menu-links">Motivation</a></li>
						<li class="sbmenu"><a href="#xBenefits" class="menu-links">Benefits</a></li>
						<li class="sbmenu"><a href="#xStatistics" class="menu-links">Statistics</a></li>
						<li class="sbmenu"><a href="#xTeam" class="menu-links">Team Group</a></li>

<li><a href="#" class="menu-links right-bddr">&nbsp;</a>
<!--menu right border-->

<li><a href="dashboard/login.php" class="btn-br bg-btn3 btshad-b2 lnk">Login to System<span class="circle"></span></a> </li>
</ul>
</div>
<div class="mobile-menu2">
<ul class="mob-nav2">
<li class="navm-"> <a class="toggle" href="#"><span></span></a></li>
</ul>
</div>
</div>
			<!--Mobile Menu-->
			<nav id="main-nav">
				<ul class="first-nav">
					<li><a href="#">Home</a>
					</li>
			</nav>
		</div>

</header>
<!--Mobile contact-->

<!--Mobile contact-->
<!--End Header -->
<!--Start Hero-->
<section class="hero-section lead-hero">
<div class="text-block">
<div class="container">
<div class="row">
<div class="col-lg-6 v-center">
<div class="header-heading">
<h1 class="wow fadeInUp" data-wow-delay=".2s">Employee Performance Evaluation System</h1>
<p class="wow fadeInUp" data-wow-delay=".4s">The employee performance appraisal system project aims
	to increase employee effectiveness
	</p>
<a href="dashboard/" class="btn-main bg-btn lnk wow fadeInUp" data-wow-delay=".6s">Go to System <i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></a>
</div>
</div>
<div class="col-lg-6 wow fadeIn" data-wow-delay=".4s"><div class="single-image"><img src="images/hero/leads-hero.png" alt="hero image" class="img-fluid" /></div></div>
</div>
</div>
</div>
</section>
<!--End Hero-->

<!--Start About-->
<section class="about-lead-gen pad-tb" id="xabout">
<div class="container">
<div class="row">
<div class="col-lg-6">
<div class="common-heading text-l">
<span>know us</span>
<h2 class="mb20">What is Employee Performance Evaluation System? </h2>
<p>
	The Employee Performance Evaluation System is a simple project that can help a certain company, school or ministry evaluate the performance of their employees based on their task accomplishments. This system has 3 types of users which are the Admin, Employee, and Evaluator. The Admin Side is the system user that in-charge to manage the important data of the system such as the department, designation, employee list, and list of evaluators. The admin has access to all the data stored and the database</p>
</div>
</div>
<div class="col-lg-6 lead-intro-"><img src="images/about/lead-about.png" alt="image" class="img-fluid" /></div>
</div>
</div>
</section>
<!--End About-->
<!--Start Service-->
<section class="bhv-service bg-gradient5 pad-tb" id="xService">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="common-heading">
<span>What we’re great at</span>
<h2 class="mb30">Project Motivation</h2>
</div>
</div>
</div>
<div class="row upset link-hover shape-bg2">
<div class="col-lg-4 col-sm-6 mt30 wow fadeInUp" data-wow-delay=".2s">
<div class="s-block" data-tilt data-tilt-max="4" data-tilt-speed="1000">
<div class="s-card-icon"><img src="images/icons/marketing.svg" alt="service" class="img-fluid" /></div>
<h4>Feedback About Job Performance</h4>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
</div>
</div>
<div class="col-lg-4 col-sm-6 mt30 wow fadeInUp" data-wow-delay=".4s">
<div class="s-block" data-tilt data-tilt-max="4" data-tilt-speed="1000">
<div class="s-card-icon"><img src="images/icons/development.svg" alt="service" class="img-fluid" /></div>
<h4>Facilitate Better Working Relationships</h4>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
</div>
</div>
<div class="col-lg-4 col-sm-6 mt30 wow fadeInUp" data-wow-delay=".6s">
<div class="s-block" data-tilt data-tilt-max="4" data-tilt-speed="1000">
<div class="s-card-icon"><img src="images/icons/marketing.svg" alt="service" class="img-fluid" /></div>
<h4>Provide Historical Record of Performance</h4>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
</div>
</div>


</div>
</section>
<!--End Service-->
<!--Start About-->
<section class="why-choos-lg pad-tb" id="xBenefits">
<div class="container">
<div class="row">
<div class="col-lg-6">
<div class="common-heading text-l">
<!-- <span>Why Choose Us</span> -->
<h2 class="mb20">Potential Benefits</h2>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
<div class="itm-media-object mt40 tilt-3d">
<div class="media">
<div class="img-ab- base" data-tilt data-tilt-max="20" data-tilt-speed="1000"><img src="images/icons/computers.svg" alt="icon" class="layer"></div>
<div class="media-body">
<h4>Find Right Employees for Promotion</h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquet ligula nec leo elementum semper. Mauris aliquet egestas metus.</p>
</div>
</div>
<div class="media mt40">
<div class="img-ab- base" data-tilt data-tilt-max="20" data-tilt-speed="1000"><img src="images/icons/worker.svg" alt="icon" class="layer"></div>
<div class="media-body">
<h4>Supports Workforce Planning</h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquet ligula nec leo elementum semper. Mauris aliquet egestas metus.</p>
</div>
</div>
<div class="media mt40">
<div class="img-ab- base" data-tilt data-tilt-max="20" data-tilt-speed="1000"> <img src="images/icons/deal.svg" alt="icon" class="layer"></div>
<div class="media-body">
<h4>Increases Employee Retention</h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquet ligula nec leo elementum semper. Mauris aliquet egestas metus.</p>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="single-image  "> <img src="images/about/marketing-service.png" alt="hero image" class="img-fluid" style="margin-top: 100px;" /> </div>
</div>
</div>
</div>
</section>
<!--End About-->

<!--Start statistics-->
<div class="statistics-section bg-gradient5 pad-tb tilt3d " id="xStatistics">
	<div class="container">

		<div class="common-heading">
			<h2>Statistics</h2>
		</div>

	<div class="row justify-content-center t-ctr">

	<div class="col-lg-4 col-sm-6">
	<div class="statistics">	
	<div data-tilt data-tilt-max="20" data-tilt-speed="1000" class="statistics-img">
	<img src="images/icons/startup.svg" alt="years" class="img-fluid" />
	</div>
	<div class="statnumb">
	<span class="counter"><?php echo $pro ?></span><span>+</span>
	<p>Evaluation processes</p>
	</div>
	</div>
	</div>

	<div class="col-lg-4 col-sm-6">
	<div class="statistics">
	<div data-tilt data-tilt-max="20" data-tilt-speed="1000" class="statistics-img">
	<img src="images/icons/team.svg" alt="team" class="img-fluid" />
	</div>
	<div class="statnumb">
	<span class="counter"><?php echo $emp ?></span><span>+</span>
	<p>Employee Members</p>
	</div>
	</div>
	</div>

	<div class="col-lg-4 col-sm-6">
		<div class="statistics">
		<div data-tilt data-tilt-max="20" data-tilt-speed="1000" class="statistics-img">
		<img src="images/icons/customer-service.svg" alt="team" class="img-fluid" />
		</div>
		<div class="statnumb">
		<span class="counter"><?php echo $evl ?></span><span>+</span>
		<p>Evaluator Members</p>
		</div>
		</div>
		</div>	
	</div>
	</div>
	</div>
	<!--End statistics-->


<!--Start Portfolio-->
<section class="portfolio-page pad-tb bg-gradient6" id="xTeam">
	<div class="container ">
	<div class="row justify-content-left">
	<div class="col-lg-6">
	<div class="common-heading pp">
	<!-- <span>Our Work</span> -->
	<h2>Project Team Group</h2>
	</div>
	</div>
	<div class="col-lg-6 v-center">
	<div class="filters">
	<ul class="filter-menu">
		<li data-filter="*"class="is-checked">All</li>
	<li data-filter=".supervisor" >Supervisor</li>
	<li data-filter=".student">Team</li>
	
	</ul>
	</div>
	</div>
	</div>
	<div class="row card-list" style="margin-top: 18px;">
	<div class="col-lg-4 col-md-6 grid-sizer"></div>

	<div class="col-lg-4 col-sm-4 mt40 single-card-item supervisor">
		<div class="isotope_item up-hor">
		<div class="item-image">
		<a href="#"></a>
		</div>
		<div class="item-info-div shdo">
			<div class="">
				<img src="images/user_icon.png" alt="image" class=" w-25 rounded pb-2" />
			</div>
		<h4><a href="#">Ahmad Faqehi</a></h4>
		<p>Web Devloper</p>
		</div>
		</div>
		</div>


	<div class="col-lg-4 col-sm-4 mt40 single-card-item student">
	<div class="isotope_item up-hor">
	<div class="item-image">
	<a href="#"> </a>
	</div>
	<div class="item-info-div shdo">

		<div class="">
			<img src="images/user_icon.png" alt="image" class=" w-25 rounded pb-2" />
		</div>
	<h4><a href="#">Mohmmed Khaled</a></h4>
	<p>Web Desiner</p>
	</div>
	</div>
	</div>

	<div class="col-lg-4 col-sm-4 mt40 single-card-item student">
		<div class="isotope_item up-hor">
		<div class="item-image">
		<a href="#"> </a>
		</div>
		<div class="item-info-div shdo">
	
			<div class="">
				<img src="https://i.pinimg.com/originals/a6/58/32/a65832155622ac173337874f02b218fb.png" alt="image" class=" w-25 rounded pb-2" />
			</div>
		<h4><a href="#">Sara Ali</a></h4>
		<p>Front End Devloper</p>
		</div>
		</div>
		</div>

		<div class="col-lg-4 col-sm-4 mt40 single-card-item student">
			<div class="isotope_item up-hor">
			<div class="item-image">
			<a href="#"> </a>
			</div>
			<div class="item-info-div shdo">
		
				<div class="">
					<img src="https://i.pinimg.com/originals/a6/58/32/a65832155622ac173337874f02b218fb.png" alt="image" class=" w-25 rounded pb-2" />
				</div>
			<h4><a href="#">Roa Mohmmed</a></h4>
			<p>Back End Devloper</p>
			</div>
			</div>
			</div>

			<div class="col-lg-4 col-sm-4 mt40 single-card-item student">
				<div class="isotope_item up-hor">
				<div class="item-image">
				<a href="#"> </a>
				</div>
				<div class="item-info-div shdo">
			
					<div class="">
						<img src="images/user_icon.png" alt="image" class=" w-25 rounded pb-2" />
					</div>
				<h4><a href="#">Tariq Mohmmed</a></h4>
				<p>Back End Devloper</p>
				</div>
				</div>
				</div>

				<div class="col-lg-4 col-sm-4 mt40 single-card-item student">
					<div class="isotope_item up-hor">
					<div class="item-image">
					<a href="#"> </a>
					</div>
					<div class="item-info-div shdo">
				
						<div class="">
							<img src="https://i.pinimg.com/originals/a6/58/32/a65832155622ac173337874f02b218fb.png" alt="image" class=" w-25 rounded pb-2" />
						</div>
					<h4><a href="#">Fatima Ahmed</a></h4>
					<p>Front End Devloper</p>
					</div>
					</div>
					</div>
	</div>
	</div>
	</section>
	<!--End Portfolio-->

	
<!--Start Footer-->
<footer>


<div class="footer-row3">
<div class="copyright">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="footer-">
<p>Copyright &copy; 2021 Employee Evaluation System</p>
</div>
</div>
</div>
</div>
</div>
</div>
</footer>
<!--End Footer-->

<!-- js placed at the end of the document so the pages load faster -->
<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script> 
<script src="js/plugin.min.js"></script>
<script src="js/preloader.js"></script>
<!--common script file-->
<script src="js/main.js"></script>
</body>
</html>
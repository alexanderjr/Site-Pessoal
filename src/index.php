<?php require_once("php/jobs.php"); ?>
<!DOCTYPE html>
<html lang="pt">
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<meta name="description" content="I am fullstack developer, in this site you will find about me, my portfolio and my contact. ">
	<meta name="robots" content="all" />
    <meta name="language" content="pt-br" />
    <meta name="author" content="Alexander Jr" />
    <meta name="email" content="aafonso.93@gmail.com" />
    <meta property="og:title" content="Alexander Jr.">
    <meta property="og:url" content="http://www.alexanderjr.com.br/">
    <meta property="og:type" content="Site">
    <meta property="og:description" content="Fullstack Developer - Development Web Apps">	
    <meta property="og:site_name" content="Alexander Jr.">
	<title>Alexander Jr - Fullstack developer</title>

	<link rel="stylesheet" href="css/style.css">
	<!--/style-->

	<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-38926799-1', 'auto');
      ga('send', 'pageview');

	</script>

</head>
<body>
	
	<div class="modal">
		<span class="close-top">
			<span>X</span>
			<span>esc</span>
		</span>
		<!--/close-top-->
		
		<img src="img/loading.gif" class="loading" alt="Loading">

		<div class="box none">
			<p class="job-title"></p>
			<img src="" alt="" class="image">
			<p>
				<b>Customer: </b> <span class="customer"></span> <br/>
				<b>Date: </b><span class="date"></span> <br/>
				<b>Technologies:</b> <span class="tecnologies"></span>
				<a href="" target="_blank" type="button" class="link-project"><span>Link</span></a>
			</p>
		</div>
		<!--/box-->
	</div>
	<!--modal/-->

	<div class="wrapper">
		
		<div class="overlay"></div>
		
		<h1 class="logo-topo">&lt;/alexanderjr&gt;</h1>

		<nav class="menu" data-show="false">
			<ul>
				<li><a href="#box-about-me">About</a></li>
				<li><a href="#box-portfolio">Portfolio</a></li>
				<li><a href="#box-latest-jobs">Work</a></li>
				<li><a href="#box-contact">Contact</a></li>
			</ul>


		</nav>
		<!--/menu-->
		
		<span class="menu-mobile"><span></span><span></span><span></span></span>

		<div class="logo">
			<h1 class="name">fullstack developer</h1>
			<h3 class="job">living in são vicente - Brazil</h3>
			<a rel="nofollow" href="https://br.linkedin.com/in/alexander-jr-88205542" target="_blank" class="fa fa-linkedin" aria-hidden="true"></a>
			<a rel="nofollow" href="https://github.com/alexanderjr" target="_blank" class="fa fa-github" aria-hidden="true"></a>
			<a rel="nofollow" href="https://medium.com/@alexanderjr" target="_blank" class="fa fa-medium" aria-hidden="true"></a>
			<a rel="nofollow" href="mailto:aafonso.93@gmail.com?subject=Contato via Site" target="_blank" class="fa fa-envelope-o" aria-hidden="true"></a>
			<a href="#box-about-me" class="read-more"><span>▼</span></a>
		</div>
		<!--/logo-->

	</div>
	<!--/wrapper-->

	<main class="main">
		
		<section class="box-about-me" id="box-about-me">
			<h2 class="title">Who I am =)</h2>
			<!-- <img src="https://media.licdn.com/mpr/mpr/shrinknp_400_400/p/1/000/1d3/037/1b240eb.jpg" alt="" class="photo"> -->
			<p>
				My name is Alexander and I started working with internet in 2010 when I studied  technical course about developing web apps.
				Since 2011, I am working in Agencies focusing digital marketing making websites, hotsites, web apps by tailor made.
				<br><br>
				I am graduated in Information Systems at the Santa Cecília University located in Santos and actually I am working in a company named as Agencia Manga.
			</p>
			
			<p>
				For more details, this is link for my <a href="https://br.linkedin.com/in/alexander-jr-88205542" target="_blank" class="linkedin">linkedin profile</a>.
			</p>

		</section>
		<!--/box-about-me-->

		<?php if (count($jobs) > 0): ?>

		<section class="box-portfolio" id="box-portfolio">
			<h2 class="title">Portfolio</h2>
			
			<?php foreach ($jobs as $customer => $obj): ?>
					
				<div class="jobs" data-date="<?php echo $obj["date"]; ?>" data-customer="<?php echo $obj["customer"]; ?>" data-title="<?php echo $customer; ?>" data-tecnologies="<?php echo $obj["tecnologies"]; ?>" data-image="<?php echo $path_full.$obj["image"]; ?>" data-url="<?php echo $obj["url"]; ?>">
					<?php if (!empty($obj["image"])): ?>
						<img data-src="<?php echo $path_thumb.$obj["image"]; ?>" alt="<?php echo $customer; ?>">
					<?php endif ?>

					<div class="shadow">
						<h3><?php echo $customer; ?></h3>
						<span class="tecnologies"><?php echo $obj["description"]; ?></span>
						<span class="more">+</span>
					</div>
				</div>
			
			<?php endforeach ?>	
			
			
		</section>
		<!--/box-portfolio-->
		<?php endif ?>
	
		<?php if (count($companies) > 0): ?>
		<section class="box-latest-jobs" id="box-latest-jobs">
			<h2 class="title">Work</h2>
			
			<ul class="my-works">
			<?php foreach ($companies as $company => $obj): ?>
				<li>
					<div class="image">
						<img src="img/content/<?php echo $obj["image"]; ?>" alt="<?php echo $company; ?>">
					</div>
					<!--/image-->

					<div class="description">
						<h3 class="title-work"><?php echo $company; ?></h3>
						<span class="job"><?php echo $obj["job"]; ?></span>
						<span class="period"><?php echo $obj["time"]; ?></span>
						<p>
							<?php echo $obj["job_description"]; ?>
						</p>
					</div>
					<!--/description-->
				</li>
				<?php endforeach ?>	
				
			</ul>

		</section>
		<!--/box-latest-jobs-->
		<?php endif ?>

		<section class="box-contact" id="box-contact">
			<h2 class="title">Contact</h2>
			<p>
				My email: <a href="mailto:aafonso.93@gmail.com?subject=Contato via Site">aafonso.93@gmail.com</a> 
				or linkedin profile <a href="https://br.linkedin.com/in/alexander-jr-88205542" target="_blank" class="linkedin">Linkedin</a>.
			</p>
		</section>
		<!--/box-contact-->

	</main>
	<!--/main-->
	
	
	<script src="js/main.js" inline></script>

</body>
</html>
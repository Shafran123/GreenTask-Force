<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Green Task Force</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,500,600" rel="stylesheet">
		<!--
		CSS
		============================================= -->
		<link rel="stylesheet" href="/welcome/css/linearicons.css">
		<link rel="stylesheet" href="/welcome/css/owl.carousel.css">
		<link rel="stylesheet" href="/welcome/css/font-awesome.min.css">
		<link rel="stylesheet" href="/welcome/css/animate.css">
		<link rel="stylesheet" href="/welcome/css/bootstrap.css">
		<link rel="stylesheet" href="/welcome/css/main.css">
	</head>
	<body>
		<div id="top"></div>
		<!-- Start Header Area -->
		<header class="default-header">
			<div class="sticky-header">
				<div class="container">
					<div class="header-content d-flex justify-content-between align-items-center">
						<div class="logo">
							<a href="#top" class="smooth"><img src="/welcome/img/logo1.png" alt=""></a>
						</div>
						<div class="right-bar d-flex align-items-center">
							<nav class="d-flex align-items-center">
								<ul class="main-menu">
									<li><a href="#top">Home</a></li>
									<li><a href="#services">How?</a></li>
									<li><a href="#team">Team</a></li>					
									<li><a href="#contact">Contact</a></li>
								</ul>
								<a href="#" class="mobile-btn"><span class="lnr lnr-menu"></span></a>
							</nav>
							<div class="search relative">
								<span class="lnr lnr-magnifier"></span>
								<form action="#" class="search-field">
									<input type="text" placeholder="Search here" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search here'">
									<button class="search-submit"><span class="lnr lnr-magnifier"></span></button>
								</form>
							</div>
							<div class="header-social d-flex align-items-center">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- End Header Area -->
        <!-- Start Banner Area -->
        @if (Route::has('login'))
		<section class="banner-area relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row fullscreen justify-content-center align-items-center">
					<div class="col-lg-8">
                  
						<div class="banner-content text-center">
                        <div class="login100-pic js-tilt" data-tilt>
                            <img src="/welcome/img/img-02.png" alt="IMG">
                        </div>
							<p class="text-uppercase text-white">Colombo Municiple Counsil</p>
                            <h1 class="text-uppercase text-white">GREEN TASK FORCE</h1>
                            @auth
                            <a href="{{ url('/home') }}" class="primary-btn banner-btn">Home</a>
                            @else
                            <a href="{{ route('login') }}" class="primary-btn banner-btn">Login As GTF Member</a>
                            @if (Route::has('register'))

                            <a href="{{ route('register') }}" class="primary-btn banner-btn">Register As GTF Member</a><br>
                            @endif
                    @endauth
                    
                        </div>
                     
					</div>
				</div>
			</div>
        </section>
        @endif
		<!-- End Banner Area -->
		
		<!-- Start Product Area -->
		<section id="services" class="title-bg section-full">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="product-area-title text-center">
							<p class="text-white text-uppercase">How Green Task Force Works</p>
							<h2 class="text-white h1">We Belive In You Public Can <br>  Help Us To Make Colombo Better Place</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-6">
						<div class="single-product">
							<div class="icon">
								<span class="lnr lnr-pencil"></span>
							</div>
							<div class="desc">
								<h4>Post Report</h4>
								<p>Send Us Repors Where Garbage is </p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="single-product">
							<div class="icon">
								<span class="lnr lnr-hourglass"></span>
							</div>
							<div class="desc">
								<h4>Wait For Approval</h4>
								<p>Our Green Captains Will Review Your Report</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="single-product">
							<div class="icon">
								<span class="lnr lnr-rocket"></span>
							</div>
							<div class="desc">
								<h4>Immideiate Service</h4>
								<p>After Aproval We have our staff ready to clean your area </p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="single-product">
							<div class="icon">
								<span class="lnr lnr-leaf"></span>
							</div>
							<div class="desc">
								<h4>Clean Colombo</h4>
								<p>This makes our colombo clean and better</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Product Area -->
	

		<!-- Start Digital Studio -->
		<section class="section-full studio-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="studio-content">
							<p class="text-uppercase text-white">Your Woriking At CMC</p>
							<h2 class="h1 text-white text-uppercase mb-20">Administrative <br> Section</h2>
							<p class="text-white mb-30">Our Adiminstrative section provide separate login for each staff  and green captian.</p>
                            <a href="{{ url('/staff/login') }}" class="primary-btn text-white d-inline-flex align-items-center">Login As Staff<span class="lnr lnr-arrow-right"></span></a>
                            <a href="{{ url('/greencaptain/login') }}" class="primary-btn text-white d-inline-flex align-items-center">Login As Green Captain<span class="lnr lnr-arrow-right"></span></a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Digital Studio -->
	
		
		<!-- Start Publish Area -->
		<section id="blog" class="section-full">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="product-area-title text-center">
							<p class="text-uppercase">Latest From Blog</p>
							<h2 class="h1">Latest News Letters <br>Green Task Force</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="single-publish">
							<img src="img/p1.jpg" class="img-fluid" alt="">
							<div class="top">
								<div class="mb-15 d-flex">
									<a href="#">25 October, 2017</a>
									<span class="line">|</span>
									<a href="#">By Mark Wiens</a>
								</div>
								<h6 class="text-uppercase"><a href="#">Addiction When Gambling Becomes A Problem</a></h6>
							</div>
							<p class="mb-30">Computers have become ubiquitous in almost every facet of our lives. At work, desk jockeys spend hours in front of their </p>
							<a href="#" class="details-btn d-flex justify-content-center align-items-center"><span class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="single-publish">
							<img src="img/p2.jpg" class="img-fluid" alt="">
							<div class="top">
								<div class="mb-15 d-flex">
									<a href="#">25 October, 2017</a>
									<span class="line">|</span>
									<a href="#">By Mark Wiens</a>
								</div>
								<h6 class="text-uppercase"><a href="#">Computer Hardware Desktops And Notebooks </a></h6>
							</div>
							<p class="mb-30">Ah, the technical interview. Nothing like it. Not only does it cause anxiety, but it causes anxiety for several different reasons. </p>
							<a href="#" class="details-btn d-flex justify-content-center align-items-center"><span class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="single-publish">
							<img src="img/p3.jpg" class="img-fluid" alt="">
							<div class="top">
								<div class="mb-15 d-flex">
									<a href="#">25 October, 2017</a>
									<span class="line">|</span>
									<a href="#">By Mark Wiens</a>
								</div>
								<h6 class="text-uppercase"><a href="#">Make Myspace Your Best Designed Space</a></h6>
							</div>
							<p class="mb-30">Plantronics with its GN Netcom wireless headset creates the next generation of wireless headset and other products such as wireless </p>
							<a href="#" class="details-btn d-flex justify-content-center align-items-center"><span class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="single-publish">
							<img src="img/p4.jpg" class="img-fluid" alt="">
							<div class="top">
								<div class="mb-15 d-flex">
									<a href="#">25 October, 2017</a>
									<span class="line">|</span>
									<a href="#">By Mark Wiens</a>
								</div>
								<h6 class="text-uppercase"><a href="#">Video Games Playing With Imagination</a></h6>
							</div>
							<p class="mb-30">About 64% of all on-line teens say that do things online that they wouldn’t want their parents to know about.   11% of all adult internet </p>
							<a href="#" class="details-btn d-flex justify-content-center align-items-center"><span class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Publish Area -->
		<!-- Start Contact Area -->
		<section id="contact" class="section-full gray-bg">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="product-area-title text-center">
							<p class="text-uppercase">Contact Us</p>
							<h2 class="h1">Feel Free to Tell Us waht we<br> want to be improve</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 mt-30">
						<p>We Strongly Belivie in you.Tell Us What we want to be improve to make our colombo better.If You have Comapalins Please Contact us We are here to serve you</p>
						<div class="row">
							<div class="col-sm-6">
								<div class="address mt-20">
									<h6 class="text-uppercase mb-15">Physical Address</h6>
									<p>Colombo Municiple Counsil,<br> Town Hall,Colombo 07.    <br> Srilanka</p>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="address mt-20">
									<h6 class="text-uppercase mb-15">WEb Contact</h6>
									<a href="tel:0000">(011) 2684290</a> <br>
									<a href="tel:0000">(011) 2684290</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 mt-30">
						<form id="myForm" action="mail.php" method="post" class="contact-form">
							<div class="single-input color-2 mb-10">
								<input type="text" name="fname" placeholder="Full Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Name'" required>
							</div>
							<div class="single-input color-2 mb-10">
								<input type="email" name="email" placeholder="Email Address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'" required>
							</div>
							<div class="single-input color-2 mb-10">
								<input type="text" name="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'" required>
							</div>

							<div class="single-input color-2 mb-10">
								<textarea name="message" placeholder="Type your message here..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Type your message here...'" required></textarea>
							</div>
							<div class="d-flex justify-content-end"><button class="mt-10 primary-btn d-inline-flex text-uppercase align-items-center">Send Message<span class="lnr lnr-arrow-right"></span></button></div>
							<div class="alert"></div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- End Contact Area -->
		<footer class="section-full">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-sm-6">
						<div class="single-footer-widget">
							<h6 class="text-white text-uppercase mb-20">About Agency</h6>
							<p>The world has become so fast paced that people don’t want to stand by reading a page of information, they would much rather look at a presentation and understand the message. It has come to a point </p>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="single-footer-widget">
							<h6 class="text-white text-uppercase mb-20">Navigation Links</h6>
							<div class="d-flex">
								<ul class="footer-nav">
									<li><a href="#">Home</a></li>
									<li><a href="#">Features</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">Portfolio</a></li>
								</ul>
								<ul class="ml-30 footer-nav">
									<li><a href="#">Team</a></li>
									<li><a href="#">Pricing</a></li>
									<li><a href="#">Blog</a></li>
									<li><a href="#">Contact</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="single-footer-widget">
							<h6 class="text-white text-uppercase mb-20">Newsletter</h6>
							<p>For business professionals caught between high OEM price and mediocre print and graphic output,</p>
							<div id="mc_embed_signup">
								<form target="_blank" novalidate action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&id=92a4423d01" method="get" class="subscription relative d-flex justify-content-center">
									<input type="email" name="EMAIL" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required>
									<div style="position: absolute; left: -5000px;">
										<input type="text" name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="">
									</div>
									<button type="submit" class="newsletter-btn" name="subscribe"><span class="lnr lnr-location"></span></button>
									<div class="info"></div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="single-footer-widget">
							<h6 class="text-white text-uppercase mb-20">Instafeed</h6>
							<ul class="instafeed d-flex flex-wrap">
								<li><img src="img/i1.jpg" alt=""></li>
								<li><img src="img/i2.jpg" alt=""></li>
								<li><img src="img/i3.jpg" alt=""></li>
								<li><img src="img/i4.jpg" alt=""></li>
								<li><img src="img/i5.jpg" alt=""></li>
								<li><img src="img/i6.jpg" alt=""></li>
								<li><img src="img/i7.jpg" alt=""></li>
								<li><img src="img/i8.jpg" alt=""></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="footer-bottom d-flex justify-content-between align-items-center">
					<p class="footer-text m-0">Copyright &copy; 2017  |  All rights reserved to <a href="#">Datarc inc.</a> Designed by <a href="https://colorlib.com/wp">Colorlib</a>.</p>
					<div class="footer-social d-flex align-items-center">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-dribbble"></i></a>
						<a href="#"><i class="fa fa-behance"></i></a>
					</div>
				</div>
			</div>
		</footer>

		<script src="/welcome/js/vendor/jquery-2.2.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="/welcome/js/vendor/bootstrap.min.js"></script>
		<script src="/welcome/js/jquery.ajaxchimp.min.js"></script>
		<script src="/welcome/js/jquery.sticky.js"></script>
		<script src="/welcome/js/owl.carousel.min.js"></script>
		<script src="/welcome/js/mixitup.min.js"></script>
		<script src="/welcome/js/main.js"></script>
    
            <script src="/login/vendor/tilt/tilt.jquery.min.js"></script>
            <script >
                $('.js-tilt').tilt({
                    scale: 1.1
                })
            </script>
    
    </body>

    
</html>

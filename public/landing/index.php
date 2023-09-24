<?php 
    session_start(); 
    $statusMsg = !empty($_SESSION['msg'])?$_SESSION['msg']:'';
    unset($_SESSION['msg']);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<title>WallWood Landing Page</title>
	<meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <link rel="icon" href="img/Group 122216.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" async href="build/styles.css?<?= filemtime('build/styles.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
    <link rel="stylesheet" href="css/ouibounce.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <meta name="theme-color" content="#1C1C20">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">


    <link rel="stylesheet" href="bower_components/owl.carousel/dist/assets/owl.carousel.min.css"><!-- Global site tag (gtag.js) - Google Analytics -->
    <style>
.testimonial_editable {
	background: rgba(187, 172, 120, 0.279);
	text-align: center;
	padding: 4% 0px 2%;
}
.testimonial_editable p {
	width: 80%;
	font-size: 20px;
	font-weight: 400;
	font-style: italic;
	margin: 20px auto 0px;
}
.testimonial_editable h4 {
	font-family: 'Bodoni 72';
	margin-top: 20px;
}
.testimonial_editable h6 {
	opacity: .6;
	font-weight: bold;
}
.testimonial_editable .owl-carousel img {
	width: 100px;
	margin: 0 auto;
}</style>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-88061472-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-88061472-1');
    </script>    
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window,document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
     fbq('init', '481684529283248'); 
    fbq('track', 'PageView');
    </script>
    <noscript>
     <img height="1" width="1" 
    src="https://www.facebook.com/tr?id=481684529283248&ev=PageView
    &noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
</head>

<body>
    <div id="hideMe">
        <?php echo $statusMsg; ?>
    </div>  
    <div class="wrap" id="home_cover">
        <div class="bg"></div>
        <div class="navigation_top">
            <div class="row">
                <div class="col-md-6">
                    <a href="https://www.wallwood.ae" target="_blank"><img src="img/Wallwood Capital Management DMCC logo.svg" alt="EmiratesGraphic"></a>
                </div>
            </div>
            <div class="container-fluid top_main_sction">
                <div class="row">
                    <div class="col-md-7" data-aos="fade-up" data-aos-offset="200" data-aos-duration="500">
                        <h3>Let your money <br>work for you</h3>
                        <p class="text_left_top">
                        <span>Get a targeted 8.5% annual return on investment with Wallwood</p>
                    </div>
                    <div class="col-md-4">
                        <div class="contact_card">
                            <h5 style="margin-bottom: 10px;">Contact Us</h5>
                            <h4 style="font-weight: 600;">Send us a Message</h4>
                            <p>Please enter your details so we can contact you back.</p> 
        		            <form name="sentMessage" id="contactForm">
                                <input type="text" name="fname" placeholder="Name" required>
                                <input type="text" name="email" placeholder="Email" required>
                                <input type="text" placeholder="Phone Number" name="fnumber">
                                <button type="submit" name="submit" class="default_button" value="Become a Friend" style="margin-top: 15px;">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="logo_section_1">
        <div class="container">
            <h2>Private Equity with a focus on Capital Management</h2>
            <p>Regulated in the UK by the FCA and in the UAE by the DMCC</p>
            <div class="row">
                <img src="img/image002.png" alt="">
                <img src="img/asset-1.png" alt="">
                <img src="img/image002.png" alt="">
                <img src="img/asset-1.png" alt="">
            </div>
        </div>
    </div>

    <section class="first_section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4 data-aos="fade-up" data-aos-offset="200" data-aos-duration="500">Wallwood Capital Management</h4>
                </div>
                <div class="col-md-8">
                    <p data-aos="fade-up" data-aos-offset="250" data-aos-duration="600" data-aos-anchor-placement="bottom-bottom">The benefits of investing with Wallwood Capital Management.</p>
                </div>
            </div>
            <div class="row nd_row_a">
                <div class="card_glass hvr-sweep-to-top" data-aos="fade-up"  data-aos-offset="220" data-aos-duration="700">
                    <img src="img/target.png" alt="">
                    <h3>8.5% targeted annual return</h3>
                    <p>The best long-term performance of any major asset class. We deliver the necessary returns to make your money work for you and build financial stability. </p>
                </div>
                <div class="card_glass hvr-sweep-to-top" data-aos="fade-up"  data-aos-offset="230" data-aos-duration="800">
                    <img src="img/balance.png" alt="">
                    <h3>Balanced and diverse portfolio of investments</h3>
                    <p>We reduce and mitigate risk through a diversified and balanced portfolio backed by real assets that are resistant to changes in the economic climate.</p>
                </div>
                <div class="card_glass hvr-sweep-to-top" data-aos="fade-up"  data-aos-offset="240" data-aos-duration="700">
                    <img src="img/discount.png" alt="">
                    <h3>Liquidity and cash buffers</h3>
                    <p>We understand that sometimes clients might need their money back on short notice and we keep enough liquidity to ensure that clients can always make redemptions.</p>
                </div>
                <div class="card_glass hvr-sweep-to-top" data-aos="fade-up"  data-aos-offset="250" data-aos-duration="800">
                    <img src="img/money.png" alt="">
                    <h3>No lock-up period</h3>
                    <p>We have no obligations when it comes to the term of your investment. No need to fear the unexpected when you have full freedom of redeeming your money. </p>
                </div>  
                <div class="card_glass hvr-sweep-to-top" data-aos="fade-up"  data-aos-offset="250" data-aos-duration="700">
                    <img src="img/growth.png" alt="">
                    <h3>Eligible for ISA and SIPP/QROPS</h3>
                    <p>Invest using your ISA and SIPP/QROPS without residing in the UK and benefit from the increased returns and tax exemptions.</p>
                </div>
                <div class="card_glass hvr-sweep-to-top" data-aos="fade-up"  data-aos-offset="250" data-aos-duration="800">
                    <img src="img/team.png" alt="">
                    <h3>Experienced team</h3>
                    <p>Our team has over 40 years of combined experience in financial investment and is ready to apply it to making your money multiply</p>
                </div>              
            </div>
        </div>
    </section>
    
    <section class="testimonial_editable">
	<div class="container-fluid">
		<div class="row">			
			<div class="owl-carousel owl-theme testimonial-carousel">
				<div class="testimonial_card_slide">
				<img src="img/691564522981.png">
				<p>Sophia is a well experiended Finance professional equipped with business acumen. From the first moment there was trust between us, hence I was sure she is the perfect choice for dealing with my finances. I do recommend to anyone who wants to have a peace of mind money wise!</p>
				<h4>Dr Eva Wuellner</h4>
				<h6>Practice Group Leader MEA at SpenglerFox</h6>
				</div>
				<div class="testimonial_card_slide">
				<img src="img/691564522806.png">
				<p>I’ve worked with Sophia over the last couple of years, and have referred mutual clients to her. She is very thorough, polite, professional and a pleasure to work with.</p>
				<h4>Eyeedul Haque</h4>
				<h6>Founder, My Property Consultant</h6>
				</div>
				<div class="testimonial_card_slide">
				<img src="img/691564522742.png">
				<p>Working for Sophia is a real joy.<br>
Through personal and professional attention I have developed a great deal under Sophia's leadership and management. <br>
I know that Sophia can always find time with her busy schedule to help me with my matters. This is just one of the ways the new team that Sophia is putting together is expanding and growing the business.</p>
				<h4>Gordon Pearce</h4>
				<h6>Aircraft Sales Executive at AXON Aviation Groupx</h6>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="membership_section">
    <div class="container-fluid">
        <h2 c;ass="wow fadeInUp" data-wow-delay="0.2s">Meet The Middle East Team</h2>
				<hr class="hr_default" style="margin: 0px auto 60px;">
        <div class="row">
            <div class="member_card wow fadeInUp" data-aos="fade-up"  data-aos-offset="290" data-aos-duration="400">
			<a href="http://wallwood.ae/member/24/kenneth-james-campbell"><img src="img/761555582262.jpg">
                <div class="member_text">
                    <h6>Kenneth James Campbell</h6>
                    <p>Founding Partner</p>  
                </div></a>
            </div>
            <div class="member_card wow fadeInUp" data-aos="fade-up"  data-aos-offset="290" data-aos-duration="500">
			<a href="http://www.wallwood.ae/member/56/sophia-bhatti"><img src="../img/manjakos/1931565159912.png">
                <div class="member_text">
                    <h6>Sophia Bhatti</h6>
                    <p>Senior Partner</p>  
                </div></a>
            </div>
            <!-- <div class="member_card wow fadeInUp" data-aos="fade-up"  data-aos-offset="290" data-aos-duration="600">
			<a href="http://wallwood.ae/member/26/stephanie-estlick"><img src="img/861555582232.jpg">
                <div class="member_text">
                    <h6>Stephanie Estlick</h6>
                    <p>Manager</p>  
                </div></a>
            </div> -->
        </div>
    </div>
</section>


<section class="meqik" style="background: white;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 text-center">
                <img src="img/NicePng_businessman-png_77391.png" alt="" class="img-fluid">
            </div>
            <div class="col-md-5 about_text">
                <img src="img/Group 1015.png" alt="">
                <h2>Wallwood Capital Management LLC provides investment services designed to assist our clients in achieving their financial objectives.</h2>
                <div class="row">
                    <div class="col-md-6">
                        <h5 style="margin-bottom: 0px;">Founding Partner,</h5>
                        <h6 style="font-weight:600;">Kenny Campbell</h6>
                    </div>
                    <div class="col-md-6">
                        <img src="img/ec862120-9e8a-4573-99b1-e2608c2275f3.jfif" alt="" style="width: 220px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="footer_all_pages">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<img src="/img/Wallwood Capital Management DMCC logo.svg">
				<p>Wallwood Capital Management Limited (DMCC Branch) is a representative office of Wallwood Capital Management Limited, who are authorised and regulated by the Financial Conduct Authority, Registration No. <a href="https://register.fca.org.uk/ShPo_FirmDetailsPage?id=001b000000MfI2RAAV" target="_blank" style="color: #fff; border-bottom: solid 1px white;">190011.</a></p>
			</div>
			<div class="col-md-3">
				<h2>Quick Links</h2>	
				<hr class="hr_default">
				<ul class="footer_list">
					<li>
						<a href="http://www.wallwood.ae/home"><p class="underline_hover_links">Home</p></a>
					</li>
					<li>
						<a href="http://www.wallwood.ae/about-us"><p class="underline_hover_links">About Us</p></a>
					</li>
					<li>
						<a href="http://www.wallwood.ae/our-team"><p class="underline_hover_links">Meet the Team</p></a>
					</li>
					<li>
						<a href="http://www.wallwood.ae/products"><p class="underline_hover_links">Our Product</p></a>
					</li>
					<li>
						<a href="http://www.wallwood.ae/client-support"><p class="underline_hover_links">Client Support</p></a>
					</li>
					<li>
						<a href="http://www.wallwood.ae/contact"><p class="underline_hover_links">Contact Us</p></a>
					</li>
				</ul>	
			</div>
			<div class="col-md-3">
				<h2>Contact Us</h2>
				<hr class="hr_default">
				<p>Wallwood Capital Management<br>
				Level 54, Almas Tower<br>
				JLT, Dubai<br>
				United Arab Emirates
				</p>
			</div>
			<div class="col-md-3 social_in_footer">
				<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        		<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        		<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        		<a href="http://www.emiratesgraphic.com/"><p class="#">2019 Copyrighted by <span class="hvr-underline-reveal">Emirates Graphic</span></p></a>
			</div>
		</div>
	</div>
</footer>

<section class="top_header">
    <div id="hideMe">
        <?php echo $statusMsg; ?>
    </div>  
</section>

<!-- --------------------------------- -->

<script src="js/jquery.min.js"></script>
<script src="js/notify.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rellax/1.7.1/rellax.min.js"></script> 
<script src="build/second_scripts.min.js"></script>
<script src="bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="js/ouibounce.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="js/parallax.min.js"></script>
<script>
AOS.init();
</script>
<script>
var lFollowX = 0,
    lFollowY = 0,
    x = 0,
    y = 0,
    friction = 1 / 30;

function moveBackground() {
  x += (lFollowX - x) * friction;
  y += (lFollowY - y) * friction;
  
  translate = 'translate(' + x + 'px, ' + y + 'px) scale(1.07)';

  $('.bg').css({
    '-webit-transform': translate,
    '-moz-transform': translate,
    'transform': translate
  });

  window.requestAnimationFrame(moveBackground);
}

$(window).on('mousemove click', function(e) {

  var lMouseX = Math.max(-100, Math.min(100, $(window).width() / 2 - e.clientX));
  var lMouseY = Math.max(-100, Math.min(100, $(window).height() / 2 - e.clientY));
  lFollowX = (20 * lMouseX) / 200; // 100 : 12 = lMouxeX : lFollow
  lFollowY = (15 * lMouseY) / 100;

});

moveBackground();


$("#contactForm").submit(function(e) {
var url = "mailer.php"; // the script where you handle the form input
$.ajax({
    type: "POST",
    url: url,
    data: $("#contactForm").serialize(), // serializes the form's elements.
    success: function(data)
    {
        $.notify(data, "success");
        document.getElementById("contactForm").reset();
    }
    });
e.preventDefault(); // avoid to execute the actual submit of the form.
});

$(document).ready(function(){
    $(".hide").click(function(){
        $(".unviz_btn").hide();
    });
    $("#show").click(function(){
        $(".vic_btn").show();
    });
});

  var owl = $('.testimonial-carousel');
    owl.owlCarousel({
      items:3,
      loop:true,
      margin:10,
      center: false,
      dots: true,
      autoplay:true,
      autoplayTimeout:5000,
      autoplayHoverPause:true,
      responsive:{
      0:{
          items:1,
          nav:true
      },
      600:{
          items:1,
      },
      1000:{
          items:1,
      }
    }
  });
</script>

</body>
</html>
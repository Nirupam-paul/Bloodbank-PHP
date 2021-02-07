<?php 
	include('header.php');
	
# Total Registration
$sql_registration = "SELECT * FROM registration";
$res_registration = mysqli_query($con,$sql_registration);
$res_reg_count = mysqli_num_rows($res_registration);

# Total Camps
$sql_camps = "SELECT * FROM camps";
$res_camps = mysqli_query($con,$sql_camps);
$res_camps_count = mysqli_num_rows($res_camps);

# Total Blood Request
$sql_blood_req = "SELECT * FROM request";
$res_blood_req = mysqli_query($con,$sql_blood_req);
$res_blood_req_count = mysqli_num_rows($res_blood_req);

# Total Blood Donation
$sql_blood_dona = "SELECT * FROM donation";
$res_blood_dona = mysqli_query($con,$sql_blood_dona);
$res_blood_dona_count = mysqli_num_rows($res_blood_dona);


?>

<!-- HERO-1============================================= -->
    <section id="hero-1" class="bg-fixed hero-section division">
        <div class="container">						
            <div class="row d-flex align-items-center">
                <!-- HERO TEXT -->
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <div class="hero-txt mb-40">
                        <h3 class="h3-sm steelblue-color"  >COSTS NOTHING, SAVES LIFE</h3>
                        <h4 class="steelblue-color mt-4" >DONAR OF TODAY MAY RECIPIENTS OF TOMORROW </h4>		
                    </div>
                </div>
                <div class="col-md-4 col-lg-5 col-xl-6">	
					<div class="hero-1-img text-center">				
						<img class="img-fluid" src="images/blood-donor-logo1.png" alt="hero-image">
                    </div>
				</div>
            </div>    
        </div>     
    </section>

<section id="about-5" class="pt-100 about-section division">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6">
                <div class="about-img text-center wow fadeInUp" data-wow-delay="0.6s">
                    <img class="img-fluid" src="images/images-image-02.png" alt="about-image">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="txt-block pc-30 wow fadeInUp" data-wow-delay="0.4s">
                    <span class="section-id blue-color">Welcome to Life Saver</span>
                    <p style="text-align: justify;">Blood is universally recognized as the most precious element that sustains life. It saves innumerable lives across the world in a variety of conditions. The need for blood is great - on any given day, approximately 39,000 units of Red Blood Cells are needed. More than 29 million units of blood components are transfused every year.</p>
                    <p style="text-align: justify;">Donate Blood <br>
                        Despite the increase in the number of donors, blood remains in short supply during emergencies, mainly attributed to the lack of information and accessibility.<br>	We positively believe this tool can overcome most of these challenges by effectively connecting the blood donors with the blood recipients.
                    </p>
                </div>
            </div>
            	<!-- END TEXT BLOCK -->	
        </div>    <!-- End row -->
    </div>	   <!-- End container -->
</section><!-- END ABOUT-5 -->


<!-- STATISTIC-2============================================= -->
<div id="statistic-1" class="bg-scroll statistic-section division">
	<div class="container white-color">
        <span class="section-id text-center">Statistics</span>
			<div class="row">
                <!-- STATISTIC BLOCK #1 -->
				<div class="col-md-6 col-lg-3">					
					<div class="statistic-block icon-sm wow fadeInUp" data-wow-delay="0.4s">
                        <!-- Icon  -->
						<span class="flaticon-016-doctor-1"></span>
                            <!-- Text -->
							<h5 class="statistic-number"><span class="count-element"><?php echo $res_reg_count ?></span></h5>
							<p class="txt-400">Total Registered Users</p>																			
													
					</div>								
				</div>
                <!-- STATISTIC BLOCK #2 -->
				<div class="col-md-6 col-lg-3">								
					<div class="statistic-block icon-sm wow fadeInUp" data-wow-delay="0.6s">
                        <!-- Icon  -->
						<span class="flaticon-129-hospital-1 "></span>
                            <!-- Text -->
							<h5 class="statistic-number"><span class="count-element"><?php echo $res_camps_count ?></span></h5>	
							<p class="txt-400">Total Camps organised</p>										
					</div>							
                </div>
            	<!-- STATISTIC BLOCK #3 -->
				<div class="col-md-6 col-lg-3">						
					<div class="statistic-block icon-sm wow fadeInUp" data-wow-delay="0.8s">	
                        <!-- Icon  -->
							<span class="flaticon-013-blood-donation-2 "></span>
							<!-- Text -->
							<h5 class="statistic-number"><span class="count-element"><?php echo $res_blood_req_count ?></span></h5>
							<p class="txt-400">Total Blood Requests</p>									
							</div>						
						</div>
				<!-- STATISTIC BLOCK #4 -->
				<div class="col-md-6 col-lg-3">						
					<div class="statistic-block icon-sm wow fadeInUp" data-wow-delay="1s">	
                        <!-- Icon  -->
						<span class="flaticon-015-blood-donation-1 "></span>
                        <!-- Text -->	
							<h5 class="statistic-number"><span class="count-element"><?php echo $res_blood_dona_count ?></span></h5>
							<p class="txt-400">Total Blood Donation</p>		
					</div>						
				</div>
            </div>  <!-- End row -->
		</div>	 <!-- End container -->		
    </div>	 <!-- END STATISTIC-2 -->
    
    <div id="gallery-1" class="gallery-section division">	
		<div class="container">
            <br>
            <br>
			<div class="row">	
				<div class="col-lg-10 offset-lg-1 section-title">
					<h3 class="h3-md steelblue-color">GALLERY</h3>	
                </div> 
			</div>
		</div>
		<div class="row gallery-items-list">		
			<div class="col-md-6 col-lg-3 gallery-item">
				<div class="hover-overlay"> 
					<img class="img-fluid" src="images/donar-1.jpeg" alt="gallery-image">			
				</div>
			</div>
            <div class="col-md-6 col-lg-3 gallery-item">
				<div class="hover-overlay"> 
					<img class="img-fluid" src="images/donar-2.jpeg" alt="gallery-image">			
				</div>
			</div>
            <div class="col-md-6 col-lg-3 gallery-item">
				<div class="hover-overlay"> 
					<img class="img-fluid" src="images/donar-3.jpeg" alt="gallery-image">			
				</div>
			</div>
            <div class="col-md-6 col-lg-3 gallery-item">
				<div class="hover-overlay"> 
					<img class="img-fluid" src="images/donar-5.jpeg" alt="gallery-image">			
				</div>
			</div>
            <div class="col-md-6 col-lg-3 gallery-item">
				<div class="hover-overlay"> 
					<img class="img-fluid" src="images/donar-4.jpeg" alt="gallery-image">			
				</div>
			</div>
            <div class="col-md-6 col-lg-3 gallery-item">
				<div class="hover-overlay"> 
					<img class="img-fluid" src="images/donar-6.jpeg" alt="gallery-image">			
				</div>
			</div>
            <div class="col-md-6 col-lg-3 gallery-item">
				<div class="hover-overlay"> 
					<img class="img-fluid" src="images/donar-7.jpeg" alt="gallery-image">			
				</div>
			</div>
            <div class="col-md-6 col-lg-3 gallery-item">
				<div class="hover-overlay"> 
					<img class="img-fluid" src="images/donar-8.jpeg" alt="gallery-image">			
				</div>
			</div>
		</div> 
    </div>	
    


    <section id="blog-1" class="wide-60 blog-section division" style="background-color: #DBF1FF; margin-bottom: -50px;">
    <div class="container">


<!-- SECTION TITLE -->	
<div class="row">	
    <div class="col-lg-10 offset-lg-1 section-title">	

        <!-- Title 	-->	
        <h3 class="h3-md steelblue-color">Latest News</h3>
            
    </div>
</div>
 <div class="row">
     <!-- BLOG POST #1 -->
     <div class="col-lg-4">
         <div class="blog-post wow fadeInUp" data-wow-delay="0.4s">

             <!-- BLOG POST IMAGE -->
             <div class="blog-post-img">
                <img class="img-fluid" src="images/news-5.jpg" alt="blog-post-image"></div>

             <!-- BLOG POST TITLE -->
            <div class="blog-post-txt">

                <!-- Post Title -->
                <h5 class="h5-sm steelblue-color">Collection of blood plasma from patients starts in Assam</h5>

                <!-- Post Data -->
                <span>May 03, 2019</span>

                <!-- Post Text -->
                <p> The first plasma donor is a doctor of GMCH. Assam health minister, Himanta Biswa Sarma tweeted, 
                    “Glad to share that we've started a #PlasmaBank at GMCH. 
                    The first convalescent donor is a doctor himself, a #COVID19 patient. 
                    My gratitude to Dr Lithikesh for donating his plasma, and to the team who is working on this bank. 
                    I encourage cured patients to come forward & donate.”
                </p>

            </div>

        </div>
     </div>	<!-- END  BLOG POST #1 -->


     <!-- BLOG POST #2 -->
     <div class="col-lg-4">
         <div class="blog-post wow fadeInUp" data-wow-delay="0.6s">

             <!-- BLOG POST IMAGE -->
             <div class="blog-post-img">
                <img class="img-fluid" src="images/news-2.jpg" alt="blog-post-image"></div>

             <!-- BLOG POST TEXT -->
            <div class="blog-post-txt">

                <!-- Post Title -->
                <h5 class="h5-sm steelblue-color">Blood type may affect COVID-19 outcomes, study shows</h5>

                <!-- Post Data -->
                <span>Apr 28, 2019</span>

                <!-- Post Text -->
                <p>Blood type may play a key role in determining who contracts COVID-19 and how severe the illness becomes, according to a recent report published in the New England Journal of Medicine (NEJM).“Our genetic data confirm that blood group O is associated with a risk of acquiring Covid-19 that was lower than that in non-O blood groups, whereas blood group A was associated with a higher risk than non-A blood groups,” researchers concluded.
                </p>

            </div>

        </div>
     </div>	<!-- END  BLOG POST #2 -->


     <!-- BLOG POST #3 -->
     <div class="col-lg-4">
         <div class="blog-post wow fadeInUp" data-wow-delay="0.8s">

             <!-- BLOG POST IMAGE -->
             <div class="blog-post-img">
                <img class="img-fluid" src="images/news-4.jpg" alt="blog-post-image"></div>

             <!-- BLOG POST TEXT -->
            <div class="blog-post-txt">

                <!-- Post Title -->
                <h5 class="h5-sm steelblue-color">Doctor Becomes First Donor As Assam Opens Plasma Bank For COVID-19 Treatment</h5>

                <!-- Post Data -->
                <span>Apr 17, 2019</span>

                <!-- Post Text -->
                <p>Amid rise in COVID-19 cases in the state, especially in Guwahati where a total lockdown has been imposed for two weeks, a plasma bank has been started at the Guwahati Medical College (GMC) for collection of blood plasma from patients who have been cured of the disease.
                </p>

            </div>

        </div>
     </div>	<!-- END  BLOG POST #3 -->


</div>	<!-- END BLOG POSTS HOLDER -->


</div>	   <!-- End container -->		
</section>    

<section id="banner-2" class="pt-50 banner-section division"><div class="bg-scroll bg-inner bg-image division">
            <div class="container white-color">
						<div class="row d-flex align-items-center">


							<!-- CALL TO ACTION IMAGE -->
							<div class="col-lg-5">
								<div class="banner-2-img">
									<img class="img-fluid" src="images/images-image-05.png" alt="banner-image"></div>
							</div>


							<!-- BANNER TEXT -->
							<div class="col-lg-6 offset-lg-1">
								<div class="banner-txt pc-30 wow fadeInUp" data-wow-delay="0.4s">

									<!-- Section ID -->	
                                     <span class="section-id id-color text-center">Blood Bank</span>
                                     <h3>Better Technologies for Better Healthcare</h3>
									<p style="text-align: justify;">We welcome you to in our WebSite. If you are a donor , We appreciate you to join our blood donation camp nearest to you. If you need blood we are happy to serve you. Kindly visit our request page hosted by www.lifesaver.com on behalf of "Life Saver Blood Bank". As a public service without any profit motive.This is a free service. While the Organisers have taken all steps to obtain accurate and up-to-date information of potential blood donors, the Organisers and ICM Computers do not guarantee accuracy of the information contained herein or the suitability of the persons listed as any liability for direct or consequential damage to any person using this blood donor list including loss of life or damage due to infection of any nature arising out of blood transfusion from persons whose names have been listed in this website. We request donors to update contact details regularly.
								    </p>

								</div>
							</div>	<!-- END BANNER TEXT -->


						</div>	  <!-- End row -->
					</div>	   <!-- End container -->
				</div>		<!-- End Inner Background -->		
            </section>
            





<?php
    include('footer.php');
?>
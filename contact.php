<?php 
    include('header.php');

    if(isset($_POST['contact_submit'])){
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
        $subject = $_POST['subject'];
        $description = $_POST['message'];
        $sql = "INSERT INTO contact(subject,description,name,phone,email) VALUES('".$subject."','".$description."','".$name."','".$phone."','".$email."')";
        $res = mysqli_query($con,$sql);
        if($res == False){

            echo "<script>alert('Sorry! Something went wrong')</script>";

        }else{
            echo "<script>alert('Successfull! We will contact you soon')</script>";
        }
    }
?>

<section id="contacts-1" class="wide-60 contacts-section division" style="background-color: #DBF1FF;">				
				<div class="container">
					<div class="row">	
						<div class="col-lg-10 offset-lg-1 section-title">
							<h3 class="h3-md steelblue-color">Have a Question? Get In Touch</h3>
								
						</div>
					</div>

						
					<div class="row">	


		 				<!-- CONTACTS INFO -->
		 				<div class="col-md-5 col-lg-4">

		 					<!-- General Information -->
		 					<div class="contact-box mb-40">
								<h5 class="h5-sm steelblue-color">General Information</h5>
								<p>121 King Street, Melbourne,</p> 
								<p>Victoria 3000 Australia</p>
								<p>Phone: +12 9 8765 4321</p>
								<p>Email: <a href="mailto:yourdomain@mail.com" class="blue-color">hello@yourdomain.com</a></p>
		 					</div>

		 					<!-- Patient Experience -->
		 					<div class="contact-box mb-40">
								<h5 class="h5-sm steelblue-color">Patient Experience</h5>
								<p>Hannah Harper - Patient Experience Coordinator</p>
								<p>Phone: +12 9 8765 4321</p>
								<p>Email: <a href="mailto:yourdomain@mail.com" class="blue-color">hello@yourdomain.com</a></p>
		 					</div>

		 					<!-- Working Hours -->
		 					<div class="contact-box mb-40">
								<h5 class="h5-sm steelblue-color">Working Hours</h5>
								<p>Monday – Friday : 8:00 AM - 8:00 PM</p> 
								<p>Saturday : 10:00 AM - 6:00 PM</p>
								<p>Sunday : 10:00 AM - 4:00 PM</p>
		 					</div>

						</div>	<!-- END CONTACTS INFO -->


						<!-- CONTACT FORM -->	
				 		<div class="col-md-7 col-lg-8">
				 			<div class="form-holder mb-40">
				 				<form method="POST" name="contactForm" class="row contact-form">
				                                            
					                <!-- Contact Form Input -->
					                <div id="input-name" class="col-md-12 col-lg-6">
					                	<input type="text" name="name" class="form-control name" placeholder="Enter Your Name*" required> 
					                </div>
					                        
					                <div id="input-email" class="col-md-12 col-lg-6">
					                	<input type="text" name="email" class="form-control email" placeholder="Enter Your Email*" required> 
					                </div>

					                <div id="input-phone" class="col-md-12 col-lg-6">
					                	<input type="tel" name="phone" class="form-control phone" placeholder="Enter Your Phone Number*" required> 
					                </div>	

					                <div id="input-subject" class="col-lg-12">
					                	<input type="text" name="subject" class="form-control subject" placeholder="Subject*" required> 
					                </div>					                          
					                        
					                <div id="input-message" class="col-lg-12 input-message">
					                	<textarea class="form-control message" name="message" rows="6" placeholder="Your Message ..." required></textarea>
					                </div> 
					                                            
					                <!-- Contact Form Button -->
					                <div class="col-lg-12 mt-15 form-btn">  
					                	<button type="submit" name="contact_submit" class="btn btn-blue">Send Your Message</button> 
					                </div>
				                                              
				                </form> 

				 			</div>	
				 		</div> 	<!-- END CONTACT FORM -->	


				 	</div>	<!-- End row -->			  
 

				</div>	   <!-- End container -->		
			</section>
<?php 
    include('footer.php');
?>
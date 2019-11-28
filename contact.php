<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"contact");
?>
 <html>
     <head>
         
     </head>
 <body>
    <form name="form1" action="" method="post">     
  <div class="contact">
		<div class="container">
			<div class="row">

				<!-- Get in touch -->
				<div class="col-lg-8 contact_col">
					<div class="get_in_touch">
						
						<div class="contact_form_container">
							<form name="form1" action="" method="post">
								<div class="row">
									<div class="col-xl-6">
										<!-- Name -->
										<label for="contact_name">First Name</label>
										<input type="text" id="contact_name" class="contact_input" name="t1" required="required">
									</div>
									<div class="col-xl-6 last_name_col">
										<!-- Last Name -->
										<label for="contact_last_name">Last Name</label>
										<input type="text" id="contact_last_name" class="contact_input" name="t2" required="required">
									</div>
								</div>
								<div>
									<!-- Subject -->
									<label for="contact_company">E-mail</label>
									<input type="email" id="contact_company" class="contact_input" name="t3">
								</div>
								
								<div>
									<label for="contact_textarea">Message</label>
									<textarea id="contact_textarea" class="contact_input contact_textarea" required="required"></textarea>
								</div>
								<button class="button contact_button" name="send"><span>Send Message</span></button>
							</form>
						</div>
					</div>
				</div>

				<!-- Contact Info -->
				<div class="col-lg-3 offset-xl-1 contact_col">
					<div class="contact_info">
						<div class="contact_info_section">
							<<div class="contact_info_section">
								<div class="contact_info_title">Information</div>
								<ul>
									<li>Phone: <span>+53 345 7953 3245</span></li>
									<li>Email: <span>yourmail@gmail.com</span></li>
								</ul>
							</div>
						
					</div>
				</div>
			</div>
			<div class="row map_row">
				<div class="col">

					<!-- Google Map -->
					<div class="map">
						<div id="google_map" class="google_map">
							<div class="map_container">
								<div id="map"></div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
      </div>
      </form>
       <?php
       if(isset($_POST["send"]))
       {
           mysqli_query($link,"insert into reclamation values('$_POST[t1]','$_POST[t2]','$_POST[t3]') " );
       }
       ?>
      </body>
 </html>
<link rel="stylesheet" href="contact1.css">
<?php

    if (isset($_POST['insert'])){
        $hostname="localhost";
        $username="root";
        $password="";
        $database="reclamation";

        $first_name=$_POST['firstname'];
        $last_name=$_POST['lastname'];
        $email=$_POST['email'];
        $message=$_POST['message'];

        $connect=mysqli_connect($hostname,$username,$password,$database);
        $query="INSERT INTO `reclamation`(`first name`,`last name`,`E-mail`,`message`) VALUES ('$first_name','$last_name','$email','$message')";

        $result=mysqli_query($connect,$query);
        if($result){
            echo 'data inserted';
        }else{
            echo 'data not inserted';
        }
    }
?>
<html>
    <head>

    </head>
<body>
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
										<label for="contact_name" >First Name</label>
										<input type="text" id="contact_name" name="firstname" class="contact_input" required="required">
									</div>
									<div class="col-xl-6 last_name_col">
										<!-- Last Name -->
										<label for="contact_last_name" >Last Name</label>
										<input type="text" id="contact_last_name" name="lastname" class="contact_input" required="required">
									</div>
								</div>
								<div>
									<!-- Subject -->
									<label for="contact_company" >E-mail</label>
									<input type="email" name="email" id="contact_company" class="contact_input">
								</div>
								
								<div>
									<label for="contact_textarea" >Message</label>
									<textarea id="contact_textarea" name="message" class="contact_input contact_textarea" required="required"></textarea>
								</div>
								<button class="button contact_button" name="insert"><span>Send Message</span></button>
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
</body>
    </html>
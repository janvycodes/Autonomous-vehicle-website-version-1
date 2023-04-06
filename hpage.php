<?php
session_start();
require 'configure.php';
if (strlen($_SESSION['user_id']==0)) {
  header('location:login.php');
  } 
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Autonomous vehicles</title>
  	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/95ae6c8f7a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
<body>
	<header>
		<div id="logo">DRIVERLESS</div>
		<div class="desc">
        <div class="dropdown">
      <?php
$user_id=$_SESSION['user_id'];
$sql= "select username from login where user_id='$user_id'";
$query = $conn->query($sql);
if($query->num_rows > 0){
$row = $query->fetch_assoc();
$name=$row['username'];
            }
echo $name; ?>
      &nbsp;&nbsp;<i class="fas fa-caret-down dropbtn" onclick="myFunction()"></i>
      <div id="myDropdown" class="dropdown-content">
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
      </div>
      </div>
    </div>
	</header>
	<div class="nav">
		<ul>
			<li><a href="hpage.php">Home</a></li>
			<li><a href="#about">About</a></li>
			<li><a href="#gallery">Gallery</a></li>
			<li><a href="#services">services</a></li>
			<li><a href="#contact">Contact Us</a></li>
		</ul>
	</div>
	<div id="head">
		<h2>WELCOME</h2>
		<p>Here at Driverless, we make sure to give you the best autonomous vehicles that you desire. Connect with us via email or any of our social media accounts and get in touch. You can also leave a message using our contact form.</p>
	</div>
	<div id="about">
		<h3>A BRIEF HISTORY</h3>
		<p>Driverless has been around for over fifteen years and has always provided the best autonomous vehicles for its clients. Our partners can attest to the fact that we are on the right path and always have our clientelle in mind and at heart.</p>
		<p>Our Vehicles have been proclaimed the best in the world for several years in a row. You can toally trust us when it comes to your vehicle needs. Our auditors and critics now agree that we are environmentally friendly and user friendly.</p>
		<p>Our Artificial Intelligence unit has been able to produce our custom AI known as the Auto Driver which help to power our vehicles at all time. IT can be said that the Auto Driver is the best AI in the autonomous vehicle market. Join us today and get the best vehicle you need.</p>
	</div>
	<div id="services">
		<div class="serv-1">
			<i class="fas fa-tools"></i>
			<h3>REPAIRS</h3>
			<p>Our engineers are able to fix your faulty autonoomous vehicles purchased from us.</p>
		</div>
		<div class="serv-2">
			<i class="fa fa-shopping-cart"></i>
			<h3>SALE</h3>
			<p>Our company deals in the sale of various types of autonomous vehicles to satisfy your needs.</p>
		</div>
		<div class="serv-3">
			<i class="fas fa-user"></i>
			<h3>AI</h3>
			<p>Our artificial intelligence, Auto Driver is the best option to power all your autonomous vehicles.</p>
		</div>
		<div class="serv-4">
			<i class="fa fa-bullhorn"></i>
			<h3>BRANDING</h3>
			<p>Our staff are always ready to help you brand your vehicles according to your taste.</p>
		</div>
	</div>
	<h3>GALLERY</h3>
  <div class="grid-container">
   	 <img src="media/grd1.jpg" alt="grid-item">
    <img src="media/grd2.jpg" alt="grid-item">
    <img src="media/grd3.jpg" alt="grid-item">
    <img src="media/grd4.jpg" alt="grid-item">
    <img src="media/grd5.jpg" alt="grid-item">
    <img src="media/grd6.jpg" alt="grid-item">
    <img src="media/grd7.jpg" alt="grid-item">
    <img src="media/grd8.jpg" alt="grid-item">
    <img src="media/grd9.jpg" alt="grid-item">
    <img src="media/grd10.jpg" alt="grid-item">
   </div>
   <div id="contact">
   	<form action="hpage.php" method="post">
   		<h3>CONTACT US</h3>
   		<input type="email" name="email" placeholder="enter your email">
   		<input type="text" name="text" placeholder="enter the subject of message">
   		<textarea placeholder="enter your message here"></textarea>
   		<input type="radio" name="newsletter"> Subscribe to our monthly newsletter
   		<button type="button" name="submit" id="myBtn">Submit</button>
   	</form>
   </div>
   <div class="timer">
   	<div class="tmr-1"> 
   		<p id="demo"></p>
   		<a href="#"> More to the biggest Car festival in the world. Register or contact us t be part of this.</a>
   	</div>
   	<div class="tmr-2"> <video src="media/vid.mp4" autoplay="autoplay" muted="muted" loop="loop"></video></div>
   </div>
   <footer>
   	<div class="copyright">Copyright© Driverless, 2020</div>
   	<div id="logo">DRIVERLESS</div>
   	<div class="icons">
			<a href="instagram.com"><img src="media/insta.png"></a>
			<a href="facebook.com"><img src="media/face.png"></a>
			<a href="twitter.com"><img src="media/twit.png"></a>
		</div>
   </footer>
   <div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h3>FAQ</h3>
    <p>Who can register an account? <span>Anyone can register an account on our site. It's free!</span></p>
    <p>Can i buy vehicles from this site? <span>No you cannot do that. We hope to add that feature in future updates</span></p>
    <p>Can one person have multiple accounts? <span>Yes you can but we don't see the need for that. it'll just be a waste of time and resources. We strongly advice against it</span></p>
    <p>Can't find what you're looking for? <a href="mailto:driverless@mail.com">LEAVE A MESSAGE</a></p> 
  </div>
</body>
</html>
<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<script>
// Set the date we're counting down to
var countDownDate = new Date("May 25, 2021 13:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

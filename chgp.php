<?php
session_start();
require 'configure.php';
if (strlen($_SESSION['user_id']==0)) {
  header('location:login.php');
  } 

  $password = "";

if (isset($_POST['submit']))  {
  $conn = mysqli_connect('localhost', 'root', '', 'av-db');

  $password = mysqli_real_escape_string($conn, $_POST['password']);
   $user_id=$_SESSION['user_id'];
   
  if ($conn) {
    $phash = password_hash($password, PASSWORD_DEFAULT);
      $SQL = $conn->prepare("UPDATE login set password='$phash' WHERE user_id='$user_id'");
      $SQL->execute();
      $_SESSION['error'] = "Password update successful";
    }else {
    $_SESSION['error'] = "Password update error";
  }
  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Autonomous vehicles</title>
  	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      <li><a href="profile.php">Profile</a></li>
      <li><a href="edtp.php">Edit Profile</a></li>
		</ul>
	</div>
  <div class="editt">
    <form method="post" action="chgp.php">
      
        <input type="password" name="password" placeholder="password" required><h3>CHANGE PASSWORD</h3>
      <?php
        if(isset($_SESSION['error'])){
          ?>
          <div class="alert">
            <?php echo $_SESSION['error']; ?>
          </div>
          <?php
          unset($_SESSION['error']);
          }
          ?>
        <input type="submit" name="submit" value="Change profile">
      </form>
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


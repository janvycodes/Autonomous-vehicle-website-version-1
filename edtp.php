<?php
session_start();
require 'configure.php';
if (strlen($_SESSION['user_id']==0)) {
  header('location:login.php');
  } 

  $fullname = "";
$username = "";
$email="";
$dob="";
$postcode="";
$address = "";
$password = "";

if (isset($_POST['submit']))  {
  $conn = mysqli_connect('localhost', 'root', '', 'av-db');

   $user_id=$_SESSION['user_id'];
  $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
    $dob = mysqli_real_escape_string($conn, $_POST['date']);
  $postcode = mysqli_real_escape_string($conn, $_POST['code']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);


  if ($conn) {    
      $SQL = $conn->prepare("UPDATE login set fullname='$fullname', username='$username', email='$email', dob='$dob', postcode='$postcode', address='$address' WHERE user_id='$user_id'");
      $SQL->execute();
      $_SESSION['error'] = "Profile update successful";
    }else {
    $_SESSION['error'] = "Profile update error";
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
      <li><a href="chgp.php">Change Password</a></li>
		</ul>
	</div>
  <div class="editpp">
    <?php
$user_id=$_SESSION['user_id'];
$sql= "select * from login where user_id='$user_id'";
$query = $conn->query($sql);
if($query->num_rows > 0){
$row = $query->fetch_assoc();
$fullname=$row['fullname'];
$username=$row['username'];
$email=$row['email'];
$dob=$row['dob'];
$postcode=$row['postcode'];
$address=$row['address'];
            }
?>
    <form method="post" action="edtp.php">
      <h3>UPDATE PROFILE</h3>
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
        <input type="text" name="fullname" value="<?php echo $fullname;?>" required>
        <input type="text" name="username" value="<?php echo $username;?>" required>
        <input type="email" name="email" value="<?php echo $email;?>" required>
        <input type="date" name="date" value="<?php echo $dob;?>">
        <input type="text" name="code" value="<?php echo $postcode;?>" required>
        <input type="text" name="address" value="<?php echo $address;?>" required>
        <input type="submit" name="submit" value="Edit account">
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


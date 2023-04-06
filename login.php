<?php
  session_start();

  $username='';

  if (isset($_POST['submit'])) {
    require 'configure.php';

    $username = $_POST['username'];
    if(!isset($_SESSION['attempt'])){
      $_SESSION['attempt'] = 0;
    }
    if($_SESSION['attempt'] == 3){
      $_SESSION['error'] = 'Attempt limit reached, try again after 10 minutes';
    }
    else{
      $sql = "SELECT * FROM login WHERE username = '$username'";
      $query = $conn->query($sql);
      if($query->num_rows > 0){
        $row = $query->fetch_assoc();
        if(password_verify($_POST['password'], $row['password'])){
          $_SESSION['user_id']=$row['user_id'];
          $_SESSION["loggedin"] = true;
          $_SESSION["username"] = $username;
          $_SESSION['success'] = 'Login successful';
          header ('location: hpage.php');
        }
        else{
          $_SESSION['error'] = 'Password incorrect';
          $_SESSION['attempt'] += 1;
          if($_SESSION['attempt'] == 3){
            $_SESSION['attempt_again'] = time() + (10*60);
          }
        }
      }
      else{
        $_SESSION['error'] = 'No account with that username';
        $_SESSION['attempt'] += 1;
          if($_SESSION['attempt'] == 3){
            $_SESSION['attempt_again'] = time() + (10*60);
          }
      }

    }

  }

  if(isset($_SESSION['attempt_again'])){
    $now = time();
    if($now >= $_SESSION['attempt_again']){
      unset($_SESSION['attempt']);
      unset($_SESSION['attempt_again']);
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
		<div class="icons">
			<a href="index.php"><img src="media/home.png"></a>
		</div>
	</header>
	<div id="gig">
		<div id="gigs">
			<h2>SIGN IN</h2>
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
			<form method="post" action="login.php">
				<input type="text" name="username" placeholder="username" required>
				<input type="password" name="password" placeholder="password" required>
				<a href="signup.php">Sign up</a>
				<input type="submit" name="submit" value="SIGN IN">
			</form>
		</div>
	</div>
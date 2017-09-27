
<?php
    session_start();
    // Connect to the database. Please change the password and dbname in the following line accordingly
        $db     = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=damien1994");
  if (isset($_POST['login'])) { 

        $checkPass = pg_query($db, "SELECT username FROM account WHERE username ='$_POST[Username]' AND password='$_POST[Password]'");
        $checkPass = pg_num_rows($checkPass);
        $_SESSION["user"] = $_POST["Username"];
        if($checkPass>0) {
            header("Location: http://localhost:8080/demo/dashBoard.php");
            exit();       
        }
        else{
            $echo1 = '<p>Wrong password or username, Please sign up or try again!</p>';
        }
    }
    if(isset($_SESSION['username'])) {
      $echo =  '<a href="dashBoard.html" class="w3-bar-item w3-button"><i class="fa fa-user"></i> DASHBOARD</a>';
    } else {
      $echo ='<a href="login.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i> LOGIN</a>';
    }
?> 

<!DOCTYPE html>
<html>
<title>CS2102 Assignment</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
body, html {
    height: 100%;
    line-height: 1.8;
}
.w3-bar .w3-button {
    padding: 20px;
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card-2" id="myNavbar">
    <a href="homePage.html" class="w3-bar-item w3-button w3-wide">RENTAL</a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
	  <a href="homePage.html" class="w3-bar-item w3-button"><i class="fa fa-home"></i> HOME</a>
      <a href="aboutUs.html" class="w3-bar-item w3-button"><i class="fa fa-info-circle"></i> ABOUT</a>
      <?php echo $echo;?>
	  <a href="search.html" class="w3-bar-item w3-button"><i class="fa fa-search"></i> SEARCH</a>
      <a href="contactUs.html" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> CONTACT</a>
    </div>
  </div>
</div>

<!-- Login Section !-->
<div class="w3-container w3-light-grey" style="padding:96px" id="home">
  <h3 class="w3-center">Login and be amazed!</h3>
  <div class="w3-row-padding" style="margin-top:64px padding:128px 16px">
    <div class="w3-content" align="center">
      <form action="login.php" method="POST" >
        <p><input class="w3-input w3-border" type="text" placeholder="Username" name="Username"></p>
		    <p><input class="w3-input w3-border" type="password" placeholder="Password" name="Password"></p>
          <button class="w3-button w3-black" type="submit" name = "login">
            <i class="fa fa-sign-in"></i> LOGIN
          </button>
        </p>
      </form>
      <?php echo $echo1; ?>
    </div>
  </div>
</div>	
 
</body>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>
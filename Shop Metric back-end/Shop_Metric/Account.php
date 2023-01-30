<?php
  session_start();

      $userEmail = $userPassword = $btn = "";

      $serverName ="localhost";
      $userName = "Lyn";
      $password ="1234";
      $dbname = "shop_metric";

    // set array
      $array = array();

    //Create connection
    $conn = new mysqli($serverName,$userName,$password,$dbname);

    //Check Connection
    if(!$conn){
      die("Connection failed". mysqli_connect_error());
    }

    
    if(isset($_POST["submitBTN1"])){  //Login

      $btn = "BTN1 clicked";

      $userEmail = $_POST["Email"];
      $userPassword = $_POST["password"];

      $sql = mysqli_query($conn,"SELECT * FROM users WHERE Email = '".$_POST['Email']."' and Password = '".($_POST['password'])."'");
      $row = mysqli_num_rows($sql);
      if($row > 0 )
      {
        $_SESSION ['username'] = $_POST['Email'];
        $_SESSION['password'] = $_POST['password'];
        echo "login done";
      }else {
        echo "fail login ";
      }
      $conn->close();   
    }
    

    if(isset($_POST["submitBTN2"])){  //Registration

      $btn = "BTN2 clicked";

      $userEmail = $_POST["Email"];
      $userPassword = $_POST["password"];

      $sql = "INSERT INTO users( Email , Password ) VALUES ('$userEmail','$userPassword')";

      if(mysqli_query($conn,$sql)){
        echo "New Record created";
      }else{
        echo "Error: " .$sql."<br>".mysqli_error($conn);
      }
      $conn->close();   
    }
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="We&amp;apos;re so happy&nbsp;to see you !">
    <meta name="description" content="">
    <title>Account</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Account.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.20.1, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/logo-no-background.png"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Account">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body u-xl-mode" data-lang="en"><header class="u-clearfix u-custom-color-1 u-header u-header" id="sec-1146"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="Home.php" class="u-image u-logo u-image-1" data-image-width="1000" data-image-height="623">
          <img src="images/logo-no-background.png" class="u-logo-image u-logo-image-1">
        </a>
        <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;">
            <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-spacing-2 u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-border-2 u-border-active-grey-90 u-border-hover-grey-50 u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90" href="Home.php" style="padding: 10px 20px;">Home</a>
</li><li class="u-nav-item"><a class="u-border-2 u-border-active-grey-90 u-border-hover-grey-50 u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90" href="Account.php" style="padding: 10px 20px;">Account</a>
</li><li class="u-nav-item"><a class="u-border-2 u-border-active-grey-90 u-border-hover-grey-50 u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90" href="Cart.php" style="padding: 10px 20px;">Cart</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.php">Home</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Account.php">Account</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Cart.php">Cart</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
        <h4 class="u-custom-font u-font-raleway u-text u-text-default u-text-1">ID</h4>
      </div></header>
    <section class="u-align-center u-clearfix u-section-1" id="sec-3e18">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-custom-font u-font-montserrat u-text u-text-default u-text-1">We're so happy<br>&nbsp;to see you !
        </h2>
        <p class="u-text u-text-default u-text-2">Awesome new favs this way. Lets go shopping...</p>
        <a href="Sign_in.php" class="u-align-center u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-6 u-btn-1">Sign In</a>
        <a href="Register.php" class="u-align-center u-border-2 u-border-black u-btn u-btn-round u-button-style u-hover-grey-5 u-none u-radius-10 u-text-black u-text-hover-black u-btn-2">Register</a>
        <div class="u-border-2 u-border-grey-dark-1 u-line u-line-horizontal u-line-1"></div>
      </div>
    </section>
    
    
    <footer class="u-align-center u-clearfix u-custom-color-1 u-footer u-footer" id="sec-1881"><div class="u-clearfix u-sheet u-sheet-1">
        <img class="u-image u-image-default u-preserve-proportions u-image-1" src="images/logo-color.png" alt="" data-image-width="1000" data-image-height="1000">
        <p class="u-small-text u-text u-text-variant u-text-1">CopyRight 2022</p>
      </div></footer> 
</body></html>
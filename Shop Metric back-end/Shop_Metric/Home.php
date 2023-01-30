<?php
    session_start();

    $serverName ="localhost";
    $userName = "Lyn";
    $password ="1234";
    $dbname = "shop_metric";


    //Create connection
    $conn = new mysqli($serverName,$userName,$password,$dbname);

    //code for Cart
    if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
    //code for adding product in cart
    case "add":
    if(!empty($_POST["quantity"])) {
      $pid=$_GET["pid"];
      $result=mysqli_query($conn,"SELECT * FROM catalogue WHERE id='$pid'");
            while($productByCode=mysqli_fetch_array($result)){
      $itemArray = array($productByCode["code"]=>array('title'=>$productByCode["title"], 'code'=>$productByCode["code"],'quantity'=>$_POST["quantity"],'price'=>$productByCode["price"], 'img'=>$productByCode["img"]));
      if(!empty($_SESSION["cart_item"])) {
        if(in_array($productByCode["code"],array_keys($_SESSION["cart_item"]))) {
          foreach($_SESSION["cart_item"] as $k => $v) {
              if($productByCode["code"] == $k) {
                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                  $_SESSION["cart_item"][$k]["quantity"] = 0;
                }
                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
              }
          }
        } else {
          $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
        }
      }  else {
        $_SESSION["cart_item"] = $itemArray;
      }
    }
    }
    break;

    // code for removing product from cart
    case "remove":
    if(!empty($_SESSION["cart_item"])) {
      foreach($_SESSION["cart_item"] as $k => $v) {
          if($_GET["code"] == $k)
            unset($_SESSION["cart_item"][$k]);				
          if(empty($_SESSION["cart_item"]))
            unset($_SESSION["cart_item"]);
      }
    }
    break;
    // code for if cart is empty
    case "empty":
    unset($_SESSION["cart_item"]);
    break;	
    }
    }
    ?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Catalogue, Trending Brands">
    <meta name="description" content="">
    <title>Home</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Home.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.20.1, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/logo-no-background.png"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Home">
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
    <section class="u-align-left u-clearfix u-image u-shading u-section-1" src="" data-image-width="1920" data-image-height="1280" id="sec-1239">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                <div class="u-container-layout u-container-layout-1">
                  <p class="u-text u-text-1">Clothing Line Store<br>
                    <span class="u-text-palette-3-base">Shop Metric</span>
                  </p>
                  <a href="#" class="u-btn u-btn-round u-button-style u-hover-palette-1-dark-1 u-palette-1-base u-radius-20 u-btn-1">Womens Wear</a>
                </div>
              </div>
              <div class="u-container-style u-image u-layout-cell u-size-30 u-image-1" data-image-width="1920" data-image-height="1280">
                <div class="u-container-layout u-container-layout-2"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-section-2" id="sec-e86c">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <h2 class="u-align-center u-custom-font u-font-merriweather u-text u-text-default u-text-1">Catalogue</h2>
      </div>
    </section>
    <section class="u-clearfix u-section-3" id="sec-344b">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-expanded-width u-list u-list-1">
          <div class="u-repeater u-repeater-1">
     <?php
      $product= mysqli_query($conn,"SELECT * FROM catalogue");
      if (!empty($product)) {
      while ($row=mysqli_fetch_array($product)) {
      ?>
      <div class="u-container-style u-list-item u-repeater-item">
      <form method="post" action="Home.php?action=add&pid=<?php echo $row["id"]; ?>">
          <div class="u-container-layout u-similar-container u-container-layout-1">
            <img alt="" class="u-expanded-width u-image u-image-default u-image-1" data-image-width="484" data-image-height="444" src="<?php echo $row["img"];?>">
            <input type="text" class="product-quantity" name="quantity" value="1" size="1" hidden />
            <input class="u-btn u-button-style u-hover-palette-1-dark-1 u-palette-1-base u-btn-1" type="submit" value="Add to Cart" class="btnAddAction" />
            <h3 class="u-text u-text-default u-text-1"><?php echo $row["title"];?></h3>
            <p class="u-text u-text-default u-text-2"><span style="font-weight: 700; font-size :28px"><?php echo $row["price"];?>$.</span>
            </p>
          </div>
      </form>
        </div>
      <?php
      }
      } else {
      echo "No Records.";
      }
    ?>
          </div>
        </div>
        <h2 class="u-align-center u-custom-font u-font-merriweather u-text u-text-default u-text-7">Trending Brands</h2>
        <div class="u-border-3 u-border-grey-dark-1 u-line u-line-horizontal u-line-1"></div>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-section-4" id="sec-cb0a">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-expanded-width u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            <div class="u-container-align-center u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-1">
                <img class="u-expanded-height u-image u-image-contain u-image-default u-preserve-proportions u-image-1" src="images/denim-2-logo-png-transparent.png" alt="" data-image-width="2400" data-image-height="2400">
              </div>
            </div>
            <div class="u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-2">
                <img class="u-expanded-height u-image u-image-contain u-image-default u-preserve-proportions u-image-2" src="images/Dior_Logo.svg.png" alt="" data-image-width="2560" data-image-height="1109">
              </div>
            </div>
            <div class="u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-3">
                <img class="u-absolute-hcenter u-expanded-height u-image u-image-contain u-image-default u-preserve-proportions u-image-3" src="images/page_1.jpg" alt="" data-image-width="1494" data-image-height="840">
              </div>
            </div>
            <div class="u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-4">
                <img class="u-expanded-height u-image u-image-contain u-image-default u-preserve-proportions u-image-4" src="images/ellesse-logo-png-transparent.png" alt="" data-image-width="2400" data-image-height="2400">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    <footer class="u-align-center u-clearfix u-custom-color-1 u-footer u-footer" id="sec-1881"><div class="u-clearfix u-sheet u-sheet-1">
        <img class="u-image u-image-default u-preserve-proportions u-image-1" src="images/logo-color.png" alt="" data-image-width="1000" data-image-height="1000">
        <p class="u-small-text u-text u-text-variant u-text-1">CopyRight 2022</p>
      </div></footer>
</body></html>
<?php 
  session_start();

  if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"
    />
    <link rel="stylesheet" href="style/style.css" />
    <title>Home</title>
  </head>
  <style>
    body {
      background-color: black;
      color: rgb(131, 193, 247);
      background: radial-gradient(ellipse at bottom, #0d1d31 0%, #0c0d13 100%);
      height: 100vh;
    }
  </style>

  <body style="">
    <div class="normal-info fade-in" id="element-1">
      <h1>
        Welcome,
        <?=$_SESSION['user_full_name']?>
      </h1>
      <h4>From Best Policy adviser B.S.KUMAWAT</h4>
    </div>
    <br />
    <hr />
    <div class="normal-info fade-in" id="element-2">
      <h2>OPTIONS</h2>
      <a class="list-op" href="polices.php">
        <div class="icon-op">
          <img
            src="img/insurance-icon.webp"
            height="100px"
            width="100px"
            alt=""
            class="op"
            style="margin-right: 20px"
          />
          <p>OUT STANDING POLICIES</p>
        </div>
      </a>

      <a class="list-op" href="find.php">
        <div class="icon-op">
          <img
            src="img/Find.png"
            height="100px"
            width="100px"
            alt=""
            class="op"
            style="margin-top: 4px"
          />
          <p>FIND POLICIES BY NUMBER</p>
        </div>
      </a>
      <a class="list-op" href="insur_query.php">
        <div class="icon-op">
          <img
            src="img/buy.png"
            height="100px"
            width="100px"
            alt=""
            class="op"
            style="margin-top: 4px"
          />
          <p>Buy New Policy Enquiry</p>
        </div>
      </a>

      <!-- </a>
      <a class="list-op" href="polices.php">
        <div class="icon-op">
          <img
            src="img/insurance-icon.webp"
            height="100px"
            width="100px"
            alt=""
            class="op"
            style="margin-right: 20px"
          />
          <p>Report A problem</p>
        </div>
      </a> -->
      <!-- <a class="list-op" href="#">
        <div class="icon-op">
          <img
            src="img/insurance-icon.webp"
            height="100px"
            width="100px"
            alt=""
            class="op"
            style="margin-right: 20px"
          />
          <p>OUT STANDING POLICIES</p>
        </div>
      </a> -->
    </div>

    <nav class="mobile-bottom-nav">
      <div class="mobile-bottom-nav__item">
        <a
          href="polices.php"
          class="a-mobile-bottom-nav__item mobile-bottom-nav__item"
        >
          <div class="mobile-bottom-nav__item-content">
            <i
              ><img
                src="img/insurance-icon.webp"
                alt=""
                height="20px"
                width="20px"
            /></i>
            POLICIES
          </div>
        </a>
      </div>
      <div class="mobile-bottom-nav__item mobile-bottom-nav__item--active">
        <a
          href="#"
          class="a-mobile-bottom-nav__item mobile-bottom-nav__item--active"
        >
          <div class="mobile-bottom-nav__item-content">
            <i><img src="img/home.webp" alt="" height="20px" width="20px" /></i>
            HOME
          </div>
        </a>
      </div>
      <div class="mobile-bottom-nav__item">
        <a
          href="profile.php"
          class="a-mobile-bottom-nav__item mobile-bottom-nav__item"
        >
          <div class="mobile-bottom-nav__item-content">
            <i
              ><img
                src="img/profile-icon.webp"
                alt=""
                height="20px"
                width="20px"
            /></i>
            PROFILE
          </div>
        </a>
      </div>
    </nav>
    <!-- partial -->
    <script src="./script.js"></script>
  </body>
  <style>
      img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {

    display: none !important;

}
  </style>
  <script src="js/script.js"></script>
</html>

<?php 
}else {
   header("Location: login.php");
}
 ?>

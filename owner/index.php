<?php 
  session_start();

  if (isset($_SESSION['owner_id']) && isset($_SESSION['owner_email'])) { 
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
    <link rel="stylesheet" href="style1/style.css" />
    <title>Home</title>
  </head>
  <style>
    body {
      background-color: black;
      color: rgb(131, 193, 247);
      background: radial-gradient(ellipse at bottom, #0d1d31 0%, #0c0d13 100%);
      height: 100vh;
    }
    img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]
    {
      display: none !important;
    }
  </style>

  <body style="">
    <header class="header">
      <nav class="navbar">
        <a href="#" class="nav-logo">InsureLink <sub>Owner</sub></a>
        <ul class="nav-menu">
          <li class="nav-item">
            <a href="index.php" class="nav-link">home</a>
          </li>
          <li class="nav-item">
            <a href="all_policies.php" class="nav-link">See all policies</a>
          </li>
          <li class="nav-item">
            <a href="next_renew.php" class="nav-link">NEXT RENEWAL</a>
          </li>
          <li class="nav-item">
            <a href="p_find.php" class="nav-link">find policy</a>
          </li>
          <li class="nav-item">
            <a href="query.php" class="nav-link">users queries</a>
          </li>
          <li class="nav-item">
            <a href="comming.php" class="nav-link">Contact Admin</a>
          </li>
          <li class="nav-item">
            <a href="comming.php" class="nav-link">About InsureLink</a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link"
              ><img src="imgs/logout.png" alt="LOGOUT" height="10%" width="30%"
            /></a>
          </li>
        </ul>
        <div class="hamburger">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </div>
      </nav>
    </header>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;1,400&display=swap");
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      html {
        font-size: 62.5%;
        font-family: "Roboto", sans-serif;
      }

      li {
        list-style: none;
      }

      a {
        text-decoration: none;
      }

      .header {
        border-bottom: 1px solid #e2e8f0;
        background-color: #00ccff;
        border: 2px solid #00ccff;
        margin: 0px;
        padding: 0px;
      }

      .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 1.5rem;
      }

      .hamburger {
        display: none;
      }

      .bar {
        display: block;
        width: 25px;
        height: 3px;
        margin: 5px auto;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
        background-color: #101010;
      }

      .nav-menu {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .nav-item {
        margin-left: 5rem;
      }

      .nav-link {
        font-size: 1.6rem;
        font-weight: 400;
        color: #475569;
      }

      .nav-link:hover {
        color: #482ff7;
      }

      .nav-logo {
        font-size: 2.1rem;
        font-weight: 500;
        color: #482ff7;
      }

      @media only screen and (max-width: 768px) {
        .nav-menu {
          position: fixed;
          left: -100%;
          top: 5rem;
          flex-direction: column;
          margin: 1%;
          background-color: #eef2f3;
          width: 98%;
          border-radius: 10px;
          text-align: center;
          transition: 0.3s;
          box-shadow: 0 10px 27px rgba(0, 0, 0, 0.05);
        }
        .nav-menu.active {
          left: 0;
        }
        .nav-item {
          margin: 2.5rem 0;
        }
        .hamburger {
          display: block;
          cursor: pointer;
        }
        .hamburger.active .bar:nth-child(2) {
          opacity: 0;
        }
        .hamburger.active .bar:nth-child(1) {
          -webkit-transform: translateY(8px) rotate(45deg);
          transform: translateY(8px) rotate(45deg);
        }
        .hamburger.active .bar:nth-child(3) {
          -webkit-transform: translateY(-8px) rotate(-45deg);
          transform: translateY(-8px) rotate(-45deg);
        }
      }
    </style>
    <script>
      const hamburger = document.querySelector(".hamburger");
      const navMenu = document.querySelector(".nav-menu");
      const navLink = document.querySelectorAll(".nav-link");

      hamburger.addEventListener("click", mobileMenu);
      navLink.forEach((n) => n.addEventListener("click", closeMenu));

      function mobileMenu() {
        hamburger.classList.toggle("active");
        navMenu.classList.toggle("active");
      }

      function closeMenu() {
        hamburger.classList.remove("active");
        navMenu.classList.remove("active");
      }
    </script>
    <div class="normal-info">
      <h1>
        Welcome,
        <?=$_SESSION['owner_full_name']?>
      </h1>
      <!-- <h4>From Best Policy adviser B.S.KUMAWAT</h4> -->
    </div>

    <br />
    <hr />
    <div class="menu">
      <h2>Options</h2>
      <ul style="text-transform: uppercase">
        <a href="all_policies.php">
          <li>All Policies</li>
        </a>
        <a href="next_renew.php">
          <li>next renew</li>
        </a>
        <a href="p_find.php">
          <li>Find Policy</li>
        </a>
        <a href="query.php">
          <li>User Queries</li>
        </a>
        <!-- <a href="#">
          <li>Contact Admin</li>
        </a>
        <a href="#">
          <li>About InsureLink</li>
        </a> -->
      </ul>
    </div>
  </body>
  <style>
    body {
      text-transform: uppercase;
    }

    h2 {
      text-align: center;
      margin: 10px;
      padding: 10px;
      font-size: 2vh;
    }

    .menu li {
      background-color: #659be2;
      color: #ffffff;
      font-size: 2vh;
      padding: 20px;
      text-align: center;
      margin: 20px;
      border: 2ps solid transparent;
      border-radius: 20px;
    }

    .menu li:hover {
      background-color: #c1cfe2;
      color: #05171b;
      font-size: 2.5vh;
    }
  </style>
  <script src="./script.js"></script>
  <script src="js/script.js"></script>
</html>

<?php 
}else {
   header("Location: owner_login.php");
}
 ?>

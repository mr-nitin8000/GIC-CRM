<?php 
  session_start();
  
  if (isset($_SESSION['owner_id']) && isset($_SESSION['owner_email'])) { 
      ?>
<?php
      require "conn.php";
      
          $owner_id = $_SESSION['owner_id'];
      
      $select = $conn->prepare('SELECT * FROM query_db INNER JOIN owner_user ON
query_db.o_id = owner_user.o_id WHERE owner_user.o_id = ? and query_db.date <=
now() ORDER BY query_db.date DESC'); $select->execute([$owner_id]); $rows =
$select->fetchAll(PDO::FETCH_OBJ); ?>
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
    <title>Query</title>
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
        <ul class="nav-menu" style="text-transform: uppercase">
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

    <hr />
    <div class="normal-info" id="element-2">
      <h2 style="font-size: 1.7vh">USERS QUERIES</h2>
    </div>
    <hr />
    <br />
    <br />
    <!-- queries start  -->
    <?php foreach($rows as $row):?>
    <div class="feed">
      <div class="tweet">
        <div class="avatar">
          <img src="https://picsum.photos/id/1005/50" alt="User Avatar" />
        </div>
        <div class="content">
          <div
            class="header"
            style="background-color: transparent; border: #0c0d1300"
          >
            <h3 class="username"><?php echo $row->name; ?></h3>
            <span class="handle"><?php echo $row->email; ?></span>
            <span class="timestamp"><?php echo $row->date; ?></span>
          </div>
          <div class="message">
            <strong
              >Vehical Number :
              <?php echo $row->reg_no; ?>
            </strong>

            <br />
            <strong
              >Vehical Type :
              <?php echo $row->type_v; ?>
            </strong>
            <br />
            Message :
            <?php echo $row->message; ?>
          </div>
          <div class="actions">
            <button class="reply">
              Contact:
              <?php echo $row->phone; ?>
            </button>
          </div>
        </div>
      </div>
      <!-- Add more tweets here -->
    </div>
    <?php endforeach; ?>
    <style>
      .feed {
        font-size: 1.5vh;
        color: #0c0d13;
        display: flex;
        flex-direction: column;
        gap: 1rem;
        margin: 20px;
        border: 0.5px solid rgb(189, 180, 180);
        padding: 20px;
        border-radius: 20px;
        background-color: rgb(185, 218, 231);
      }

      .tweet {
        display: flex;
        gap: 1rem;
      }

      .avatar img {
        border-radius: 50%;
      }

      .username {
        margin-right: 0.5rem;
      }

      .handle {
        color: gray;
        margin-right: 0.5rem;
      }

      .timestamp {
        color: gray;
      }

      .message {
        margin: 0.5rem 0;
      }

      .actions button {
        background-color: transparent;
        border: none;
        color: gray;
        cursor: pointer;
        margin-right: 0.5rem;
      }

      .actions button:hover {
        color: dodgerblue;
      }
    </style>

    <!-- queries and -->
    <p style="text-align: center; color: green; font-size: 1.3vh">
      End Of the Records
    </p>

    <!-- partial -->
    <script src="./script.js"></script>
  </body>
  <style>
    img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]
    {
      display: none !important;
    }
  </style>
  <script src="js/script.js"></script>
</html>

<?php 
}else {
   header("Location: owner_login.php");
}
 ?>

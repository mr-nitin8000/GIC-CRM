<?php 
  session_start();
  
  if (isset($_SESSION['owner_id']) && isset($_SESSION['owner_email'])) { 
      ?>
<?php
      require "conn.php";
      
          $owner_id = $_SESSION['owner_id'];
      
      $select = $conn->prepare('SELECT * FROM d_policy INNER JOIN owner_user ON
d_policy.o_id = owner_user.o_id WHERE owner_user.o_id = ? and
d_policy.ending_date >= now() ORDER BY `d_policy`.`ending_date` ASC');
$select->execute([$owner_id]); $rows = $select->fetchAll(PDO::FETCH_OBJ); ?>
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
    <title>POLICIES</title>
  </head>
  <style>
    body {
      background-color: black;
      color: rgb(131, 193, 247);
      background: radial-gradient(ellipse at bottom, #0d1d31 0%, #0c0d13 100%);
      height: 100vh;
    }

    .table {
      color: black;
      text-align: center;
      border: 2px solid rgb(255, 255, 255);
      padding: 20px;
      text-transform: uppercase;
      background-color: rgb(255, 255, 255);
      border-radius: 20px;
      box-shadow: 5px 5px 10px rgb(49, 48, 48);
      margin-bottom: 20px;
    }

    .h1 {
      font-size: 130%;
    }

    .h2 {
      font-size: 120%;
    }

    .h3 {
      text-align: left;
    }

    .p {
      font-size: 17px;
      align-items: center;
    }

    .href {
      padding: 5px;
      border: 2px solid transparent;
      border-radius: 10px;
      text-transform: uppercase;
      background-color: rgb(141, 141, 253);
      cursor: pointer;
      box-shadow: 5px 5px 10px rgb(49, 48, 48);
      width: 80%;
    }

    .href:hover {
      background-color: rgb(177, 177, 252);
    }

    .modal {
      align-items: center;
      display: flex;
      justify-content: center;
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      background: rgba(184, 207, 241, 0.7);
      transition: all 0.4s;
      visibility: hidden;
      opacity: 0;
    }

    .content {
      position: absolute;
      background: white;
      width: 400px;
      padding: 1em 2em;
      border-radius: 20px;
    }

    .modal:target {
      visibility: visible;
      opacity: 1;
    }

    .box-close {
      margin: 10px;
      position: absolute;
      top: 0;
      right: 15px;
      color: #fe0606;
      text-decoration: none;
      font-size: 30px;
    }

    .tab1 {
      width: 100%;
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
    <div class="normal-info" id="">
      <h1>OUT STANDING POLICIES</h1>
    </div>
    <br />
    <hr />
    <div class="normal-info" id="element-2">
      <h2>LIST OF NEXT RENEWAL POLICIES</h2>
    </div>
    <hr />
    <br />
    <br />
    <div class="table" id="element-3" style="margin: 5px; margin-bottom: 20px">
      <table class="tab1">
            <tr style="height: 50px; background-color: #482ff7; color: #e2e8f0">
                <td class="h2">POName</td>
                <td class="h2">Reg. Number</td>
                <td class="h2">last date</td>
                <td class="h2">View & down</td>
                <td class="h2">Send Reminder</td>
            </tr>
            <?php foreach($rows as $row):
               $pho= $row->pphone;
              ?>
            <tr style="height: 40px">
                <td class="h2"><?php echo $row->poname; ?></td>
                <td class="h2"><?php echo $row->rg_no; ?></td>
                <td class="h2"><?php echo $row->ending_date; ?></td>
                <td class="h2">
                    <?php if($row->down_policy!=NULL) { ?>
                    <a href="https://drive.google.com/file/d/<?php echo $row->down_policy;?>/view?usp=share_link"><button
                            class="href">View & download</button></a>
                    <?php } else { ?>
                    <b style="color: red">Uploaded Soon</b>

                    <?php  } ?>

                </td>
                <td>
                    <?php if($pho!=0) { ?>

                    <a style="display: inline-block; margin-right: 20px;"
                        href="https://api.whatsapp.com/send?phone=91<?php echo $row->pphone; ?>&text=Sir,%20%2C%0AYour%20Vehicle%20insurance%20<?php echo $row->rg_no; ?>%20expires%20on%20<?php echo $row->ending_date; ?>%20Please%20renew%20the%20insurance.%0A%0Aplease%20send%20us%20your%20RC%20and%20Insurance%20copy%20for%20renewal%20of%20insurance%0A%0AContact%20us%20as%20soon%20as%20possible.%0A%0AThanks%20%0A%0AFrom%20%0AB.S.Kumawat%0AContact%20%3A-%207976869839%0AE-mail%20%20%20%3A-%201269819t%40gmail.com%20">
                        <img height="50px" src="imgs/whatsapp.png" alt="whatsapp">
                    </a>
                    <?php } else { ?>
                    <b style="color: red">Phone Number not available</b>

                    <?php  } ?>
                </td>

            </tr>

            <?php endforeach; ?>
        </table>

      <!-- popup start -->
    </div>
    <p style="text-align: center; color: green">End Of the Records</p>

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

<?php 
  session_start();

  if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div id="body" class="grey lighten-2 valign-wrapper">
        <div id="opty_hands" class="valign">
            <div id="left-arm">
                <div class="left-hand"><span>...</span></div>
                <div class="left-shake"><span>_<br>_<br>_</span></div>
            </div>
            <div id="right-arm">
                <div class="right-hand"><span>...</span></div>
                <div class="right-shake"></div>
            </div>
        </div>
    </div>
    <nav class="mobile-bottom-nav">
        <div class="mobile-bottom-nav__item">
            <a href="polices.php" class="a-mobile-bottom-nav__item mobile-bottom-nav__item">
                <div class="mobile-bottom-nav__item-content">
                    <i><img src="img/insurance-icon.webp" alt="" height="20px" width="20px" /></i>
                    POLICIES
                </div>
            </a>
        </div>
        <div class="mobile-bottom-nav__item mobile-bottom-nav__item">
            <a href="index.php" class="a-mobile-bottom-nav__item mobile-bottom-nav__item">
                <div class="mobile-bottom-nav__item-content">
                    <i><img src="img/home.webp" alt="" height="20px" width="20px" /></i>
                    HOME
                </div>
            </a>
        </div>
        <div class="mobile-bottom-nav__item">
            <a href="profile.php" class="a-mobile-bottom-nav__item mobile-bottom-nav__item">
                <div class="mobile-bottom-nav__item-content">
                    <i><img src="img/profile-icon.webp" alt="" height="20px" width="20px" /></i>
                    PROFILE
                </div>
            </a>
        </div>
    </nav>
</body>
<style>
body {
    background-color: black;
    color: rgb(131, 193, 247);
    background: radial-gradient(ellipse at bottom, #0d1d31 0%, #0c0d13 100%);
    height: 90vh;
    text-align: center;
}

#body {
    width: 100%;
    min-height: auto;
}

#opty_hands {
    background: #FEBD25;
    margin-left: 40%;
    width: 25vw;
    height: 25vw;
    font-size: 1.5vw;
    border-radius: 50%;
    position: relative;
    overflow: hidden;
    z-index: 1;
}

.left-hand {
    display: block;
    position: absolute;
    top: 35%;
    left: -8%;
    width: 40%;
    height: 30%;
    z-index: 3;
    background: #282830;
    box-shadow: 0 2.3rem 0 0 rgba(0, 0, 0, 0.4) inset;
    transform: rotate(15deg);
}

.left-hand span {
    displaY: block;
    position: absolute;
    right: 15%;
    top: 40%;
    letter-spacing: -0.6rem;
    line-height: 0;
    color: #eee;
    font-size: 7em;
}

.left-hand::after {
    content: '';
    position: absolute;
    display: block;
    left: 100%;
    top: 0;
    z-index: -1;
    border-top-right-radius: 50%;
    border-bottom-right-radius: 50%;
    width: 10%;
    height: 100%;
    background: #2a2a2a;
}

.left-hand::before {
    content: '';
    display: block;
    position: absolute;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
    left: 100%;
    top: 12.5%;
    width: 15%;
    height: 75%;
    background: #fff;
}

.right-hand {
    display: block;
    position: absolute;
    top: 35%;
    right: -8%;
    width: 40%;
    height: 30%;
    z-index: 3;
    background: #6C8784;
    box-shadow: 0 2.3rem 0 0 rgba(0, 0, 0, 0.4) inset;
    transform: rotate(-15deg);
}

.right-hand span {
    displaY: block;
    position: absolute;
    left: 15%;
    top: 40%;
    letter-spacing: -0.6rem;
    line-height: 0;
    color: #eee;
    font-size: 7em;
}

.right-hand::after {
    content: '';
    position: absolute;
    display: block;
    right: 100%;
    top: 0;
    z-index: -1;
    border-top-left-radius: 50%;
    border-bottom-left-radius: 50%;
    width: 10%;
    height: 100%;
    background: #2a2a2a;
}

.right-hand::before {
    content: '';
    display: block;
    position: absolute;
    border-top-left-radius: 3px;
    border-bottom-left-radius: 3px;
    right: 100%;
    top: 12.5%;
    width: 15%;
    height: 75%;
    background: #fff;
}

.left-shake {
    position: absolute;
    height: 18%;
    width: 31%;
    z-index: 2;
    border-radius: 20%;
    left: 31%;
    top: 54%;
    background: #F3D89F;
    transform: rotate(45deg);
}

.right-shake {
    position: absolute;
    height: 18%;
    width: 31%;
    z-index: 1;
    border-radius: 20%;
    right: 31%;
    top: 52%;
    background: #E3C39D;
    transform: rotate(-45deg);
}

.left-shake span {
    position: absolute;
    right: 0;
    top: -20%;
    z-index: 1;
    font-weight: 300;
    color: rgba(0, 0, 0, 0.1);
    font-size: 3em;
    line-height: 25%;
}

.right-shake::after {
    content: '';
    display: block;
    position: absolute;
    width: 50%;
    height: 40%;
    border-radius: 30%;
    background: #F3D89F;
    top: -30%;
    z-index: -1;
    right: 13%;
    transform: rotate(40deg);
    box-shadow: -6px -5px 0 0 #E3C39D inset;
}

.left-shake::after {
    content: '';
    display: block;
    position: absolute;
    width: 60%;
    height: 40%;
    border-radius: 30%;
    background: #E3C39D;
    top: -40%;
    z-index: -1;
    right: 34%;
    transform: rotate(110deg);
    box-shadow: 0.1em -0.05em 0 rgba(0, 0, 0, 0.05);
}

.left-shake::before {
    content: '|||';
    font-weight: 500;
    text-indent: 0.25em;
    color: rgba(0, 0, 0, 0.1);
    line-height: 80%;
    font-size: 1.6em;
    letter-spacing: 0.15em;
    display: block;
    position: absolute;
    width: 50%;
    height: 50%;
    background: #E3C39D;
    box-shadow: 0px -0.5em 0 0 #E3C39D inset, 0px -0.55em 0 0 rgba(0, 0, 0, 0.1) inset, 0px -1em 0 0 rgba(255, 255, 255, 0.2) inset, 0.1em -0.1em 0 0 rgba(0, 0, 0, 0.1);
    right: 10%;
    z-index: 2;
    border-radius: 20%;
    bottom: -10%;
}

.right-shake::before {
    content: '';
    display: block;
    position: absolute;
    width: 5%;
    height: 100%;
    background: rgba(0, 0, 0, 0.1);
    right: 39%;
}

.right-hand {
    -webkit-animation: right-arm 0.5s linear infinite alternate;
}

.left-hand {
    -webkit-animation: left-arm 0.5s linear infinite alternate;
}

.right-shake {
    -webkit-animation: right-hand 0.5s linear infinite alternate;
}

.left-shake {
    -webkit-animation: left-hand 0.5s linear infinite alternate;
}

@-webkit-keyframes right-arm {
    0% {
        top: 37%;
        transform: rotate(-15deg);
    }

    100% {
        top: 38%;
        transform: rotate(-20deg)
    }
}

@-webkit-keyframes left-arm {
    0% {
        top: 35%;
        transform: rotate(15deg);
    }

    100% {
        top: 36%;
        transform: rotate(20deg);
    }
}

@-webkit-keyframes right-hand {
    0% {
        top: 52%;
    }

    100% {
        top: 57%;
    }
}

@-webkit-keyframes left-hand {
    0% {
        top: 54%;
    }

    100% {
        top: 57%;
    }
}
img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {

    display: none !important;

}
</style>
</body>

</html>
<?php
date_default_timezone_set('Asia/Kolkata');

// Database connection
$servername = "localhost";
$username = "id20685394_insurelink_db";
$password = "O@-9s{Ksv(#5KQmB";
$dbname = "id20685394_insurelink";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Form data
$name = $_SESSION['user_full_name'];
$email = $_SESSION['user_email'];
$number = $_SESSION['user_phone'];
$type_v = $_POST['insurance'];
$reg_no = $_POST['reg_no'];
$message = $_POST['message'];


// Send email

  // Insert data into database
  $sql = "INSERT INTO query_db (name, email,phone,type_v, reg_no, message) VALUES ('$name','$email','$number','$type_v', '$reg_no', '$message')";

  if ($conn->query($sql) === TRUE) {
    echo '<h2>Thanks for contacting us</h2>
                <div class="content">
                    Our team will be contact to you with in 24 hrs
                </div>';
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

$conn->close();
?>
<?php 
}else {
   header("Location: login.php");
}
 ?>
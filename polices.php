<?php 
  session_start();
  
  if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 
      ?>
<?php
      require "db_conn.php";
      
          $user_id = $_SESSION['user_id'];
      
      $select = $conn->prepare('SELECT * FROM d_policy INNER JOIN users ON
d_policy.user_id = users.id WHERE users.id = ?'); $select->execute([$user_id]);
$rows = $select->fetchAll(PDO::FETCH_OBJ); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />
    <link rel="stylesheet" href="style/style.css" />
    <title>POLICIES</title>
</head>
<style>
body {
    background-color: black;
    color: rgb(131, 193, 247);
    background: radial-gradient(ellipse at bottom, #0d1d31 0%, #0c0d13 100%);
    height: 90%;
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
    padding: 10px;
    border: 2px solid transparent;
    border-radius: 10px;
    text-transform: uppercase;
    background-color: rgb(141, 141, 253);
    cursor: pointer;
    box-shadow: 5px 5px 10px rgb(49, 48, 48);
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
    <div class="normal-info fade-in" id="element-1">
        <h1>OUT STANDING POLICIES</h1>
    </div>
    <br />
    <hr />
    <div class="normal-info fade-in" id="element-2">
        <h2>LIST OF POLICIES</h2>
    </div>
    <hr />
    <?php foreach($rows as $row):?>
    <div class="table fade-in" id="element-3">
        <table class="tab1">
            <tr>
                <td class="h3">Registration Number</td>
                <td colspan="2" class="h3">
                    <b> <?php echo $row->rg_no; ?></b>
                </td>
            </tr>
            <tr>
                <td><br /></td>
            </tr>
            <tr>
                <td class="h3">Model-Name:</td>
                <td colspan="2" class="h3">
                    <b> <?php echo $row->model; ?> </b>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="h2">
                    <hr />
                </td>
            </tr>
            <tr>
                <td class="h3">Policy Number:</td>
                <td colspan="2" class="h3"><?php echo $row->letest_pn; ?></td>
            </tr>
            <tr>
                <td colspan="3" class="h2">
                    <hr />
                </td>
            </tr>
            <tr>
                <td class="h3">Insurance Company:</td>
                <td colspan="2" class="h3"><?php echo $row->company; ?></td>
            </tr>
            <tr>
                <td colspan="3" class="h2">
                    <hr />
                </td>
            </tr>
            <tr>
                <td class="h3">HOLDER name:</td>
                <td colspan="2" class="h3"><?php echo $row->poname; ?></td>
            </tr>

            <tr>
                <td colspan="3" class="h2">
                    <hr />
                </td>
            </tr>
            <tr>
                <td class="h3">Vehicle Type</td>
                <td colspan="2" class="h3"><?php echo $row->v_type; ?></td>
            </tr>
            <tr>
                <td colspan="3" class="h2">
                    <hr />
                </td>
            </tr>
            <tr>
                <td class="h3">Policy ending date:</td>
                <td colspan="2" class="h3"><?php echo $row->ending_date; ?></td>
            </tr>
            <tr>
                <td colspan="3" class="h2">
                    <hr />
                </td>
            </tr>
            <tr>
                <td class="h3">Policy Status:</td>
                <td colspan="2" class="h3"><?php echo $row->p_status; ?></td>
            </tr>
            <tr>
                <td colspan="3" class="h2">
                    <hr />
                </td>
            </tr>
        </table>
        <a href="https://drive.google.com/file/d/<?php echo $row->down_policy;?>/view?usp=share_link"><button
                class="href">View and Download POLICY</button></a>
        <!-- popup start -->
    </div>
    <?php endforeach; ?>
    <p style="text-align: center; color: green">End Of the Records</p>

    <nav class="mobile-bottom-nav">
        <div class="mobile-bottom-nav__item mobile-bottom-nav__item--active">
            <a href="polices.php" class="a-mobile-bottom-nav__item mobile-bottom-nav__item--active">
                <div class="mobile-bottom-nav__item-content">
                    <i><img src="img/insurance-icon.webp" alt="" height="20px" width="20px" /></i>
                    POLICIES
                </div>
            </a>
        </div>
        <div class="mobile-bottom-nav__item">
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
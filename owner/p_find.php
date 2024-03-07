<?php 
  session_start();
  
  if (isset($_SESSION['owner_id']) && isset($_SESSION['owner_email'])) { 
      ?>
<?php
      require "conn.php";
      
          $owner_id = $_SESSION['owner_id'];
include 'conn.php';
$searchErr = '';
$employee_details='';
if(isset($_POST['save']))
{
	if(!empty($_POST['search']))
	{
		$search = $_POST['search'];
		$stmt = $conn->prepare("select * from d_policy INNER JOIN users ON d_policy.user_id = users.id INNER JOIN owner_user ON d_policy.o_id = owner_user.o_id  WHERE rg_no like '%$search%' or poname like '%$search%' and owner_user.o_id = $owner_id ORDER BY `d_policy`.`ending_date` ASC");
		$stmt->execute();
		$employee_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
		// print_r($employee_details);
       
		
	}
	else
	{
		$searchErr = "Please enter the information";
	}
   
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />
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
        img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]
    {
      display: none !important;
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
            
            .block {
                /* display: inline-block; */
                font-size: 1.5vh;
            }
            
            .fromi {
                padding-top: 10px;
            }
            
            .in {
                background-color: transparent;
                color: aqua;
                padding: 10px;
                border: 1px solid aqua;
                border-radius: 10px;
            }
            
            .btns {
                background-color: rgb(79, 221, 221);
                padding: 10px;
                border: 1px solid aqua;
                border-radius: 10px;
                margin-left: 6px;
                margin-top: 20px;
                width: 20%;
            }
            
            .btns:hover {
                background-color: rgb(60, 185, 185);
                font-size: 1.3vh;
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
            <h2 style="font-size: 1.7vh;">LIST OF POLICIES</h2>
        </div>
        <hr />
        <br />
        <br />
        <!-- find  section start -->
        <div class="normal-info" id="element-2">
            <form class=".formi" action="#" method="post">
                <div class="h">
                    <div class="">
                        <div class="block">
                            <input style="width: 80%;" type="text" class="in" name="search" placeholder="Enter Reg. Number and Name">
                        </div>
                        <div class="block">
                            <button type="submit" name="save" class="btns">FIND</button>
                        </div>
                    </div>
                    <div class="">
                        <br>
                        <span class="error" style="color:red;"><?php echo $searchErr;?></span>
                    </div>

                </div>
            </form>
        </div>
        <!-- find section end -->
        <div class="table" id="element-3" style="margin: 5px; margin-bottom: 20px">
            <table class="tab1">
                <tr style="height: 50px; background-color: #482ff7; color: #e2e8f0">
                    <td class="h2">POName</td>
                    <td class="h2">Reg. Number</td>
                    <td class="h2">last date</td>
                    <td class="h2">View & down</td>
                </tr>
                <?php
            $mg = '';
                         if(!$employee_details)
                         {
                            $mg = '<center>Search The Data</center>';
                         }
                         else{
                             foreach($employee_details as $key=>$value)
                             {
                                 ?>
                    <tr style="height: 40px">
                        <td class="h2">
                            <?php echo $value['poname'];?>
                        </td>
                        <td class="h2">
                            <?php echo $value['rg_no']; ?>
                        </td>
                        <td class="h2">
                            <?php echo $value['ending_date']; ?>
                        </td>
                        <td class="h2"><a href="https://drive.google.com/file/d/<?php echo $value['down_policy'];?>/view?usp=share_link"><button
                            class="href">View & download</button></a></td>
                    </tr>

                    <?php
		    	 	}
		    	 	
		    	 }
		    	?>
            </table>
            <!-- <a
        href="https://drive.google.com/file/d/<?php echo $row->down_policy;?>/view?usp=share_link"
        ><button class="href">View and Download POLICY</button></a
      > -->
            <!-- popup start -->
        </div>
        <p style="text-align: center; color: green">
            <?php echo $mg?>
        </p>
        <p style="text-align: center; color: green; font-size: 1.3vh;">End Of the Records</p>

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
   header("Location: owner_login.php");
}
 ?>
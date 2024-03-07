<?php
    
$showAlert = false; 
$showError = false; 
$exists=false;
    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
    include 'db_sign.php';   
    
    $full_name = $_POST["full_name"]; 
    $email = $_POST["email"]; 
    $phone = $_POST["phone"]; 
    $password = $_POST["password"]; 
    $cpassword = $_POST["cpassword"];
    $location = $_POST["location"];
            
    
    $sql = "Select * from users where email='$email'";
    
    $result = mysqli_query($conn, $sql);
    
    $num = mysqli_num_rows($result); 
    
    // This sql query is use to check if
    // the username is already present 
    // or not in our Database
    if($num == 0) {
        if(($password == $cpassword) && $exists==false) {
    
            $hash = password_hash($password, 
                                PASSWORD_DEFAULT);
                
            // Password Hashing is used here. 
            $sql = "INSERT INTO `users` (`full_name`, `email`, 
                `password`, `cpassword`,`phone`, `date`,`location`) VALUES ('$full_name','$email',
                '$hash','$hash','$phone', current_timestamp(), '$location')";
    
            $result = mysqli_query($conn, $sql);
    
            if ($result) {
                $showAlert = true; 
            }
        } 
        else { 
            $showError = "Passwords do not match"; 
        }      
    }// end if 
    
   if($num>0) 
   {
      $exists="Email is Already register"; 
   } 
    
}//end if   
    
?>

    <!doctype html>

    <html lang="en">

    <head>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, 
        shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>

    <body>

        <?php
    
    if($showAlert) {
    
        echo ' <div class="alert alert-success 
            alert-dismissible fade show" role="alert">
    
            <strong>Success!</strong> Your account is 
            now created and you can login. 
            <button type="button" class="close"
                data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">×</span> 
            </button> 
        </div> '; 
    }
    
    if($showError) {
    
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert"> 
        <strong>Error!</strong> '. $showError.'
    
       <button type="button" class="close" 
            data-dismiss="alert aria-label="Close">
            <span aria-hidden="true">×</span> 
       </button> 
     </div> '; 
   }
        
    if($exists) {
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert">
    
        <strong>Error!</strong> '. $exists.'
        <button type="button" class="close" 
            data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">×</span> 
        </button>
       </div> '; 
     }
   
?>
            <style>
                body {
                    text-align: center;
                }
                
                .form-group {
                    width: 90%;
                    text-align: left;
                    margin: 5%;
                }
            </style>
            <div class="container" style="min-height: 60vh;padding-top: 2vh;">

                <h1 class="text-center">Create Account</h1>
                <form action="#" method="post">

                    <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter Full Name" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" placeholder="Phone Number" name="phone" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location" aria-describedby="emailHelp" placeholder="City - status" value="Jaipur - Rajsthan" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword" required>

                        <small id="emailHelp" class="form-text text-muted">
                    Make sure to type the same password
                </small>
                    </div>

                    <button type="submit" class="btn btn-primary">
                Create Account
            </button>
                </form>
            </div>
            <div class="d-flex justify-content-center align-items-center" style="min-height: 28vh">
                If you have an account than <a href="login.php">&#x200B;&#x200B; login </a>
            </div>
            <style>
                body {
                    background-color: black;
                    color: rgb(131, 193, 247);
                    background: radial-gradient(ellipse at bottom, #0d1d31 0%, #0c0d13 100%);
                }
                
                img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {

    display: none !important;

}
            </style>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->

            <script src="
https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="
sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
            </script>

            <script src="
https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
            </script>

            <script src="
https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
            </script>
            
    </body>

    </html>
<?php
   date_default_timezone_set('Asia/Kolkata');

    $servername = "localhost"; 
    $username = "id20685394_insurelink_db"; 
    $password = "O@-9s{Ksv(#5KQmB";
   
    $database = "id20685394_insurelink";
   
     // Create a connection 
     $conn = mysqli_connect($servername, 
         $username, $password, $database);
   
    // Code written below is a step taken
    // to check that our Database is 
    // connected properly or not. If our 
    // Database is properly connected we
    // can remove this part from the code 
    // or we can simply make it a comment 
    // for future reference.
   
    if($conn) {
        
    } 
    else {
        die("Error". mysqli_connect_error()); 
    } 
?>
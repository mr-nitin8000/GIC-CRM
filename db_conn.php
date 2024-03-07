<?php 
date_default_timezone_set('Asia/Kolkata');

$sName = "localhost";
$uName = "id20685394_insurelink_db";
$pass = "O@-9s{Ksv(#5KQmB";
$db_name = "id20685394_insurelink";

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}

// $sName = "localhost";
// $uName = "id20613428_giccrm_db";
// $pass = "7BI|~~RXhG5DVmRt";
// $db_name = "id20613428_mydatabase";


// 3pM8xEZt-klgW]#9
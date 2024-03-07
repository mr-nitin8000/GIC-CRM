<?php 

// $sName = "localhost";
// $uName = "root";
// $pass = "";
// $db_name = "giccrm_db";

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
<?php echo "Sending in progress....<br/>"; ?>
<?php
date_default_timezone_set('Asia/Kolkata');
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require 'vendor/autoload.php';
?>
<?php
require "config.php";
// $stmt = $conn->prepare("select * from d_policy");
$stmt = $conn->prepare("SELECT * FROM d_policy WHERE ending_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 5 DAY);");
$stmt->execute();
$select = $stmt->fetchAll(PDO::FETCH_ASSOC);
// print_r($select);

$mg = '';
// $current_date = new DateTime();
$currentDate = date("Y-m-d");
$current_date = new DateTime($currentDate);
echo "Current date: $currentDate";

if (!$select) {
    $mg = '<br><center>No any data not available </center>';
    echo $mg;
} else {
    foreach ($select as $key => $value) {
        // echo $value['last_sent'];
        if ($value['last_sent'] != $currentDate) {

            $ending_date_str = $value['ending_date']; // Replace with your ending date in "YYYY-MM-DD" format
            $ending_date = new DateTime($ending_date_str);

            $interval = $current_date->diff($ending_date);
            $remaining_days = $interval->format("%a");

            // Output the remaining days
            // echo "<br/>There are {$remaining_days} days remaining until the ending date.";

            // Import PHPMailer classes into the global namespace
            // These must be at the top of your script, not inside a function

            //Load Composer's autoloader

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP(); //Send using SMTP
                $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
                $mail->SMTPAuth = true; //Enable SMTP authentication
                $mail->Username = 'insurelink.services.8000@gmail.com'; //SMTP username
                $mail->Password = 'jxtetilemmgopkjj'; //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
                $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('insurelink.services.8000@gmail.com', 'InsureLink By Rudransh');
                $mail->addAddress('gic1269619t@gmail.com', 'B.S.Kumawat'); //Name is optional
                $mail->addReplyTo('nitinkumawat8000@gmail.com', 'Insure link Information');
                // $mail->addCC('gic1269619t@gmail.com');
                $mail->addBCC('2021pietcsnitin120@poornima.org');
                // $mail->addCC('luckyyyboy2004@gmail.com');
                $mail->addBCC('jaaniii12345678@gmail.com');
                // $mail->addCC('2021pietcsnitin120@poornima.org');
                // $mail->addCC('luckyyy2004@gmail.org');
                // $mail->addCC('bhaktmahakal000@gmail.org');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                $mail->addAttachment('img/new.png', 'new1.png'); //Optional name

                //Content
                $mail->isHTML(true);

                $ending = $value['ending_date'];
                $stat = "";
                if ($value['p_status'] == "ACTIVE") {
                    $stat = "<span style=" . "color: green" . ">" . $value['p_status'] . " </span>";
                } else {
                    $stat = "<span style=" . "color: red" . ">" . $value['p_status'] . " </span>";
                }
                //Set email format to HTML
                $mail->Subject = "Reminder: There are " . $remaining_days . " days remaining " . $value['poname'] . "'s Vehicle Insurance policy Renewal on " . $ending . " ";
                $mail->Body = '<br />Dear ' . $value['poname'] . ', <br /><br />
            I hope this email finds you well. We wanted to remind you about your
            upcoming vehicle insurance renewal. Your policy is set to expire on ' . $value['ending_date'] . ', and we encourage you to take action to ensure continuous
            coverage. <br />

            <b>Policy Information:</b> <br />
            <ul>
                <li>Policyholder Name: ' . $value['poname'] . '</li>
                <li>Vehicle Number: ' . $value['rg_no'] . '</li>
                <li>Vehicle Type: ' . $value['v_type'] . '</li>
                <li>Insurance Status: ' . $stat . '</li>
            </ul>
            <br />
            <br />
            Thank you for choosing InsureLink by Rudransh as your insurance assistant provider.
            We appreciate your business and look forward to continuing to serve you.<br />
            <br />
            Best regards,<br />
            <br />
            Mr.Luckyyy<br />
            Dev. of Rudransh<br />
            InsureLink by Rudransh<br />
            8000432135<br />';
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                $updateQuery = "UPDATE d_policy SET last_sent = CURDATE() where ending_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 5 DAY);";
                $st = $conn->query($updateQuery);

                // echo "status: $st <br>";
                echo "<br>Updated Last sent <br>";
                // Execute the UPDATE query
                // if ( == true) {
                //     echo "Ending dates updated successfully.";
                // } else {
                //     echo "Error updating ending dates: " . $conn->error;
                // }
                echo '<br>Message has been sent <br>';

            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

        } else {
            echo "<br>Last sent : ${value['last_sent']} <br>";

            echo "<br> Remainder has been already sent!!!!!!!";
        }

    }

}
echo "
    <script>
        // Replace 'newPageUrl' with the URL you want to redirect to
        var newPageUrl = 'https://www.google.com/';
        // Redirect to the new page
        window.location.href = newPageUrl;
    </script>";
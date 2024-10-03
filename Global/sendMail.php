<?php
// Start the session
session_start(); // Start the session
require 'C:/xampp/htdocs/PHPMailer/src/PHPMailer.php';
require 'C:/xampp/htdocs/PHPMailer/src/SMTP.php';
require 'C:/xampp/htdocs/PHPMailer/src/Exception.php';
require 'C:/xampp/htdocs/PHPMailer/src/OAuth.php';


//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class SendMail{

//These must be at the top of your script, not inside a function
public function SendMail(){
    if (isset($_POST['signup'])) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Capture form data
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $confirm_password = trim($_POST['confirm_password']);


            $otp = rand(100000, 999999);
            $_SESSION['otp'] = $otp;
            $_SESSION['user_data'] = [
                'username' => $username,
                'email' => $email,
                'password' => $password
            ];
    //Load Composer's autoloader
    // require 'plugins/PHPMailer/vendor/autoload.php';
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'tobikoleriari69@gmail.com';                     //SMTP username
        $mail->Password   = 'secret';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set 
    
        //Recipients
        $mail->setFrom('tobikoleriari69@gmail.com', 'Test ICS');
        $mail->addAddress($email);     //Add a recipient
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'TOBIKO OTP';
        $mail->Body    = 'Your OTP is: ' . $otp;
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        die("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    }
}
}
}
}
?>

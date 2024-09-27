<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emails = $_POST['emails'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Lock the process to handle concurrent submissions
    $lockFile = fopen('lockfile.txt', 'w');
    if (flock($lockFile, LOCK_EX)) {  // Acquire an exclusive lock

        // Now send emails safely
        try {
            $emailList = explode(',', $emails);
            $mail = new PHPMailer(true);
            
            // Server settings...
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'connexxity@gmail.com';
            $mail->Password = 'hdaygcrnjjnuzgzz';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->setFrom('connexxity@gmail.com', 'Connexxity');
            
            foreach ($emailList as $email) {
                $email = trim($email);
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $message;
                $mail->send();
                $mail->clearAddresses();
            }
            echo 'All emails have been sent successfully <a href="mailer.php" class="btn btn-dark">Back to Form</a>';
        } catch (Exception $e) {
            echo "Emails could not be sent. Error: {$mail->ErrorInfo} <a href='mailer.php' class='btn btn-dark'>Back to Form</a>";
        }

        // Release the lock
        flock($lockFile, LOCK_UN);
    } else {
        echo "Invalid request . Try Again <br><a href='mailer.php' class='btn btn-dark'>Back to Form</a><br>Could not get the lock, another process is running.";
    }
    fclose($lockFile);
}
?>

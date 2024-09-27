<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require('layouts/header.html') ?>
</head>

<body>
    <div class="container mt-4">
        <?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        // Load Composer's autoloader (assuming you've installed PHPMailer with Composer)
        require 'vendor/autoload.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $emails = json_decode($_POST['emails'], true);
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            // Lock the process to handle concurrent submissions
            $lockFile = fopen('lockfile.txt', 'w');
            if (flock($lockFile, LOCK_EX)) {  // Acquire an exclusive lock

                // Now send emails safely
                try {
                    $mail = new PHPMailer(true);

                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'connexxity@gmail.com';
                    $mail->Password = 'hdaygcrnjjnuzgzz';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;
                    $mail->setFrom('connexxity@gmail.com', 'Connexxity');

                    foreach ($emails as $emailObj) {
                        $email = $emailObj['value'];  // Get each email from the Tagify object
                        $mail->addAddress($email);
                        // Load the HTML template
                        $template = file_get_contents('email-temp/invite-template.html');
                        // Replace placeholders
                        $template = str_replace('{{message}}', $message, $template);
                        $mail->isHTML(true);
                        $mail->Subject = $subject;
                        $mail->Body = $template;

                        $mail->send();
                        $mail->clearAddresses();
                    }

                    echo '<div class="alert alert-success">All emails have been sent successfully</div> <a href="mailer.php" class="btn btn-dark">Back to Form</a>';
                    // Redirect to the same page with a success message
                    flock($lockFile, LOCK_UN);  // Release the lock
                    fclose($lockFile);
                    header('Location: mailer.php?success=1');  // Redirect to the form with a success parameter
                    exit;  // Terminate the script

                } catch (Exception $e) {
                    flock($lockFile, LOCK_UN);  // Release the lock in case of an error
                    fclose($lockFile);
                    echo "<div class='alert alert-danger'>Emails could not be sent. Error: {$mail->ErrorInfo} </div><a href='mailer.php' class='btn btn-dark'>Back to Form</a>";
                }

                // Release the lock
                flock($lockFile, LOCK_UN);
            } else {
                echo "<div class='alert alert-danger'>Invalid request . Try Again </div><br><a href='mailer.php' class='btn btn-dark'>Back to Form</a><br><p>Could not get the lock, another process is running.</p>";
            }
            fclose($lockFile);
        } else {
            echo "<div class='alert alert-danger'>Invalid request </div><a href='mailer.php' class='btn btn-dark'>Back to Form</a>";
        }
        ?>
    </div>
</body>

</html>
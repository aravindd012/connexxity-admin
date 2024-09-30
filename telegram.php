<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    // Telegram bot details
    $botToken = ''; // Replace with your bot's API token
    $chatId = '1419799565'; // Replace with your chat ID 1137896026

    // Prepare message
    $message = "Name: $name\nEmail: $email";
    // Send message to Telegram
    $sendMessageUrl = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=" . urlencode($message);

    // Execute the request
    file_get_contents($sendMessageUrl);

    echo '<div>Thank you for your submission!</div>';
}
?>

<h2> Form</h2>
<form method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br><br>

    <input type="submit" name="submit" value="Submit Application">
</form>
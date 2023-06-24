<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // Validate the form fields (you can add more validation as per your requirements)
    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill in all the fields.";
    } else {
        // Set the recipient email address
        $to = "jagpreetsinghbajwa@gmail.com"; // Replace with your own email address
        
        // Set the email subject
        $subject = "New message from $name";
        
        // Set the email headers
        $headers = "From: $name <$email>" . "\r\n" .
                   "Reply-To: $email" . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();
        
        // Send the email
        if (mail($to, $subject, $message, $headers)) {
            echo "Your message has been sent.";
        } else {
            echo "Sorry, there was a problem sending your message.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>
    <h1>Contact Form</h1>
    
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        
        <label for="message">Message:</label>
        <textarea name="message" id="message" required></textarea>
        <br>
        
        <input type="submit" value="Send">
    </form>
</body>
</html>

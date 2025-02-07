<?php
// Function to sanitize input


function sanitizeInput($data) {
    $data = trim($data); // Remove unnecessary spaces before and after
    $data = stripslashes($data); // Remove backslashes
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); // Converts special characters to prevent XSS
    return $data;
}


$sanitized_name = $sanitized_email = ""; // Default empty values


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sanitized_name = sanitizeInput($_POST['name']);
    $sanitized_email = sanitizeInput($_POST['email']);
    $sanitized_contact_no = sanitizeInput($_POST['contact_no']);
    $sanitized_message = sanitizeInput($_POST['message']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFOSEC - Contact Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <h2>Contact Form</h2>

            <div class="form-group">
                <label for="name_input">Name</label>
                <input type="text" name="name" id="name_input" required placeholder="Name"><br>
            </div>
            <div class="form-group">
                <label for="email_input">Email</label>
                <input type="email" name="email" id="email_input" required placeholder="Email"><br>
            </div>
            <div class="form-group">
                <label for="contact_input">Contact #</label>
                <input type="tel" name="contact_no" id="contact_input" required placeholder="(+639)"><br>
            </div>

            <div class="form-group">
                <label for="message_input">Message</label>
                <textarea name="message" id="message_input" cols="10" rows="5" required placeholder="Message"></textarea>
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
        </form>

        <?php if (!empty($sanitized_name) && !empty($sanitized_email)): ?>
        
        <div class="output">
            <h2>Sanitized Output:</h2>
            <div class="output_message">
                <p><b> Name:</b> <?php echo htmlspecialchars($sanitized_name, ENT_QUOTES, 'UTF-8'); ?></p>
                <p><b> Email:</b> <?php echo htmlspecialchars($sanitized_email, ENT_QUOTES, 'UTF-8'); ?></p>
                <p><b>Contact #:</b>  <?php echo htmlspecialchars($sanitized_contact_no, ENT_QUOTES, 'UTF-8'); ?></p>
                <p><b>Message:</b>  <?php echo htmlspecialchars($sanitized_message, ENT_QUOTES, 'UTF-8'); ?></p>
            </div>

        </div>
        <?php endif; ?>
        </div>
</body>
<script src="./main.js">
</script>
</html>
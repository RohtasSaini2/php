<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Form owner's email address
    $to = "rohtassaini669@gmail.com"; // Change this to the form owner's email

    // Email subject
    $subject = "New Message from Contact Form";

    // Compose the email body
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message\n";

    // Set additional headers
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        // Email sent successfully
        echo json_encode(array("status" => "success", "message" => "Thank you! Your message has been sent."));
    } else {
        // Failed to send email
        echo json_encode(array("status" => "error", "message" => "Oops! Something went wrong. Please try again later."));
    }
} else {
    // If the request method is not POST
    echo json_encode(array("status" => "error", "message" => "Invalid request method."));
}
?>

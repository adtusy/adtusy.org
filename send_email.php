<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "adtusyorg@gmail.com";
    $from = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $service = strip_tags($_POST['service']);
    $message = strip_tags($_POST['message']);
    $subject = "Quote Request: $service";

    $body = "Email: $from\nService: $service\n\nMessage:\n$message";

    $headers = "From: $from\r\nReply-To: $from\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Thank you! Your message has been sent successfully.'); window.location.href='services.html';</script>";
    } else {
        echo "<script>alert('Error sending message. Please try again later.'); window.history.back();</script>";
    }
}
?>

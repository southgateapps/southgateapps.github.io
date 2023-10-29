<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $cover_letter = $_POST["cover_letter"];

    // Construct message for Discord
    $message = "New Job Application\n\n";
    $message .= "**Name:** $full_name\n";
    $message .= "**Email:** $email\n";
    $message .= "**Cover Letter:**\n$cover_letter";

    // Send message to Discord
    $webhookUrl = "https://discord.com/api/webhooks/1168301910265184367/eMY_dnnDjed2_up8d0EfHMrSO59GtWopJ1-gatJQRIZpzvofHqPvlsm5RaYYFlgyJ7-F";
    $data = json_encode(["content" => $message]);
    
    $ch = curl_init($webhookUrl);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_exec($ch);
    curl_close($ch);

    echo "Application submitted successfully. Thank you!";
} else {
    header("Location: job_application.html");
    exit();
}
?>

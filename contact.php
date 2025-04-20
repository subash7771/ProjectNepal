<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // डाटा लिने
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    // इमेलमा पठाउने (तपाईंको इमेल ठेगाना राख्नुहोस्)
    $to = "officialster@gmail.com";  // <-- यो तपाईंको इमेल बनाउनुहोस्
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "नाम: $name\n";
    $body .= "इमेल: $email\n";
    $body .= "विषय: $subject\n";
    $body .= "सन्देश:\n$message\n";

    // इमेल पठाउने
    if (mail($to, "सन्देश: $subject", $body, $headers)) {
        echo "धन्यवाद! तपाईंको सन्देश पठाइयो।";
    } else {
        echo "त्रुटि भयो! कृपया पुनः प्रयास गर्नुहोस्।";
    }
} else {
    echo "यो पृष्ठ POST अनुरोधको लागि मात्र हो।";
}
?>

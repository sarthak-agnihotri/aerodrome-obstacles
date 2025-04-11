
<?php
if (isset($_POST['btn'])) { 
    // Retrieve form data
    $Username = $_POST['name']; 
    $Email = $_POST['email']; 
    $Subject = $_POST['subject']; 
    $Msg = $_POST['message']; 

    // Validate form fields
    if (empty($Username) || empty($Email) || empty($Subject) || empty($Msg)) { 
        echo "All fields are required."; 
        exit; // Stop further script execution
    }

    // Validate email format
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) { 
        echo "Invalid email format."; 
        exit; 
    }

    // Set up email headers
    $headers = "From: $Email\r\n"; 
    $headers .= "Reply-To: $Email\r\n"; 

    // Email recipient and sending the email
    $to = "sarthak0144@gmail.com"; // Replace with your email address 
    if (mail($to, $Subject, $Msg, $headers)) { 
        echo "Email sent successfully!"; 
    } else { 
        echo "Failed to send email."; 
        
    }
} else {
    echo "No form submission detected.";
}
?>
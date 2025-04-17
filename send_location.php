<?php
if (isset($_POST['btn'])) { 
    // Retrieve location data from the form
    $Email = $_POST['email']; 
    $Latitude = $_POST['latitude'];  
    $Longitude = $_POST['longitude']; 
    $Accuracy = $_POST['accuracy'];   
    $Address = $_POST['address'];  

    // Validate form fields
    if (empty($Email) || empty($Latitude) || empty($Longitude) || empty($Accuracy) || empty($Address)) { 
        echo "<script>alert('All fields are required.');</script>"; 
        exit;
    }

    // Validate email format
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) { 
        echo "<script>alert('Invalid email format.');</script>"; 
        exit; 
    }

    // Prepare the email content
    $email_content = "";  
    $email_content .= "Location Details:\n";
    $email_content .= "Latitude: $Latitude\n";
    $email_content .= "Longitude: $Longitude\n";
    $email_content .= "Accuracy: $Accuracy meters\n";
    $email_content .= "Address: $Address\n";

    // Prepare headers
    $headers = "From: $Email\r\n"; 
    $headers .= "Reply-To: $Email\r\n"; 

    // Define recipient email address
    $to = "sarthak0144@gmail.com"; 

    // Send the email
    if (mail($to, "‼️SOS‼️Location Details", $email_content, $headers)) { 
        echo "<script>alert('Email sent successfully!');</script>"; 
    } else { 
        echo "<script>alert('Failed to send email.');</script>"; 
    }
}
?>


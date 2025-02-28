<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function clean_input($data) {
        return htmlspecialchars(strip_tags(trim($data)));
    }

    
    $first_name = clean_input($_POST['first_name']);
    $middle_name = clean_input($_POST['middle_name'] ?? '');
    $last_name = clean_input($_POST['last_name']);
    $marital_status = clean_input($_POST['marital_status']);
    $dob = clean_input($_POST['dob']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $mobile = clean_input($_POST['mobile']);
    $street_address = clean_input($_POST['street_address']);
    $city = clean_input($_POST['city']);
    $state = clean_input($_POST['state']);
    $zip_code = clean_input($_POST['zip']);
    $country = clean_input($_POST['country']);

    
    $errors = [];

    
    if (empty($first_name) || empty($last_name) || empty($dob) || empty($email) || empty($mobile)) {
        $errors[] = "Required fields are missing.";
    }

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }


    if (!preg_match('/^[0-9]{10,15}$/', $mobile)) {
        $errors[] = "Invalid mobile number format.";
    }


    if (!empty($errors)) {
        echo "<div class='alert alert-danger'><strong>Error:</strong><br>" . implode("<br>", $errors) . "</div>";
        exit;
    }

    
    $stmt = $conn->prepare("INSERT INTO users (first_name, middle_name, last_name, marital_status, dob) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $first_name, $middle_name, $last_name, $marital_status, $dob);

    if ($stmt->execute()) {
        $user_id = $stmt->insert_id; 
        $stmt->close();

        // Insert into 'contacts' table
        $stmt = $conn->prepare("INSERT INTO contacts (user_id, email, mobile) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id, $email, $mobile);
        if (!$stmt->execute()) {
            echo "<div class='alert alert-danger'>Error: Could not save contact details.</div>";
            exit;
        }
        $stmt->close();

        
        $stmt = $conn->prepare("INSERT INTO addresses (user_id, street_address, city, state, zip_code, country) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssss", $user_id, $street_address, $city, $state, $zip_code, $country);
        if (!$stmt->execute()) {
            echo "<div class='alert alert-danger'>Error: Could not save address details.</div>";
            exit;
        }
        $stmt->close();


        echo "<script>
                alert('Registration Successful! Your details have been saved.');
                window.location.href='index.php';
              </script>";
    } else {
        echo "<div class='alert alert-danger'>Error: Unable to register.</div>";
    }

    $conn->close();
} else {
    echo "<div class='alert alert-danger'>Invalid request method.</div>";
}
?>

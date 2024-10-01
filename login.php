<!-- login.php -->
<?php
// Define the correct password
$admin_password = 'VeL0rEnT';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the password from the form
    $password = $_POST['password'];

    // Verify the password
    if ($password === $admin_password) {
        // Redirect to admin page if password is correct
        header("Location: admin.php");
        exit();
    } else {
        // Redirect back to the login page with an error
        header("Location: login.html?error=1");
        exit();
    }
} else {
    // If accessed directly, redirect to the login page
    header("Location: login.html");
    exit();
}
?>

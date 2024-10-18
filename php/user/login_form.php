<?php
@include '../config.php';

// Start a session
session_start();

// Initialize variables
$error = [];

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get user inputs and sanitize
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Validate inputs
    if (empty($email) || empty($password)) {
        $error[] = 'Email and password are required.';
    } else {
        // Prepare and execute the SQL query
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if the user exists
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                // Verify the password
                if (password_verify($password, $user['password'])) { // Corrected this line
                    // Password is correct, regenerate session ID for security
                    session_regenerate_id(true);
                    
                    // Set session variables
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['username'] = $user['username'];
                    
                    // Redirect to the user page
                    header("Location: ./user_page.php");
                    exit();
                } else {
                    $error[] = 'Invalid email or password.';
                }
            } else {
                $error[] = 'Invalid email or password.';
            }
        } else {
            $error[] = 'Database error: Could not prepare statement.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - VeloRent</title>
    <link rel="stylesheet" href="../../css/login_form.css">
</head>
<body>
   
<div class="logo">
   <h2>VeloRent</h2>
</div>

<div class="navbar">
   <a class="nav" href="../../pages/home.html">Home</a>
   <a class="nav" href="../../pages/about.html">About</a>
   <a class="nav" href="../../pages/contact.html">Contact</a>
   <a class="nav" href="../../pages/faq.html">FAQ</a>
   <a class="nav" href="login_form.php">Login</a>
</div>

<div class="form-container">
   <form action="" method="post">
      <h3>Login Now</h3>
      <?php
      // Display error messages
      if (!empty($error)) {
         foreach ($error as $err) {
            echo '<span class="error-msg">' . htmlspecialchars($err) . '</span>';
         }
      }
      ?>
      <input type="email" name="email" required placeholder="Enter your email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="submit" name="submit"  value="Login Now" class="form-btn" href="user_page.php">
      <p>Don't have an account? <a href="../register_form.php">Register now</a></p>
      <p>Login as <a href="../admin/admin_login_form.php">Admin</a></p>
   </form>
</div>

<div class="footer">
   <p>&copy; 2024 VeloRent. All rights reserved.</p>
   <p><a href="privacy.html">Privacy Policy</a> | <a href="terms.html">Terms of Service</a></p>
</div>

</body>
</html>

<!-- admin.php -->
<?php
    // Start a session (if you want session-based authentication later)
    session_start();
    
    echo "<h1>Welcome to the Admin Page!</h1>";
    // Your admin content goes here
?>


<!-- login.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        
.logo {
    text-align: center;
    padding: 1px;
    background-color: #333;
    color: white;
    font-size: 24px;
}

.navbar {
    background-color: #444;
    overflow: hidden;
    text-align: center;
}

.navbar .nav {
    display: inline-block;
    color: white;
    padding: 14px 20px;
    text-decoration: none;
    font-size: 18px;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
}

.navbar .nav:hover {
    background-color: #ddd;
    color: black;
}

        .login-container {
            width: 300px;
            margin: 100px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .error {
            color: red;
        }
        .footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px 0;
    margin-top: 20px;
}

.footer a {
    color: #fff;
    text-decoration: none;
    margin: 0 10px;
}

.footer a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
      <div class="logo">
            <h2>VeloRent</h2>
         </div>
         
         <div class="navbar">
            <a class="nav" href="home.html">Home</a>
            <a class="nav" href="about.html">About</a>
            <a class="nav" href="contact.html">Contact</a>
            <a class="nav" href="faq.html">FAQ</a>
            <a class="nav" href="login_form.php">Login</a>
         </div>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="login.php" method="POST">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <input type="submit" value="Login">
        </form>
        
<div class="footer">
      <p>&copy; 2024 ValoRent. All rights reserved.</p>
      <p><a href="privacy.html">Privacy Policy</a> | <a href="terms.html">Terms of Service</a></p>
   </div>
        <?php
            if (isset($_GET['error'])) {
                echo '<p class="error">Invalid password!</p>';
            }
        ?>
    </div>
</body>
</html>

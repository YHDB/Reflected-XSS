<?php

header("Content-Type: text/html; charset=UTF-8");

$username = $_GET['username'];
$password = $_GET['password'];

// Simulate a login attempt. In a real application, you would validate
// the username and password against a database.
if ($username === 'test' && $password === 'password') {
    $message = "Login successful!";
} else {
    $message = "Invalid username or password. You entered: username=" . $username . ", password=" . $password;
}

// Vulnerable: Directly outputting user input without sanitization.
$response = "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Login Response</title>
    <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap\" rel=\"stylesheet\">
    <style>
      body {
        font-family: 'Inter', sans-serif;
        background-color: #f3f4f6;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        padding: 20px;
      }

      .response-container {
        background-color: #fff;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
                    0 2px 4px -1px rgba(0, 0, 0, 0.06);
        padding: 2rem;
        max-width: 400px;
        width: 100%;
        text-align: center;
      }

      h1 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 1rem;
      }

      p {
        font-size: 1rem;
        color: #374151;
        margin-bottom: 1.5rem;
      }

      .back-link {
        display: inline-block;
        color: #3b82f6;
        text-decoration: underline;
        font-weight: 600;
        margin-top: 1rem;
      }

      .back-link:hover {
        color: #2563eb;
      }
    </style>
</head>
<body>
    <div class=\"response-container\">
        <h1>Login Response</h1>
        <p>$message</p>
        <a href=\"index.php\" class=\"back-link\">Back to Login</a>
    </div>
</body>
</html>";

echo $response;
?>


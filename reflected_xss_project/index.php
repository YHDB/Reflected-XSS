<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reflected XSS Demo</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@tailwindcss/browser@latest"></script>
    <style>
        /* Custom styles for the message box */
        .message-box {
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 0.375rem;
            border-width: 1px;
            font-family: 'Inter', sans-serif;
        }
        .message-box.error {
            background-color: #fef0f0;
            color: #b91c1c;
            border-color: #fecaca;
        }
        .message-box.success {
            background-color: #f0fdf4;
            color: #15803d;
            border-color: #d1fae5;
        }
        .form-container {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 2rem;
            max-width: 400px;
            width: 100%;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-blue-100 to-purple-100 flex items-center justify-center min-h-screen font-sans">
    <div class="form-container">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Login</h1>
        <?php if (isset($_GET['error'])): ?>
            <div class="message-box error">
                <p><?php echo $_GET['error']; ?></p>
            </div>
        <?php elseif (isset($_GET['success'])): ?>
            <div class="message-box success">
                <p><?php echo $_GET['success']; ?></p>
            </div>
        <?php endif; ?>
        <form action="process.php" method="GET" class="space-y-4">
            <div>
                <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username:</label>
                <input type="text" id="username" name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div>
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <button type="submit" class="bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                Log In
            </button>
        </form>
        <p class="text-gray-600 text-sm mt-4 text-center">
            <a href="#" class="text-blue-500 hover:text-blue-700 focus:outline-none focus:shadow-outline">Forgot Password?</a>
        </p>
    </div>
</body>
</html>



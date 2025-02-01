<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, password FROM userss WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $stored_password);
        $stmt->fetch();
        
        if ($password === $stored_password) { // Direct comparison
            $_SESSION["user_id"] = $id;
            $_SESSION["username"] = $username;
            header("Location: admindashboard.php");
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Medicare</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            padding: 30px;
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
            transition: all 0.3s ease;
        }

        .input-field:focus {
            border-color: #5e9ed6;
            box-shadow: 0 0 5px rgba(94, 158, 214, 0.5);
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #5e9ed6;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #4a89c5;
        }

        .error-message {
            color: #d9534f;
            font-size: 14px;
            text-align: center;
            margin-bottom: 10px;
        }

        .register-link {
            text-align: center;
            font-size: 14px;
            margin-top: 20px;
        }

        .register-link a {
            color: #5e9ed6;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login - Medicare</h2>
        
        <?php if (isset($error_message)) { ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php } ?>

        <form method="POST">
            <input type="text" name="username" class="input-field" placeholder="Username" required><br>
            <input type="password" name="password" class="input-field" placeholder="Password" required><br>
            <button type="submit" class="btn-submit">Login</button>
        </form>

        <div class="register-link">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>
</body>
</html>

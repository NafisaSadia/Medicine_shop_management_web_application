<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare Plus </title> 
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2c3e50;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            
        }
        .login-container {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .login-container h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .form-group input {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group input:focus {
            outline: none;
            border-color: #2c3e50;
        }
        .error {
            color: red;
            font-size: 12px;
            display: none;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background-color: #2c3e50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #2c3e50;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>MediCare Plus<br><p style="color:red"><small>Admin</small></p></h2>
        
        <form id="adminLoginForm">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username">
                <div class="error" id="usernameError">Please enter a valid username.</div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
                <div class="error" id="passwordError">Please enter a valid password.</div>
            </div>
            <button type="button" class="btn" onclick="validateForm()">Login</button>
        </form>
    </div>

    <script>
        function validateForm() {
            // Clear existing error messages
            document.getElementById('usernameError').style.display = 'none';
            document.getElementById('passwordError').style.display = 'none';

            // Get input values
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();

            let isValid = true;

            // Validate username
            if (!username) {
                document.getElementById('usernameError').style.display = 'block';
                isValid = false;
            }

            // Validate password
            if (!password) {
                document.getElementById('passwordError').style.display = 'block';
                isValid = false;
            }

            if (isValid) {
                alert('Login successful!');
                // Proceed with form submission or other logic
            }
        }
    </script>
</body>
</html>

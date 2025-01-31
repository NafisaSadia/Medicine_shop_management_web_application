<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Database</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        header {
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            text-align: center;
        }
        .container {
            margin: 20px auto;
            width: 90%;
            max-width: 1200px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .table th {
            background-color: #3498db;
            color: white;
        }
        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .form-section {
            margin-bottom: 20px;
        }
        .form-section form {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        .form-section input, .form-section button {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .form-section button {
            background-color: rgb(234, 89, 27);
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-section button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Customer Database</h1>
    </header>

    <div class="container">
        <div class="form-section">
            <h2>Add New Customer</h2>
            <form method="POST" action="">
                <input type="text" name="customer_name" placeholder="Customer Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="phone" placeholder="Phone Number" required>
                <input type="text" name="address" placeholder="Address" required>
                <button type="submit" name="add_customer">ADD</button>
            </form>
        </div>

        <h2><p style="color:red"><u>Customer Records</u></p></h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Date Added</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection (replace placeholders with actual credentials)
                $conn = new mysqli('localhost', 'root', '', 'customer_db');

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Handle form submission
                if (isset($_POST['add_customer'])) {
                    $customer_name = $_POST['customer_name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $date_added = date('Y-m-d H:i:s');

                    $stmt = $conn->prepare("INSERT INTO customers (customer_name, email, phone, address, date_added) VALUES (?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssss", $customer_name, $email, $phone, $address, $date_added);
                    $stmt->execute();
                    $stmt->close();
                }

                // Fetch customer records
                $result = $conn->query("SELECT * FROM customers ORDER BY date_added DESC");

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['customer_name']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['phone']}</td>";
                        echo "<td>{$row['address']}</td>";
                        echo "<td>{$row['date_added']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No customer records found.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

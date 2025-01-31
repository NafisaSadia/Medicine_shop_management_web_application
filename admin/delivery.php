<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Management</title>
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
            flex-wrap: wrap;
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
            background-color: #138496;
        }
    </style>
</head>
<body>
    <header>
        <h1>Delivery Management</h1>
    </header>

    <div class="container">
        <div class="form-section">
            <h2>Add New Delivery</h2>
            <form method="POST" action="">
                <input type="text" name="order_id" placeholder="Order ID" required>
                <input type="text" name="customer_name" placeholder="Customer Name" required>
                <input type="text" name="delivery_address" placeholder="Delivery Address" required>
                <input type="text" name="delivery_status" placeholder="Status (e.g., Pending, Delivered)" required>
                <button type="submit" name="add_delivery">ADD</button>
            </form>
        </div>

        <h2><p style="color:red"><u>Delivery Records</u></p></h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Delivery Address</th>
                    <th>Status</th>
                    <th>Date Added</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection (replace placeholders with actual credentials)
                $conn = new mysqli('localhost', 'root', '', 'delivery_db');

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Handle form submission
                if (isset($_POST['add_delivery'])) {
                    $order_id = $_POST['order_id'];
                    $customer_name = $_POST['customer_name'];
                    $delivery_address = $_POST['delivery_address'];
                    $delivery_status = $_POST['delivery_status'];
                    $date_added = date('Y-m-d H:i:s');

                    $stmt = $conn->prepare("INSERT INTO deliveries (order_id, customer_name, delivery_address, delivery_status, date_added) VALUES (?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssss", $order_id, $customer_name, $delivery_address, $delivery_status, $date_added);
                    $stmt->execute();
                    $stmt->close();
                }

                // Fetch delivery records
                $result = $conn->query("SELECT * FROM deliveries ORDER BY date_added DESC");

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['order_id']}</td>";
                        echo "<td>{$row['customer_name']}</td>";
                        echo "<td>{$row['delivery_address']}</td>";
                        echo "<td>{$row['delivery_status']}</td>";
                        echo "<td>{$row['date_added']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No delivery records found.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

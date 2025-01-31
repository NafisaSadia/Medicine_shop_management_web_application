<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
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
            box-shadow: 0 2px 5px rgba(192, 67, 67, 0.1);
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
            background-color:rgb(234, 89, 27);
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-section button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <header>
        <h1>Sales</h1>
    </header>

    <div class="container">
        <div class="form-section">
            <h2>Add New Sale</h2>
            <form method="POST" action="">
                <input type="text" name="product_name" placeholder="Product Name" required>
                <input type="number" name="quantity" placeholder="Quantity" required>
                <input type="number" step="0.01" name="price" placeholder="Price per Unit" required>
                <button type="submit" name="add_sale">ADD</button>
            </form>
        </div>

        <h2><p style="color:red"><u>Sales Records</u><p></h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price per Unit</th>
                    <th>Total Price</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection (replace placeholders with actual credentials)
                $conn = new mysqli('localhost', 'root', '', 'sales_db');

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Handle form submission
                if (isset($_POST['add_sale'])) {
                    $product_name = $_POST['product_name'];
                    $quantity = $_POST['quantity'];
                    $price = $_POST['price'];
                    $total_price = $quantity * $price;
                    $date = date('Y-m-d H:i:s');

                    $stmt = $conn->prepare("INSERT INTO sales (product_name, quantity, price, total_price, sale_date) VALUES (?, ?, ?, ?, ?)");
                    $stmt->bind_param("sidds", $product_name, $quantity, $price, $total_price, $date);
                    $stmt->execute();
                    $stmt->close();
                }

                // Fetch sales records
                $result = $conn->query("SELECT * FROM sales ORDER BY sale_date DESC");

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['product_name']}</td>";
                        echo "<td>{$row['quantity']}</td>";
                        echo "<td>\${$row['price']}</td>";
                        echo "<td>\${$row['total_price']}</td>";
                        echo "<td>{$row['sale_date']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No sales records found.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

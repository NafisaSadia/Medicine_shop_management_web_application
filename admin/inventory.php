<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Inventory</title>
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
            padding: 10px 20px;
            text-align: center;
        }
        .container {
            margin: 20px;
        }
        .category {
            margin-bottom: 20px;
        }
        .category h2 {
            color: #333;
            margin-bottom: 10px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color:  #3498db;
            color: white;
        }
    </style>
</head>
<body>

<header>
    <h1>Medicine Inventory</h1>
</header>

<div class="container">
    <!-- Prescription Medicines -->
    <div class="category">
        <h2>Prescription Medicines</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Medicine Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Example PHP code to fetch data
                // Replace with database query logic
                $prescription_meds = [
                    ["Paracetamol", 100, "$5"],
                    ["Amoxicillin", 50, "$10"],
                ];

                foreach ($prescription_meds as $med) {
                    echo "<tr>\n";
                    echo "<td>{$med[0]}</td>\n";
                    echo "<td>{$med[1]}</td>\n";
                    echo "<td>{$med[2]}</td>\n";
                    echo "</tr>\n";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Over-the-Counter Medicines -->
    <div class="category">
        <h2>Over-the-Counter Medicines</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Medicine Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <!-- Similar PHP logic as above -->
                <?php
                // Example PHP code to fetch data
                // Replace with database query logic
                $prescription_meds = [
                    ["Paracetamol", 100, "$5"],
                    ["Amoxicillin", 50, "$10"],
                ];

                foreach ($prescription_meds as $med) {
                    echo "<tr>\n";
                    echo "<td>{$med[0]}</td>\n";
                    echo "<td>{$med[1]}</td>\n";
                    echo "<td>{$med[2]}</td>\n";
                    echo "</tr>\n";
                }
                ?>

            </tbody>
        </table>
    </div>

    <!-- Healthcare Devices -->
    <div class="category">
        <h2>Healthcare Devices</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Device Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <!-- Similar PHP logic as above -->
            </tbody>
        </table>
    </div>

    <!-- Personal Care -->
    <div class="category">
        <h2>Personal Care</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <!-- Similar PHP logic as above -->
            </tbody>
        </table>
    </div>

    <!-- Vitamins and Supplements -->
    <div class="category">
        <h2>Vitamins and Supplements</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <!-- Similar PHP logic as above -->
            </tbody>
        </table>
    </div>

    <!-- Ayurvedic Products -->
    <div class="category">
        <h2>Ayurvedic Products</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <!-- Similar PHP logic as above -->
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
<?php
require "db.php";

// -----------------------------------------------------------
// INTENTIONALLY VULNERABLE CODE 
// -----------------------------------------------------------

$product = $_POST['product'];

$sql = "SELECT * FROM products WHERE name='$product'";  // This directly concatenates user input into the SQL query,
$result = $conn->query($sql);

echo "<h3>Query Executed:</h3>";
echo "<pre>" . htmlspecialchars($sql) . "</pre>";

echo "<h3>Results:</h3>";

if ($result && $result->num_rows > 0) {
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>ID</th><th>Name</th><th>Price</th><th>Description</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['price']}</td>
                <td>{$row['description']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No products found.</p>";
}

$conn->close();

/*
<-------------------------------------------------------------
HOW THE ATTACK WORKS :

Input:  ' OR '1'='1
Query becomes:
    SELECT * FROM products WHERE name='' OR '1'='1'

Since '1'='1' is always TRUE, the WHERE clause matches every
row, so ALL products are returned even though no real product
name was typed. This proves the input is being treated as SQL
code instead of plain data.

To fix this code:
Use a prepared statement instead:

    $stmt = $conn->prepare("SELECT * FROM products WHERE name = ?");
    $stmt->bind_param("s", $product);
    $stmt->execute();
    $result = $stmt->get_result();

Prepared statements send the query structure and the user data
separately, so user input can never change the meaning of the
SQL query.
------------------------------------------------------------->
*/

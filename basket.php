<?php
session_start();
include("db.php"); // Connect to the database

$pagename = "Smart Basket"; // Page name

// Include header
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 
echo "<title>".$pagename."</title>";
echo "<body>";

include("headfile.html"); // Include header file
echo "<h4>".$pagename."</h4>"; // Display page name

// Check if the form was submitted
if (isset($_POST['h_prodid']) && isset($_POST['p_quantity'])) {
    $prodid = $_POST['h_prodid'];
    $quantity = $_POST['p_quantity'];

    // Store selected product in session
    $_SESSION['basket'][$prodid] = $quantity;

    echo "<p>Product ID ".$prodid." added to basket. Quantity: ".$quantity."</p>";
}

// Display basket content
if (isset($_SESSION['basket']) && count($_SESSION['basket']) > 0) {
    echo "<table border='1'>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>";

    $total = 0;
    foreach ($_SESSION['basket'] as $prodid => $quantity) {
        // Retrieve product details from database
        $SQL = "SELECT prodName, prodPrice FROM product WHERE prodId=$prodid";
        $exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));
        $arrayp = mysqli_fetch_array($exeSQL);

        $subtotal = $arrayp['prodPrice'] * $quantity;
        $total += $subtotal;

        echo "<tr>
                <td>".$arrayp['prodName']."</td>
                <td>".$quantity."</td>
                <td>£".$arrayp['prodPrice']."</td>
                <td>£".$subtotal."</td>
              </tr>";
    }

    echo "<tr>
            <td colspan='3'><b>Total</b></td>
            <td><b>£".$total."</b></td>
          </tr>";
    echo "</table>";
} else {
    echo "<p>Your basket is empty.</p>";
}

echo "<br><a href='clearbasket.php'>Clear Basket</a>";

include("footfile.html"); // Include footer
echo "</body>";
?>

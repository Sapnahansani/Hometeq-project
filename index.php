<?php
include ("db.php"); // Include db.php file to connect to DB
$pagename = "Make your home smart"; // Create and populate variable called $pagename

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; // Call in stylesheet
echo "<title>".$pagename."</title>"; // Display name of the page as window title
echo "<body>";
include ("headfile.html"); // Include header layout file 
echo "<h4>".$pagename."</h4>"; // Display name of the page on the web page

// Create a $SQL variable and populate it with a SQL statement that retrieves product details
$SQL = "SELECT prodId, prodName, prodPicNameSmall, prodDescripShort, prodPrice FROM Product";

// Run SQL query for connected DB or exit and display error message
$exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));

echo "<table style='border: 0px'>";

// Iterate through the array i.e. while the end of the array has not been reached, run through it
while ($arrayp = mysqli_fetch_array($exeSQL)) {
    echo "<tr>";
    echo "<td style='border: 0px'>";
    // Start the anchor tag linking to prodbuy.php with the product ID in the URL
    echo "<a href='prodbuy.php?prod_id=".$arrayp['prodId']."'>";
    // Display the small image as a clickable link
    echo "<img src='/homteq/images/" . $arrayp['prodPicNameSmall'] . "' height='200' width='200' alt='Product Image'>";

    // Close the anchor tag
    echo "</a>";
    echo "</td>";
    echo "<td style='border: 0px'>";
    echo "<p><h5>".$arrayp['prodName']."</h5>"; // Display product name
    echo "<p>".$arrayp['prodDescripShort']."</p>"; // Display short description
    echo "<p><b>Price: £".$arrayp['prodPrice']."</b></p>"; // Display product price
    echo "</td>";
    echo "</tr>";
}

echo "</table>";
include("footfile.html"); // Include footer layout
echo "</body>";
?>

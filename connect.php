<?php
// Database connection parameters
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "dbname";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data about states
$sql = "SELECT * FROM states";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Output HTML for each state
        echo "<h4 class='mb-3'>" . $row["state_name"] . "</h4>";
        echo "<img class='img-fluid w-50 float-right ml-4 mb-2' src='" . $row["image_path"] . "'>";
        echo "<p>" . $row["description"] . "</p>";
        echo "<a href='" . $row["learn_more_link"] . "' class='btn btn-primary py-md-3 px-md-5 mt-2'>learn more</a>";
        echo "<p></p>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

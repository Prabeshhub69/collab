<?php
// Database configuration and connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $from = $_POST['from'] ?? '';
    $to = $_POST['to'] ?? '';

    if (empty($from) || empty($to)) {
        die("From and To fields are required");
    }

    // Prepare and execute SQL query
    $sql = "SELECT * FROM bus WHERE from_location = ? AND to_location = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ss", $from, $to);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        die("Execute failed: " . $stmt->error);
    }

    // Fetch and display search results in a table
    if ($result->num_rows > 0) {
        echo "<h2>Available Buses</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Bus Name</th><th>Service Type</th><th>Departure Time</th><th>Arrival Time</th><th>From Location</th><th>To Location</th><th>Price</th><th>Available Seats</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['bus_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['service_type']) . "</td>";
            echo "<td>" . htmlspecialchars($row['departure_time']) . "</td>";
            echo "<td>" . htmlspecialchars($row['arrival_time']) . "</td>";
            echo "<td>" . htmlspecialchars($row['from_location']) . "</td>";
            echo "<td>" . htmlspecialchars($row['to_location']) . "</td>";
            echo "<td>" . htmlspecialchars($row['price']) . "</td>";
            echo "<td>" . htmlspecialchars($row['available_seats']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No buses available for the selected route.</p>";
    }

    // Close statement and connection
    $stmt->close();
}

// Close connection
$conn->close();
?>

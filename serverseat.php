<?php
// Establish MySQL connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle seat data request
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['seatNumber'])) {
        $seatNumber = $_GET['seatNumber'];

        $sql = "SELECT * FROM seats WHERE seat_number = '$seatNumber'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $seatInfo = array(
                'seatNumber' => $row['seat_number'],
                'isAvailable' => $row['is_available'],
                'isSelected' => $row['is_selected'],
                'isBooked' => $row['is_booked']
            );
            echo json_encode($seatInfo);
        } else {
            echo "Seat not found";
        }
    } else {
        echo "Seat number not provided";
    }
}

$conn->close();
?>

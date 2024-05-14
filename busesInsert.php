<?php
include 'database.php'; // Include the file with database connection code

if(isset($_POST['done'])){
    // Assign values from form to variables and sanitize them
    $bus_name = mysqli_real_escape_string($con, $_POST['bus_name']);
    $bus_number = mysqli_real_escape_string($con, $_POST['bus_number']);
    $capacity = (int)$_POST['capacity'];
    $service_type = mysqli_real_escape_string($con, $_POST['service_type']);
    $departure_time = $_POST['departure_time'];
    $arrival_time = $_POST['arrival_time'];
    $from_location = mysqli_real_escape_string($con, $_POST['from_location']);
    $to_location = mysqli_real_escape_string($con, $_POST['to_location']);
    $price = (float)$_POST['price'];
    $available_seats = (int)$_POST['available_seats'];

    // Construct the SQL query with properly escaped values
    $q = "INSERT INTO `bus`(`bus_name`, `bus_number`, `capacity`, `service_type`, `departure_time`, `arrival_time`, `from_location`, `to_location`, `price`, `available_seats`) 
          VALUES ('$bus_name', '$bus_number', $capacity, '$service_type', '$departure_time', '$arrival_time', '$from_location', '$to_location', $price, $available_seats)";

    // Execute the query
    $query = mysqli_query($con, $q);

    if ($query) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>



<!DOCTYPE html>
<html>
<head>
 <title></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

 <div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  Insert Operation </h1>
 </div><br>

 <label> Bus Name: </label>
 <input type="text" name="bus_name" class="form-control"> <br>

 <label> Bus Number: </label>
 <input type="text" name="bus_number" class="form-control"> <br>

 <label> Capacity: </label>
 <input type="text" name="capacity" class="form-control"> <br>

 <label> service_type: </label>
 <input type="text" name="service_type" class="form-control"> <br>

 <label> departure_time: </label>
 <input type="text" name="departure_time" class="form-control"> <br>

 <label> arrival_time: </label>
 <input type="text" name="arrival_time" class="form-control"> <br>

 <label> from_location: </label>
 <input type="text" name="from_location" class="form-control"> <br>
 
 <label> to_location: </label>
 <input type="text" name="to_location" class="form-control"> <br>

 <label> price: </label>
 <input type="text" name="price" class="form-control"> <br>

 <label> available_seats: </label>
 <input type="text" name="available_seats" class="form-control"> <br><!-- Fixed the missing double quote here -->

 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>

 </div>
 </form>
 </div>
</body>
</html>

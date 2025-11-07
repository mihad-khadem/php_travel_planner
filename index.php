<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "trip";

// connect and select database
$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
    die("Connection to database failed: " . mysqli_connect_error());
}
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $travel_date = $_POST['date'];
    $budget = $_POST['budget'];
    $stays = $_POST['days'];

    $sql = "INSERT INTO `trip` (`name`, `email`, `phone`, `age`, `gender`, `origin`, `destination`, `travel_date`, `budget`, `stays`)
            VALUES ('$name', '$email', '$phone', '$age', '$gender', '$origin', '$destination', '$travel_date', '$budget', '$stays')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Trip planned successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}

// insert sample records
// $sql = "INSERT INTO `trip` 
// (`name`, `email`, `phone`, `age`, `gender`, `origin`, `destination`, `travel_date`, `budget`, `stays`)
// VALUES 
// ('Alice Johnson', 'alice@example.com', '+1234567890', 28, 'Female', 'New York', 'Paris', '2025-12-10', 2500, 5),
// ('Bob Smith', 'bob@example.com', '+1987654321', 35, 'Male', 'London', 'Tokyo', '2025-11-15', 3000, 7)";



mysqli_close($conn);
?>

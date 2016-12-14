<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Create database
$db_selected = mysqli_select_db($conn,'my_db');
$sql = "delete from MyGuests";

if (mysqli_query($conn, $sql)) {
    echo "Table truncated";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
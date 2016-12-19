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
//$sql = "delete from MyGuests";
//$sql = "alter table states drop column status";
$sql="delete from myguests where id=1";
if (mysqli_query($conn, $sql)) {
    echo "Row deleted";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
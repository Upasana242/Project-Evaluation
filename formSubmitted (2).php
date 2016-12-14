<!Doctype html>
<html>
    <body>
<?php 
		
// define variables and set to empty values
$name =  "";
$email =  "";
$gender =  "";
$comment =  "";
$website = "";
$flag=1;

if ($_SERVER["REQUEST_METHOD"] == "POST"||$_SERVER["REQUEST_METHOD"] == "GET") {
  if (empty($_POST["name"])) {
    header('Location: feedback_form.html');
      $flag=0;
  } else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["email"])) {
    header('Location: feedback_form.html');
      $flag=0;
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    header('Location: feedback_form.html');
      $flag=0;
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($flag==1){
$servername = "localhost";	// Create connection
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);		// Check connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$db_selected = mysqli_select_db($conn,'my_db');

if (!$db_selected) {
  // If we couldn't, then it either doesn't exist, or we can't see it.
  $sql = 'CREATE DATABASE my_db';	// Create database

  if (mysqli_query($conn,$sql)) {
      echo "Database my_db created successfully\n";
  } else {
      echo 'Error creating database: ' . mysqli_error() . "\n";
  }
}
// sql to create table
mysqli_select_db($conn,'my_db');
if (!mysqli_query($conn,"DESCRIBE MyGuests")) {
	$sql = "CREATE TABLE MyGuests (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	name VARCHAR(30) NOT NULL,
	email VARCHAR(50),
	website VARCHAR(50),
	comments VARCHAR(150),
	gender VARCHAR(6)
	)";
	if (mysqli_query($conn, $sql)) {
		echo "Table MyGuests created successfully";
	} else {
		echo "Error creating table: " . mysqli_error($conn);
	}
}

$sql = "INSERT INTO MyGuests (name, email, website, comments,gender)
VALUES ('$name','$email','$website','$comment','$gender')";

if (mysqli_query($conn, $sql)) {
    header('Location: formSubmitted.html');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
?>
</body>
</html>

















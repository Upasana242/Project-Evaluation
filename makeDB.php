<?php
$servername = "localhost";	// Create connection
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);		// Check connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$db_selected = mysqli_select_db($conn,'my_db');

if ($db_selected){
$sql="CREATE TABLE IF NOT EXISTS cities (
  city_id int(2) NOT NULL,
  city_name varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  state_id int(2) NOT NULL,
) ENGINE=InnoDB AUTO_INCREMENT=6178 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
    
  if (mysqli_query($conn,$sql)) {
      echo "Table created successfully\n";
  } else {
      echo 'Error creating table: ' . mysqli_error() ."\n";
  }
    
$sql="INSERT INTO cities VALUES
(1,'Siliguri',1),
(2,'Kolkata',1),
(3,'Durgapur', 1),
(4, 'Chennai', 2),
(5, 'Trichy', 2),
(6, 'Thanjavur', 2),
(7, 'Lucknow', 3),
(8, 'Varanasi', 3),
(9, 'Allahabad', 3),
(10, 'Kanpur', 3),
(11, 'la Laguna', 4),
(12, 'Santa Cruz de Tenerife', 4),
(13, 'Madrid', 5),
(14, 'Getafe', 5),
(15, 'Cincinnati', 6),
(16, 'Dayton', 6),
(17, 'Cleveland', 6),
(18, 'Columbus', 6),
(19, 'Baton Rouge', 7),
(20,'Lafayette',7, 1),
(21,'New Orleans',7),
(22,'Oklahoma City',8),
(23,'Tulsa',8),
(24,'Hiroshima',9),
(25,'Fukuyama',9),
(26,'Onomichi',9),
(27,'Kioto',10),
(28,'Uji',10),
(29,'Osaka',11),
(30,'Daito',11),
(31,'Izumi',11)";
    
  if (mysqli_query($conn,$sql)) {
      echo "31 insertions successful\n";
  } else {
      echo 'Error inserting: ' . mysqli_error() ."\n";
  }
    
$sql="CREATE TABLE IF NOT EXISTS states (
  state_id int(2) NOT NULL,
  state_name varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  country_id int(1) NOT NULL,
  ) ENGINE=InnoDB AUTO_INCREMENT=1652 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
    
  if (mysqli_query($conn,$sql)) {
      echo "Table states created successfully\n";
  } else {
      echo 'Error creating table: ' . mysqli_error() ."\n";
  }
    
$sql="INSERT INTO states VALUES
(1, 'West Bengal', 1),
(2, 'Tamil Nadu', 1),
(3, 'Uttar Pradesh', 1),
(4, 'Canary Islands', 2),
(5, 'Madrid', 2),
(6, 'Ohio', 3),
(7, 'Louisiana', 3),
(8, 'Oklahoma', 3),
(9, 'Hiroshima', 4),
(10, 'Kyoto', 4),
(11, 'Osaka', 4)";

      if (mysqli_query($conn,$sql)) {
      echo "11 insertions successful\n";
  } else {
      echo 'Error inserting: ' . mysqli_error() ."\n";
  }
    
$sql="CREATE TABLE IF NOT EXISTS countries (
  country_id int(1) NOT NULL,
  country_name varchar(30) CHARACTER SET utf8 NOT NULL,
 ) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
    
  if (mysqli_query($conn,$sql)) {
      echo "Table countries created successfully\n";
  } else {
      echo 'Error creating table: ' . mysqli_error() ."\n";
  }
    
$sql="INSERT INTO `countries` (`country_id`, `country_name`, `status`) VALUES
(1, 'India'),
(2, 'Spain'),
(3, 'USA'),
(4, 'Japan')";
}
  if (mysqli_query($conn,$sql)) {
      echo "4 insertions successful\n";
  } else {
      echo 'Error inserting: ' . mysqli_error() ."\n";
  }

mysqli_close($conn);
?>
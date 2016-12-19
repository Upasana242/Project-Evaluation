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
  status tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:Blocked, 1:Active'
) ENGINE=InnoDB AUTO_INCREMENT=6178 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
    
  if (mysqli_query($conn,$sql)) {
      echo "Table created successfully\n";
  } else {
      echo 'Error creating table: ' . mysqli_error() ."\n";
  }
    
$sql="INSERT INTO cities VALUES
(1,'Siliguri',1, 1),
(2,'Kolkata',1, 1),
(3,'Durgapur', 1, 1),
(4, 'Mumbai', 2, 1),
(5, 'Pune', 2, 1),
(6, 'Nagpur', 2, 1),
(7, 'Lucknow', 3, 1),
(8, 'Varanasi', 3, 1),
(9, 'Allahabad', 3, 1),
(10, 'Kanpur', 3, 1),
(11, 'la Laguna', 4, 1),
(12, 'Santa Cruz de Tenerife', 4, 1),
(13, 'Madrid', 5, 1),
(14, 'Getafe', 5, 1),
(15, 'Cincinnati', 6, 1),
(16, 'Dayton', 6, 1),
(17, 'Cleveland', 6, 1),
(18, 'Columbus', 6, 1),
(19, 'Baton Rouge', 7, 1),
(20,'Lafayette',7, 1),
(21,'New Orleans',7, 1),
(22,'Oklahoma City',8, 1),
(23,'Tulsa',8, 1),
(24,'Hiroshima',9, 1),
(25,'Fukuyama',9, 1),
(26,'Onomichi',9, 1),
(27,'Kioto',10, 1),
(28,'Uji',10, 1),
(29,'Osaka',11, 1),
(30,'Daito',11, 1),
(31,'Izumi',11, 1)";
    
  if (mysqli_query($conn,$sql)) {
      echo "31 insertions successful\n";
  } else {
      echo 'Error inserting: ' . mysqli_error() ."\n";
  }
    
$sql="CREATE TABLE IF NOT EXISTS states (
  state_id int(2) NOT NULL,
  state_name varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  country_id int(1) NOT NULL,
  status tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:Blocked, 1:Active'
) ENGINE=InnoDB AUTO_INCREMENT=1652 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
    
  if (mysqli_query($conn,$sql)) {
      echo "Table states created successfully\n";
  } else {
      echo 'Error creating table: ' . mysqli_error() ."\n";
  }
    
$sql="INSERT INTO states VALUES
(1, 'West Bengal', 1, 1),
(2, 'Maharashtra', 1, 1),
(3, 'Uttar Pradesh', 1, 1),
(4, 'Canary Islands', 2, 1),
(5, 'Madrid', 2, 1),
(6, 'Ohio', 3, 1),
(7, 'Louisiana', 3, 1),
(8, 'Oklahoma', 3, 1),
(9, 'Hiroshima', 4, 1),
(10, 'Kyoto', 4, 1),
(11, 'Osaka', 4, 1)";

      if (mysqli_query($conn,$sql)) {
      echo "11 insertions successful\n";
  } else {
      echo 'Error inserting: ' . mysqli_error() ."\n";
  }
    
$sql="CREATE TABLE IF NOT EXISTS countries (
  country_id int(1) NOT NULL,
  country_name varchar(30) CHARACTER SET utf8 NOT NULL,
  status tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:Blocked, 1:Active'
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
    
  if (mysqli_query($conn,$sql)) {
      echo "Table countries created successfully\n";
  } else {
      echo 'Error creating table: ' . mysqli_error() ."\n";
  }
    
$sql="INSERT INTO `countries` (`country_id`, `country_name`, `status`) VALUES
(1, 'India', 1),
(2, 'Spain', 1),
(3, 'USA', 1),
(4, 'Japan', 1)";
}
  if (mysqli_query($conn,$sql)) {
      echo "4 insertions successful\n";
  } else {
      echo 'Error inserting: ' . mysqli_error() ."\n";
  }

mysqli_close($conn);
?>
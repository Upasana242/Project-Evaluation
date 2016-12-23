<?php
function getFromTable($servername, $username, $password, $dbname, $tablename, $fieldname){
    $conn = mysqli_connect($servername, $username, $password);
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$db_selected = mysqli_select_db($conn,$dbname);
    $query = "SELECT * FROM ".$tablename." ORDER BY ".$fieldname." ASC";
    $result = mysqli_query($conn,$query); 
    return($result);
}
function getRow(){
      $conn=establishCon('localhost','root','','my_db');
      $sql = "SELECT myguests.name, myguests.email, myguests.comments, myguests.gender, countries.country_name, states.state_name, cities.city_name FROM myguests,countries,states,cities where
      myguests.countryid =countries.country_id AND myguests.stateid=states.state_id AND
      myguests.cityid =cities.city_id";
	$result = mysqli_query($conn, $sql);
    return($result);
}
function establishCon($servername, $username, $password, $dbname){
    $conn = mysqli_connect($servername, $username, $password);
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

    $db_selected = mysqli_select_db($conn,$dbname);
    return ($conn);
}

?>
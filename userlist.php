<!Doctype html>
<html>
	<head><title>Our Users</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/table.css" rel="stylesheet"/>
	</head>
	<body background="img/bg1.jpg">
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
            $sql = "SELECT myguests.name, myguests.email, myguests.comments, myguests.gender, countries.country_name, states.state_name, cities.city_name FROM myguests,countries,states,cities where
            myguests.countryid=countries.country_id AND myguests.stateid=states.state_id AND
            myguests.cityid=cities.city_id";
	$result = mysqli_query($conn, $sql);
//    echo "<pre>";
//    print_r($result);
//    die;
    if ($result===FALSE){
        echo "Ladidadadidi";
    }
	if (mysqli_num_rows($result) > 0) {
		echo "<table>
		<tr>
			<td class='tablehead'>ID
			</td>
			<td class='tablehead'>Name
			</td>		
			<td class='tablehead'>Email
			</td>
			<td class='tablehead'>Comment
			</td>
			<td class='tablehead'>Gender
			</td>
            <td class='tablehead'>City
			</td>
            <td class='tablehead'>State
			</td>
            <td class='tablehead'>Country
			</td>
		</tr>";
		$i=1;
		while($row = mysqli_fetch_assoc($result)) {
			if ($row["name"]!=""){
				echo "<tr>";		// output data of each row
				echo "<td class='rightbord'>" . $i."</td>"."<td class='rightbord'>".$row["name"]."</td><td class='rightbord'>".$row["email"]."</td><td class='rightbord'>".$row["comments"]."</td><td class='rightbord'>".$row["gender"]."</td><td class='rightbord'>".$row["city_name"]."</td><td class='rightbord'>".$row["state_name"]."</td><td class='rightbord'>".$row["country_name"]."</td></tr>";
				$i++;
			}
		}
		echo "</table>";
	} else {
		echo "<div>There are no results to display.</div>";
	}
}
else{
	echo 'Error selecting database: ' . mysqli_error() . "\n";
}
mysqli_close($conn);
?>
</body>
</html>



















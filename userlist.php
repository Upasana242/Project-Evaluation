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
	$sql = "SELECT name,email,comments,gender FROM MyGuests";
	$result = mysqli_query($conn, $sql);

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
		</tr>";
		$i=1;
		while($row = mysqli_fetch_assoc($result)) {
			if ($row["name"]!=""){
				echo "<tr>";		// output data of each row
				echo "<td class='rightbord'>" . $i."</td>"."<td class='rightbord'> " .$row["name"]."</td><td class='rightbord'>". $row["email"]."</td>"."<td class='rightbord'>".$row["comments"]."</td>"."<td>".$row["gender"]."</td></tr>";
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



















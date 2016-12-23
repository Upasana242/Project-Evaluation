<?php
require ('FormController.php');
$conn=establishCon('localhost','root','','my_db');

if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){
    //Get all state data
    $query = "SELECT * FROM states WHERE country_id = ".$_POST['country_id']." ORDER BY state_name ASC";
    
    $result = mysqli_query($conn, $query);
    
    //Display states list
    if (mysqli_num_rows($result) > 0){
        echo '<option value="">Select state</option>';
        while($row = mysqli_fetch_assoc($result)){ 
            echo '<option value="'.$row['state_id'].'">'.$row['state_name'].'</option>';
        }
    }else{
        echo '<option value="">State not available</option>';
    }
}

if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){
    //Get all city data
    $query ="SELECT * FROM cities WHERE state_id = ".$_POST['state_id']." ORDER BY city_name ASC";
    
    $result = mysqli_query($conn, $query);
    
    //Display cities list
    if (mysqli_num_rows($result) > 0){
        echo '<option value="">Select city</option>';
        while($row = mysqli_fetch_assoc($result)){ 
            echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
        }
    }else{
        echo '<option value="">City not available</option>';
    }
}

mysqli_close($conn);
?>
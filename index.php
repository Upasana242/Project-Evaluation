<!DOCTYPE HTML>  
<html>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/form.css" rel="stylesheet"/>
    <title>Feedback form</title>
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

//Get all country data
$query = "SELECT * FROM countries ORDER BY country_name ASC";
$result = mysqli_query($conn,$query);
?>

<div>
<form name="feedbackForm" method="post"  action="formSubmitted.php">

Name: <span style="color:red">*</span>
<input type="text" name="name" onblur="validateName();">
<span id="validation1"> <br>*This field is required.</span>
<br>
<br>
E-mail:<span style="color:red">*</span>
<input type="text" name="email" onblur="validateEmail();">
<span id="validation3"> <br>*This field is required.</span>
<br>
<br>

<select name="country" id="country">
    <option value="">Select Country</option>
    <?php
    if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){ 
            echo '<option value="'.$row['country_id'].'">'.$row['country_name'].'</option>';
        }
    }else{
        echo '<option value="">Country not available</option>';
    }
    ?>
</select>
<br>
<select name="state" id="state">
    <option value="">Select country first</option>
</select>
<br>
<select name="city" id="city">
    <option value="">Select state first</option>
</select>
 <br>       
Feedback: <textarea name="comment" rows="5" cols="25"></textarea>
<br>
<br>
Gender:<span style="color:red">*</span>
<input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="other">Others
<br><br>
<input type="submit" name="submit" value="Submit" id="submit" disabled> 

</form>
</div>
<script text="text/javaScript" src="form.js"></script>
    <script src="https://code.jquery.com/jquery-1.7.min.js"
  integrity="sha256-/05Jde9AMAT4/o5ZAI23rUf1SxDYTHLrkOco0eyRV84="
  crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        console.log(countryID);
        if(countryID){
              console.log(countryID);
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
});
</script>
        <?php mysqli_close($conn);?>
</body>
</html>
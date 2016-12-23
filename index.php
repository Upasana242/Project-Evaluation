<!DOCTYPE HTML>  
<html>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/form.css" rel="stylesheet"/>
    <title>Feedback form</title>
</head>
<body background="img/bg1.jpg">  
    
<?php
    
require ('FormController.php');
$result= getFromTable ('localhost', 'root', '', 'my_db', 'countries', 'country_name');
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
<script type="text/javascript" src="js/dependentSelect.js">

</script>
</body>
</html>
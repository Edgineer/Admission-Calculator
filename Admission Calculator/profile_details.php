<!DOCTYPE html>
<head>
	<title>
		Edgine - Sign Up
	</title>
</head>

<style>
body {
    background-color: #396060;
}

form {
    border: 3px solid #f44336;
}


p.sansserif {
    font-family: Arial, Helvetica, sans-serif;
    margin: 1cm;
    color: white;
}

b{
	color: white;
}

h1{
	color: white;
}

a{
	color: white;
	text-align: center;
}

input[type=text], input[type=password], input[type=number] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color:  #f44336;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.container {
    padding: 16px;
}

</style>

<body>

<div style="text-align: center;"><IMG SRC="AdmissionCalculatorlogo.png" ALT="eloxacto logo"> </div>

<h1>Profile Setup</h1>

<p class="sansserif"> Hello <?php echo $_GET['uname'];?>, lets finish setting up your profile! </p>

<form action="profile_import.php">

  <div class="container">

	<label><b>Username</b></label>
    <input type="text" value="<?php echo $_GET['uname'];?>"" name="uname" readonly>

    <label><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="fname" required>

    <label><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="lname" required>
    
    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
     
    <label><b>GPA</b></label>
    <input type="number" step=0.01 placeholder="Enter GPA" name="gpa" required>

    <label><b>SAT Math</b></label>
    <input type="number" placeholder="Enter SAT Math Score" name="msat" required>

    <label><b>SAT English</b></label>
    <input type="number" placeholder="Enter SAT English Score" name="esat" required>
    
    <label><b>SAT Writing</b></label>
    <input type="number" placeholder="Enter SAT Writing Score" name="wsat" required>
    
    <label><b>Total number of AP/IB Classes Taken</b></label>
    <select name="ap">
  	<option value="very_low">3 or less</option>
  	<option value="low">5 or less</option>
  	<option value="medium">7 or less</option>
  	<option value="high">11 or less</option>
  	<option value="very_high">+12 More than 11 </option>
	</select>

	<br>
     
    <label><b>ACT Math</b></label>
    <input type="number" value=0 name="mact">
    
    <label><b>ACT English</b></label>
    <input type="number" value=0 name="eact">
        
    <label><b>ACT Composite</b></label>
    <input type="number" value=0 name="cact">

    <label><b>How much have you worked on your personal statement and other application papers?</b></label>
    <select name="essay">
  	<option value="very_low">1 Week, minimal review</option>
  	<option value="low">2 Weeks, Less than 3 Reviews</option>
  	<option value="medium">3 Weeks, Less than 5 Reviews</option>
  	<option value="high">4 Weeks, Less than 7 Reviews</option>
  	<option value="very_high">+4 Weeks, More than 7 Reviews</option>
	</select>
    
    <label><b>Gender</b></label>
    <select name="gender">
  	<option value="female">Female</option>
  	<option value="male">Male</option>
	</select>
	
    <br>

    <label><b>First-generation student</b></label>
    <select name="1gen">
  	<option value="yes">Yes</option>
  	<option value="no">No</option>
	</select>
    
    <br>
    
    <label><b>State Residency</b></label>
    <input type="text" placeholder="Enter state residency" name="state" required>
    
    <label><b>Total work or volunteer hours throughout highschool</b></label>
       <select name="hours">
  	<option value="very_low">Less than or equal to 20 hours</option>
  	<option value="low">More than 20 hours and less than or equal to 40 hours</option>
  	<option value="medium">More than 40 hours and less than or equal to 60 hours</option>
  	<option value="high">More than 60 hours and less than or equal to 99 hours</option>
  	<option value="very_high">More than or equal to 100 hours</option>
	</select>

	<br>

    <button type="submit" value="1" name="action">Sign Up</button>
  </div>

</form>


</body>
</html>
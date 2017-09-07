<?php

$uname = $_GET["uname"];
$fname = $_GET["fname"];
$lname = $_GET["lname"];
$password = $_GET["psw"];

$ap = $_GET["ap"];
$gpa = $_GET["gpa"];
$essay = $_GET["essay"];

$msat = $_GET["msat"];
$esat = $_GET["esat"];
$wsat = $_GET["wsat"];
$mact = $_GET["mact"];
$eact = $_GET["eact"];
$cact = $_GET["cact"];
	
$gender = $_GET["gender"];
$firstgen = $_GET["1gen"];
$state = $_GET["state"];
$hours = $_GET["hours"];

$newProfile = $_GET["action"];

try {
		$dbUsers = new PDO ('mysql:host=localhost;dbname=users','root','/-/-/-/');
    	$dbUsers->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
	    // roll back the transaction if something failed
	    $dbUsers->rollback();
	    echo "Error: " . $e->getMessage();
	  }


	if ($newProfile == '1') {
		try{
	    	// begin the transaction
	    	$dbUsers->beginTransaction();

	    	// SQL statement
			$dbUsers->exec("INSERT INTO user_data (username, password, first_name, last_name, gpa, application_essay, secondary_edu_rigor, math_sat, english_sat, writing_sat, work, state_residency, composite_act, english_act, math_act, gender, first_generation) VALUES ('$uname','$password','$fname','$lname','$gpa','$essay','$ap','$msat','$esat','$wsat','$hours','$state','$cact','$eact','$mact','$gender','$firstgen')");
		
			// commit the transaction
		    $dbUsers->commit();
	    	echo "New records created successfully";
	   	} catch(PDOException $e) {
	    	// roll back the transaction if something failed
	    	$dbUsers->rollback();
	    	echo "Error: " . $e->getMessage();
	  	  }

	    	$conn = null;
	}

	else{ //Update an exsisting Profile
		try {

		    $sql = "UPDATE user_data SET password='$password', first_name='$fname', last_name='$lname', gpa='$gpa', application_essay='$essay', secondary_edu_rigor='$ap', math_sat='$msat', english_sat='$esat', writing_sat='$wsat', work='$hours', state_residency='$state', composite_act='$cact', english_act='$eact', math_act='$mact', gender='$gender', first_generation='$firstgen' WHERE username='$uname'";

		    // Prepare statement
		    $stmt = $dbUsers->prepare($sql);

		    // execute the query
		    $stmt->execute();

		    // echo a message to say the UPDATE succeeded
		    echo $stmt->rowCount() . " records UPDATED successfully";
		    }
		catch(PDOException $e)
		    {
		    echo $sql . "<br>" . $e->getMessage();
		    }

		$conn = null;
	}

 header("Location: profile.php?uname=$uname");

?>

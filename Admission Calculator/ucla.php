<!DOCTYPE html>
<head>
	<title>
		Edgine - UCLA
	</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>
body {
    background-color: #396060;
}

/* Set a style for all buttons */
button {
    background-color: #f44336;
    color: white;
    text-align: center;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 10%;
}

button:hover {
    opacity: 0.8;
}

p.sansserif {
    font-family: Arial, Helvetica, sans-serif;
    margin: 1cm;
    color: white;
}

a{
	color: black;
	text-align: center;
}
</style>

<body>

<div style="text-align: center;"><IMG SRC="http://s3.amazonaws.com/campusreform/6662/UCLA.jpg" ALT="UCLA Campus"> </div>

<?php

$dbUsers = new PDO ('mysql:host=localhost;dbname=users','root','/-/-/-/-/');
$username = $_GET["uname"];
$userQuery = "SELECT * FROM user_data WHERE username = '$username'";
$userGet = $dbUsers->query($userQuery);
$userData = $userGet->fetch(PDO::FETCH_ASSOC);


$dbSchools = new PDO ('mysql:host=localhost;dbname=ipeds_2015','root','Eloxacto');
$schoolQuery = "SELECT * FROM admissionandtest WHERE unitid = 110662";
$schoolGet = $dbSchools->query($schoolQuery);
$schoolData = $schoolGet->fetch(PDO::FETCH_ASSOC);

$totalApplicants = ((integer)$schoolData['Applicants men']) + ((integer)$schoolData['Applicants women']);
$totalAdmitted = ((integer)$schoolData['Admissions men'] + (integer)$schoolData['Admissions women']);



$admissionProbibility = 0;
//Catergories
//==Critical (70%)
//==Important(25%)
//==Considered(5%)

//Critical
$gpa = (double)$userData['gpa']; 
if($gpa >= 3.75){
  $admissionProbibility = $admissionProbibility + 17.5;
}
elseif ($gpa >= 3.5 AND $gpa < 3.75) {
  $admissionProbibility = $admissionProbibility + 6; 
}
elseif ($gpa >= 3.25 AND $gpa < 3.5) {
  $admissionProbibility = $admissionProbibility + 3; 
}
elseif ($gpa >= 3 AND $gpa < 3.25) {
  $admissionProbibility = $admissionProbibility + 2; 
}
elseif ($gpa >= 2.5 AND $gpa < 3) {
  $admissionProbibility = $admissionProbibility + 1; 
}

//Essay
switch ($userData['application_essay']) {
  case 'very_high':
    $admissionProbibility = $admissionProbibility + 27.5;
    break;
  case 'high':
    $admissionProbibility = $admissionProbibility + 22;
    break;
  case 'medium':
    $admissionProbibility = $admissionProbibility + 13.5;
    break;
  case 'low':
   $admissionProbibility = $admissionProbibility + 9;
    break;
  case 'very_low':
    $admissionProbibility = $admissionProbibility + 5;
    break;
}


//Rigor of High School
switch ($userData['secondary_edu_rigor']) {
  case 'very_high':
    $admissionProbibility = $admissionProbibility + 19.5;
    break;
  case 'high':
    $admissionProbibility = $admissionProbibility + 14;
    break;
  case 'medium':
    $admissionProbibility = $admissionProbibility + 10.5;
    break;
  case 'low':
   $admissionProbibility = $admissionProbibility + 7;
    break;
  case 'very_low':
    $admissionProbibility = $admissionProbibility + 3.5;
    break;
}

//Test Scores
 $math_sat = (double)$userData['math_sat'];
 $english_sat = (double)$userData['english_sat'];
 $writing_sat = (double)$userData['writing_sat'];
    
if($math_sat >= 700){
  $admissionProbibility = $admissionProbibility + 6.833;
}
elseif ($math_sat >= 600 AND $math_sat < 700) {
  $admissionProbibility = $admissionProbibility + 4.383; 
}
elseif ($math_sat >= 500 AND $math_sat < 600) {
  $admissionProbibility = $admissionProbibility + 3.633; 
}
elseif ($math_sat >= 400 AND $math_sat < 500) {
  $admissionProbibility = $admissionProbibility + 1.466; 
}

if($english_sat >= 700){
  $admissionProbibility = $admissionProbibility + 6.833;
}
elseif ($english_sat >= 600 AND $english_sat < 700) {
  $admissionProbibility = $admissionProbibility + 4.258; 
}
elseif ($english_sat >= 500 AND $english_sat < 600) {
  $admissionProbibility = $admissionProbibility + 2.041; 
}
elseif ($english_sat >= 400 AND $english_sat < 500) {
  $admissionProbibility = $admissionProbibility + 0.5833; 
}

if($writing_sat >= 700){
  $admissionProbibility = $admissionProbibility + 6.833;
}
elseif ($writing_sat >= 600 AND $writing_sat < 700) {
  $admissionProbibility = $admissionProbibility + 3.966; 
}
elseif ($writing_sat >= 500 AND $writing_sat < 600) {
  $admissionProbibility = $admissionProbibility + 1.866; 
}
elseif ($writing_sat >= 400 AND $writing_sat < 500) {
  $admissionProbibility = $admissionProbibility + 0.525; 
}
  
$math_act = (double)$userData['math_act'];
$english_act = (double)$userData['english_act'];
$composite_act = (double)$userData['composite_act'];
//do something with ACT scores
/*
$schoolData['SAT Critical Reading 25th percentile score']
$schoolData['SAT Critical Reading 75th percentile score']
$schoolData['SAT Math 25th percentile score']
$schoolData['SAT Math 75th percentile score']
$schoolData['SAT Writing 25th percentile score']
$schoolData['SAT Writing 75th percentile score']
$schoolData['ACT Composite 25th percentile score']
$schoolData['ACT Composite 75th percentile score']
$schoolData['ACT English 25th percentile score']
$schoolData['ACT English 75th percentile score']
$schoolData['ACT Math 25th percentile score']
$schoolData['ACT Math 75th percentile score']
*/

//Important
switch ($userData['work']) {
  case 'very_high':
    $admissionProbibility = $admissionProbibility + 10;
    break;
  case 'high':
    $admissionProbibility = $admissionProbibility + 8;
    break;
  case 'medium':
    $admissionProbibility = $admissionProbibility + 6;
    break;
  case 'low':
   $admissionProbibility = $admissionProbibility + 4;
    break;
  case 'very_low':
    $admissionProbibility = $admissionProbibility + 2;
    break;
}

//Considered    
if ($userData['first_generation'] == 'yes') {
  $admissionProbibility = $admissionProbibility + 2.5;
}

if ($userData['state_residency'] == 'California') {
  $admissionProbibility = $admissionProbibility + 2.5;
}
 
if ($admissionProbibility < 39) {
  $progressColor = 'red';
}
elseif ($admissionProbibility >= 39 AND $admissionProbibility < 59 ) {
  $progressColor = 'orange';
}
elseif ($admissionProbibility >= 59 AND $admissionProbibility < 79 ) {
  $progressColor = 'light-green';
}
elseif ($admissionProbibility>=79) {
  $progressColor='green';
}
?>

<p class="sansserif">Hello <?php echo $userData['first_name'] ?>, In 2015 <?php echo $schoolData['institution name'] ?> recieved <?php echo $totalApplicants ?> and admitted a total of <?php echo $totalAdmitted ?> students</p>

  <p class="sansserif">Your Acceptance Probability is: </p>
  <div class="w3-light-grey w3-large">
    <div class="w3-container w3-<?php echo $progressColor ?> w3-round w3-center w3-padding" style="width:<?php echo $admissionProbibility ?>%"><?php echo $admissionProbibility ?>%</div>
  </div>

<button> <a href="profile.php?uname=<?php echo $username;?>">Home</a> </button>

</body>
</html>

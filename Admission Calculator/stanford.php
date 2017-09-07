<!DOCTYPE html>
<head>
	<title>
		Edgine - Stanford
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

<div style="text-align: center;"><IMG SRC="https://s3.amazonaws.com/cloud-prod.spokincontent.com/Content+Library+Images/Stanford_University_Food_Allergy_Campus_Guide.jpg" ALT="Stanford Campus"> </div>

<?php

$dbUsers = new PDO ('mysql:host=localhost;dbname=users','root','/-/-/-/');
$username = $_GET["uname"];
$userQuery = "SELECT * FROM user_data WHERE username = '$username'";
$userGet = $dbUsers->query($userQuery);
$userData = $userGet->fetch(PDO::FETCH_ASSOC);


$dbSchools = new PDO ('mysql:host=localhost;dbname=ipeds_2015','root','/-/-/-/-/');
$schoolQuery = "SELECT * FROM admissionandtest WHERE unitid = 243744";
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
  $admissionProbibility = $admissionProbibility + 16;
}
elseif ($gpa >= 3.5 AND $gpa < 3.75) {
  $admissionProbibility = $admissionProbibility + 0.96; 
}
elseif ($gpa >= 3.25 AND $gpa < 3.5) {
  $admissionProbibility = $admissionProbibility + 0.16; 
}

//Essay
switch ($userData['application_essay']) {
  case 'very_high':
    $admissionProbibility = $admissionProbibility + 26;
    break;
  case 'high':
    $admissionProbibility = $admissionProbibility + 17;
    break;
  case 'medium':
    $admissionProbibility = $admissionProbibility + 8;
    break;
  case 'low':
   $admissionProbibility = $admissionProbibility + 1;
    break;
}


//Rigor of High School
switch ($userData['secondary_edu_rigor']) {
  case 'very_high':
    $admissionProbibility = $admissionProbibility + 16;
    break;
  case 'high':
    $admissionProbibility = $admissionProbibility + 9;
    break;
  case 'medium':
    $admissionProbibility = $admissionProbibility + 5;
    break;
  case 'low':
   $admissionProbibility = $admissionProbibility + 1;
    break;
}

//Test Scores
 $math_sat = (double)$userData['math_sat'];
 $english_sat = (double)$userData['english_sat'];
 $writing_sat = (double)$userData['writing_sat'];
    
if($math_sat >= 700){
  $admissionProbibility = $admissionProbibility + 5.33;
}
elseif ($math_sat >= 600 AND $math_sat < 700) {
  $admissionProbibility = $admissionProbibility + 1.28; 
}
elseif ($math_sat >= 500 AND $math_sat < 600) {
  $admissionProbibility = $admissionProbibility + 0.12; 
}

if($english_sat >= 700){
  $admissionProbibility = $admissionProbibility + 5.33;
}
elseif ($english_sat >= 600 AND $english_sat < 700) {
  $admissionProbibility = $admissionProbibility + 1.71; 
}
elseif ($english_sat >= 500 AND $english_sat < 600) {
  $admissionProbibility = $admissionProbibility + 0.32; 
}
elseif ($english_sat >= 400 AND $english_sat < 500) {
  $admissionProbibility = $admissionProbibility + 0.053; 
}

if($writing_sat >= 700){
  $admissionProbibility = $admissionProbibility + 5.33;
}
elseif ($writing_sat >= 600 AND $writing_sat < 700) {
  $admissionProbibility = $admissionProbibility + 1.49; 
}
elseif ($writing_sat >= 500 AND $writing_sat < 600) {
  $admissionProbibility = $admissionProbibility + 0.267; 
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
    $admissionProbibility = $admissionProbibility + 5;
    break;
  case 'high':
    $admissionProbibility = $admissionProbibility + 1;
    break;
}

//Considered    
if ($userData['first_generation'] == 'yes') {
  $admissionProbibility = $admissionProbibility + 2;
}

if ($userData['state_residency'] == 'California') {
  $admissionProbibility = $admissionProbibility + 3;
}

//Recommendation Points
$admissionProbibility = $admissionProbibility + 5;

$maxRecomendation = $admissionProbibility + 16;
 
if ($admissionProbibility < 40) {
  $progressColor = 'red';
}
elseif ($admissionProbibility >= 40 AND $admissionProbibility < 60 ) {
  $progressColor = 'orange';
}
elseif ($admissionProbibility >= 60 AND $admissionProbibility < 80 ) {
  $progressColor = 'light-green';
}
elseif ($admissionProbibility>=80) {
  $progressColor='green';
}

if ($maxRecomendation < 40) {
  $progressColor2 = 'red';
}
elseif ($maxRecomendation >= 40 AND $maxRecomendation < 60 ) {
  $progressColor2 = 'orange';
}
elseif ($maxRecomendation >= 60 AND $maxRecomendation < 80 ) {
  $progressColor2 = 'light-green';
}
elseif ($maxRecomendation>=80) {
  $progressColor2='green';
}

?>

<p class="sansserif">Hello <?php echo $userData['first_name'] ?>, In 2015 <?php echo $schoolData['institution name'] ?> recieved <?php echo $totalApplicants ?> and admitted a total of <?php echo $totalAdmitted ?> students</p>

  <p class="sansserif">Your Acceptance Probability is: </p>
  <div class="w3-light-grey w3-large">
    <div class="w3-container w3-<?php echo $progressColor ?> w3-round w3-center w3-padding" style="width:<?php echo $admissionProbibility ?>%"><?php echo $admissionProbibility ?>%</div>
  </div>


  <p class="sansserif">Your Acceptance Probability with above average Reccomendations is: </p>
  <div class="w3-light-grey w3-large">
    <div class="w3-container w3-<?php echo $progressColor2 ?> w3-round w3-center w3-padding" style="width:<?php echo $maxRecomendation ?>%"><?php echo $maxRecomendation ?>%</div>
  </div>


<button> <a href="profile.php?uname=<?php echo $username;?>">Home</a> </button>

</body>
</html>

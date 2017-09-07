<!DOCTYPE html>
<head>
	<title>
		Admission Stats
	</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>
body {
    background-color: #396060;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 20px;
}

tr:nth-child(even){background-color: #f2f2f2}
tr:nth-child(odd){background-color: white}

th {
    background-color: #f44336;
    color: white;
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

<div style="text-align: center;"><IMG SRC="AdmissionCalculatorlogo.png" ALT="eloxacto logo"> </div>

<p class="sansserif">Hello <?php echo $_GET['uname']; ?>, click on a school below to find out what is your current approximate probability acceptance range. Please feel free to provide any feedback to "eloxacto@gmail.com" </p>

<?php $username = $_GET["uname"]; ?>

<div class="w3-container">
<table>
  <tr>
    <th>School</th>
    <th>Link</th>
  </tr>
  <tr>
    <td>University of California, Los Angeles</td>
    <td><a href="ucla.php?uname=<?php echo $username; ?>">Admit Me!</a></td>
  </tr>
  <tr>
    <td>California State University, Long Beach</td>
    <td><a href="csulb.php?uname=<?php echo $username; ?>">Admit Me!</a></td>
  </tr>
  <tr>
    <td>University of Southern California</td>
    <td><a href="usc.php?uname=<?php echo $username; ?>">Admit Me!</a></td>
  </tr>
  <tr>
    <td>Stanford University</td>
    <td><a href="stanford.php?uname=<?php echo $username; ?>">Admit Me!</a></td>
  </tr>
</table>
</div>

<div class="w3-container">
<div class="w3-bar w3-red">
  <a href='edit_profile.php?uname=<?php echo $username;?>' class="w3-button w3-left">Edit Profile</a>
 <a href='home.php' class="w3-button w3-right">Log Out</a>
</div>
</div>

</body>
</html>

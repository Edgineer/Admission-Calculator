<!DOCTYPE html>
<head>
	<title>
		Edgine - Admission Stats
	</title>
</head>

<style>
body {
    background-color: #396060;
}

p.sansserif {
    font-family: Arial, Helvetica, sans-serif;
    margin: 1cm;
    color: white;
}

a{
	color: white;
	text-align: center;
}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
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
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}

</style>

<body>

<div style="text-align: center;"><IMG SRC="AdmissionCalculatorlogo.png" ALT="eloxacto logo"> </div>


<p class="sansserif">Hello! Welcome to the University Admission Calculator. This tool is intended to motivate students to improve thier college applications. Using the tool students will get a better idea of crucial application compontents for each school. For more information please read the 'About Us' section Thank You.</p>


<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

<div id="id01" class="modal" style="text-align: center;">
  
  <form class="modal-content animate" action="login_verify.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<t>

<button onclick="document.getElementById('id').style.display='block'" style="width:auto;">Sign Up</button>

<div id="id" class="modal" style="text-align: center;">
  
  <form class="modal-content animate" action="signup_verify.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter a new Username" name="uname" required>
        
      <button type="submit">Sign Up</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<p class="sansserif"> <?php if ($_GET['error'] != NULL){echo $_GET['error'];} ?> </p>

<br>
<br>

<a href="AboutUs.html">About Us</a>

</body>
</html>

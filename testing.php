<?php
    //starting a session
session_start();

//result variable
$output=NULL;
$service=$_POST['service'];
$location=$_POST['location'];


//connecting to database
include 'dbconnect.php';

//quering the database
$_SESSION["service"] = $service;
$_SESSION["location"] = $location;
?>
	<h1 style = "text-align:center;">Welcome</h1>
    <h2 style = "padding-left:10px;">Messages</h2>

    <form action="register.php" method="POST">
        <input type="text" class="custom-select" placeholder="services" name="service" required="required"><br>
        <input type="text" class="custom-select" placeholder="location" name="location" required="required"><br>
        <button type="submit" class="btn dorne-btn" name="submit"></i> search</button>
    </form>
	
      </table>
</div>

<?php

//echo $_SESSION["service"];
//echo $_SESSION["location"];

?>
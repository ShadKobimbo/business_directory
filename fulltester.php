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
$messages=$conn->query("SELECT * FROM providers WHERE service='$service' AND location='$location'");

?>
	<h1 style = "text-align:center;">Welcome</h1>
    <h2 style = "padding-left:10px;">Messages</h2>

    <form action="fulltester.php" method="POST">
        <input type="text" class="custom-select" placeholder="services" name="service" required="required"><br>
        <input type="text" class="custom-select" placeholder="location" name="location" required="required"><br>
        <button type="submit" class="btn dorne-btn" name="submit"></i> search</button>
    </form>
	
      </table>
</div>

<div style = "float:center;text-align:center;padding-bottom:50px;padding-left:10px;"> 
  <table border="1" style="float:center;">
     <tr>
    <th>Firstname</th>&nbsp
    <th>Lastname</th>&nbsp
    <th>Email Address</th>&nbsp
    </tr>
    <?php

     //fetching data from the database
    if($messages->num_rows != 0){
    while($rows=$messages->fetch_assoc())
        {

           
            

                $firstname= $rows['firstname'];
                $secondname= $rows['secondname'];
                $email = $rows['email'];
               // $messages = $rows['messages'];
           
                //Displaying the data in the variables

                echo "<tr>";
                echo "<td>" . $rows['firstname'] . "</td>";
                echo "<td>" . $rows['secondname'] . "</td>";
                echo "<td>" . $rows['email'] . "</td>";
                //echo "<td>" . $rows['messages'] . "</td>";
                echo "</tr>";
                
//echo "First Name: $firstname <br/> Second Name: $secondname <br/> Email: $email<br/>Message: <br/>";
           
        }
        //echo "</table>";
}else
{
    $output =  "No Result";
}

    ?>

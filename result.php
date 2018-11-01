<?php

 //starting a session
 session_start();

 //connecting to database
include 'dbconnect.php';

    $serv=$_SESSION["service"];
    $locat=$_SESSION["location"];

 $messages=$conn->query("SELECT * FROM providers WHERE service='$serv' AND location='$locat'");

?>

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

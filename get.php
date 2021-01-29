<?php
 $conn = mysqli_connect("localhost", "root", "", "bestevaer");
 
 // Connectie
 if($conn === false){
     die("ERROR: Could not connect. " . mysqli_connect_error());
 }

 $sql = "SELECT * FROM contactgegevens";
 if($result = mysqli_query($conn, $sql)){
     if(mysqli_num_rows($result) > 0){
         echo "<table>";
             echo "<tr>";
                 echo "<th>voornaam</th>";
                 echo "<th>achternaam</th>";
                 echo "<th>telefoonnummer</th>";
                 echo "<th>email</th>";
                 echo "<th>bericht</th>";
             echo "</tr>";
         while($row = mysqli_fetch_array($result)){
             echo "<tr>";
                 echo "<td>" . $row['voornaam'] . "</td>";
                 echo "<td>" . $row['achternaam'] . "</td>";
                 echo "<td>" . $row['telefoonnummer'] . "</td>";
                 echo "<td>" . $row['email'] . "</td>";
                 echo "<td>" . $row['bericht'] . "</td>";
             echo "</tr>";
         }
         echo "</table>";

         mysqli_free_result($result);
     } else{
         echo "No records matching your query were found.";
     }
 } else{
     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
 }

     
?>
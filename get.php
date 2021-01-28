<?php
 $conn = mysqli_connect("localhost", "root", "", "adressenlijst");
 
 // Connectie
 if($conn === false){
     die("ERROR: Could not connect. " . mysqli_connect_error());
 }

 $sql = "SELECT * FROM gegevens";
 if($result = mysqli_query($conn, $sql)){
     if(mysqli_num_rows($result) > 0){
         echo "<table>";
             echo "<tr>";
                 echo "<th>voornaam</th>";
                 echo "<th>achternaam</th>";
                 echo "<th>adres</th>";
                 echo "<th>huisnummer</th>";
                 echo "<th>plaats</th>";
                 echo "<th>postcode</th>";
                 echo "<th>tekst</th>";
             echo "</tr>";
         while($row = mysqli_fetch_array($result)){
             echo "<tr>";
                 echo "<td>" . $row['voornaam'] . "</td>";
                 echo "<td>" . $row['achternaam'] . "</td>";
                 echo "<td>" . $row['adres'] . "</td>";
                 echo "<td>" . $row['huisnummer'] . "</td>";
                 echo "<td>" . $row['plaats'] . "</td>";
                 echo "<td>" . $row['postcode'] . "</td>";
                 echo "<td>" . $row['tekst'] . "</td>";

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
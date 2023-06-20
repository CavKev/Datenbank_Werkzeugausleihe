<?php

include('context.php');
include('Models.php');

$result = $mysqli->query("SELECT * FROM lieferant");

function Get($mysqli, $name){
    $query = 'SELECT * FROM ' . $name;
    $result = $mysqli->query($query);
    if($result && $result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo($row['nachname'].' ');
        }
        return $row;
    } else {
    
    }
}

function Insert($mysqli, $InterfaceObj){
    $InterfaceObj -> Info();
    
}

if($result -> num_rows > 0)
 {
     
  $table = '
   <table border=1>
                    <tr>
                         <th>Lieferanten Nr.</th>
                         <th>Firma</th>
                         <th>Ansprechpartner</th>
                         <th>E-Mail Adresse</th>
                         <th>Telefonnummer</th>

                    </tr>
  ';
  while($row = $result -> fetch_assoc())
  {
   $table .= '
    <tr>
                        <td>'.$row["lieferantennr"].'</td>
                         <td>'.$row["firma"].'</td>
                         <td>'.$row["ansprechpartnerName"].'</td>
                         <td>'.$row["ansprechpartnerEmail"].'</td>
                         <td>'.$row["ansprechpartnerTelefon"].'</td>


                    </tr>
   ';
  }
  $table .= '</table>';
  echo $table;
 }


?>

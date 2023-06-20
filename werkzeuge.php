<?php
include('context.php');

$result = $mysqli->query("SELECT * FROM werkzeugausleihe");

if ($result->num_rows > 0) {
    $table = '
    <table border=1>
        <tr>
            <th>Exemplenr.</th>
            <th>Mitarbeiter Nummer</th>
            <th>Ausleihdatum</th>
            <th>Rückgabedatum</th>
            <th>Zurückgegeben am</th>
        </tr>
    ';
    while ($row = $result->fetch_assoc()) {
        $table .= '
        <tr>
            <td>'.$row["exemplarnr"].'</td>
            <td>'.$row["mitarbeiternr"].'</td>
            <td>'.$row["ausleihdatum"].'</td>
            <td>'.$row["rueckgabedatum"].'</td>
            <td>'.$row["zurueckgegebenam"].'</td>
        </tr>
        ';
    }
    $table .= '</table>';
    echo $table;
}

function Insert($mysqli, $InterfaceObj){
    $InterfaceObj->Info();
    // Hier sollte der Code fortgesetzt werden, der nach dem Aufruf von $InterfaceObj->Info() kommen soll.
    // Stelle sicher, dass dieser Teil des Codes korrekt geschrieben ist.
}
?>

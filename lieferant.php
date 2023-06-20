<?php
include('context.php');

$result = $mysqli->query("SELECT * FROM lieferant");

if ($result->num_rows > 0) {
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
    while ($row = $result->fetch_assoc()) {
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

function Insert($mysqli, $InterfaceObj){
    $InterfaceObj->Info();
    // Hier sollte der Code fortgesetzt werden, der nach dem Aufruf von $InterfaceObj->Info() kommen soll.
    // Stelle sicher, dass dieser Teil des Codes korrekt geschrieben ist.
}
?>

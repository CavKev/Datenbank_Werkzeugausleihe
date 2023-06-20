<?php
include('context.php');

$result = $mysqli->query("SELECT * FROM werkzeug");

if ($result->num_rows > 0) {
    $table = '
    <table border=1>
        <tr>
            <th>Werkzeug Nummer</th>
            <th>Bezeichnung</th>
            <th>Beschreibung</th>
        </tr>
    ';
    while ($row = $result->fetch_assoc()) {
        $table .= '
        <tr>
            <td>'.$row["werkzeugnr"].'</td>
            <td>'.$row["bezeichnung"].'</td>
            <td>'.$row["beschreibung"].'</td>
        </tr>
        ';
    }
    $table .= '</table>';
    echo $table;
}

function Insert($mysqli, $InterfaceObj){
    $InterfaceObj->Info();
}
?>

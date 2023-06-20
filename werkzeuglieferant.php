<?php
include('context.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        $exemplarnr = $_POST['delete'];
        $deleteQuery = "DELETE FROM werkzeuglieferant WHERE exemplarnr = '$exemplarnr'";
        $deleteResult = $mysqli->query($deleteQuery);
        if ($deleteResult) {
            echo "Eintrag erfolgreich gelöscht.";
        } else {
            echo "Fehler beim Löschen des Eintrags: " . $mysqli->error;
        }
    }
}

$result = $mysqli->query("SELECT * FROM werkzeuglieferant");

if ($result->num_rows > 0) {
    $table = '
    <table border=1>
        <tr>
            <th>Exemplenr.</th>
            <th>Lieferanten Nummer</th>
            <th>Anschaffungsdatum</th>
            <th>Anschaffungspreis</th>
            <th>Werkzeug Nummer</th>
            <th>Aktion</th>
        </tr>
    ';
    while ($row = $result->fetch_assoc()) {
        $table .= '
        <tr>
            <td>'.$row["exemplarnr"].'</td>
            <td>'.$row["lieferantennr"].'</td>
            <td>'.$row["anschaffungsdatum"].'</td>
            <td>'.$row["anschaffungspreis"].'</td>
            <td>'.$row["werkzeugnr"].'</td>
            <td>
                <form method="post">
                    <button type="submit" name="delete" value="'.$row["exemplarnr"].'">Löschen</button>
                </form>
            </td>
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

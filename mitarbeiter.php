<?php
include('context.php');

// Funktion zum Einfügen eines Mitarbeiters in die Datenbank
function InsertMitarbeiter($mysqli, $nachname, $vorname, $geburtsdatum) {
    $nachname = $mysqli->real_escape_string($nachname);
    $vorname = $mysqli->real_escape_string($vorname);
    $geburtsdatum = $mysqli->real_escape_string($geburtsdatum);

    $query = "INSERT INTO mitarbeiter (nachname, vorname, geburtsdatum) VALUES ('$nachname', '$vorname', '$geburtsdatum')";
    if ($mysqli->query($query) === TRUE) {
        echo "Mitarbeiter erfolgreich hinzugefügt.";
    } else {
        echo "Fehler beim Hinzufügen des Mitarbeiters: " . $mysqli->error;
    }
}

// Prüfen, ob das Hinzufügen-Formular gesendet wurde
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Formulardaten abrufen
    $nachname = $_POST["nachname"];
    $vorname = $_POST["vorname"];
    $geburtsdatum = $_POST["geburtsdatum"];

    // Mitarbeiter in die Datenbank einfügen
    InsertMitarbeiter($mysqli, $nachname, $vorname, $geburtsdatum);
}

// Mitarbeiter anzeigen
$result = $mysqli->query("SELECT * FROM mitarbeiter");

if ($result->num_rows > 0) {
    $table = '
    <table border=1>
        <tr>
            <th>Mitarbeiter Nummer</th>
            <th>Nachname</th>
            <th>Vorname</th>
            <th>Geburtsdatum</th>
        </tr>
    ';
    while ($row = $result->fetch_assoc()) {
        $table .= '
        <tr>
            <td>'.$row["mitarbeiternr"].'</td>
            <td>'.$row["nachname"].'</td>
            <td>'.$row["vorname"].'</td>
            <td>'.$row["geburtsdatum"].'</td>
        </tr>
        ';
    }
    $table .= '</table>';
    echo $table;
}
?>

<!-- Hinzufügen-Formular -->
<form method="post" action="">
    <label for="nachname">Nachname:</label>
    <input type="text" name="nachname" id="nachname" required><br>

    <label for="vorname">Vorname:</label>
    <input type="text" name="vorname" id="vorname" required><br>

    <label for="geburtsdatum">Geburtsdatum:</label>
    <input type="date" name="geburtsdatum" id="geburtsdatum" required><br>

    <input type="submit" name="submit" value="Hinzufügen">
</form>

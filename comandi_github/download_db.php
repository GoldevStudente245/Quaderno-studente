<?php
if (isset($_POST['scarica'])) {
    $host = 'localhost';
    $user = 'Anvar';
    $password = 'dslkfjewrt20985u0gj';
    $database = 'github_Anvar';

    $conn = new mysqli($host, $user, $password, $database);
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    $conn->set_charset("utf8");
    $output  = "-- Backup del database `$database`\n";
    $output .= "-- Creato il " . date("Y-m-d H:i:s") . "\n\n";

    $tables = [];
    $res = $conn->query("SHOW TABLES");
    while ($row = $res->fetch_row()) {
        $tables[] = $row[0];
    }

    foreach ($tables as $table) {
        // Struttura tabella
        $res = $conn->query("SHOW CREATE TABLE `$table`");
        $create = $res->fetch_assoc()['Create Table'];
        $output .= "--\n-- Struttura per tabella `$table`\n--\n\n";
        $output .= "DROP TABLE IF EXISTS `$table`;\n$create;\n\n";

        // Dati tabella
        $output .= "--\n-- Dati per tabella `$table`\n--\n\n";
        $res = $conn->query("SELECT * FROM `$table`");
        while ($row = $res->fetch_assoc()) {
            $values = array_map(fn($val) => isset($val) ? "'" . $conn->real_escape_string($val) . "'" : 'NULL', array_values($row));
            $output .= "INSERT INTO `$table` VALUES (" . implode(", ", $values) . ");\n";
        }
        $output .= "\n";
    }

    $conn->close();

    header('Content-Type: application/sql');
    header('Content-Disposition: attachment; filename="' . $database . '.sql"');
    header('Pragma: no-cache');
    header('Expires: 0');
    echo $output;
    exit;
}
?>

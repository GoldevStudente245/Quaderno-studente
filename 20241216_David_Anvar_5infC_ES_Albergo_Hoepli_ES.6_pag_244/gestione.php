<?php
// Connessione al server come root per creare il database e le tabelle
$hostname = "localhost";
$username_root = "root";  // Usando root per creare il database
$password_root = "";  // Se la root non ha password, lasciala vuota
$dbname = "20241216_5infc_anvar_albergo_hoepli";

// Connessione iniziale come root
$conn = new mysqli($hostname, $username_root, $password_root, $dbname);
if ($conn->connect_error) {
    die("Connessione fallita come root: " . $conn->connect_error);
}

// Crea il database e le tabelle se non esistono
if (isset($_POST['create_db'])) {
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($sql) === TRUE) {
        echo "Database '$dbname' creato con successo!<br>";
    } else {
        echo "Errore nella creazione del database: " . $conn->error . "<br>";
    }

    // Se il database è creato, selezionalo
    $conn->select_db($dbname);

    // Crea le tabelle se non esistono
    if (isset($_POST['create_tabelle'])) {
        $queries = [
            // Creazione delle tabelle
            "CREATE TABLE IF NOT EXISTS Cliente(
                id_cliente INT PRIMARY KEY AUTO_INCREMENT,
                nome VARCHAR(50) NOT NULL,
                cognome VARCHAR(50) NOT NULL,
                via VARCHAR(50) NOT NULL,
                citta VARCHAR(50) NOT NULL,
                numero_civico INT NOT NULL,
                telefono BIGINT NOT NULL
            )",
            "CREATE TABLE IF NOT EXISTS Documento(
                id_documento INT PRIMARY KEY AUTO_INCREMENT,
                CF VARCHAR(16) NOT NULL,
                data_di_nascita DATE NOT NULL,
                luogo_di_nascita VARCHAR(50) NOT NULL,
                tipo_documento ENUM('carta di credito', 'paypal', 'postpay'),
                id_cliente INT NOT NULL,
                FOREIGN KEY (id_cliente) REFERENCES Cliente(id_cliente)
            )",
            "CREATE TABLE IF NOT EXISTS Prenotazione(
                id_prenotazione INT PRIMARY KEY AUTO_INCREMENT,
                Data_di_partenza DATE NOT NULL,
                Data_di_arrivo DATE NOT NULL,
                id_cliente INT NOT NULL,
                FOREIGN KEY (id_cliente) REFERENCES Cliente(id_cliente)
            )",
            "CREATE TABLE IF NOT EXISTS Camera(
                num_di_camera INT PRIMARY KEY AUTO_INCREMENT,
                esposizione ENUM('nord', 'sud', 'est', 'ovest'),
                piano INT NOT NULL,
                dimensione_camera INT NOT NULL,
                tipologia_di_camera VARCHAR(50) NOT NULL
            )",
            "CREATE TABLE IF NOT EXISTS Prenotazione_Camera(
                id_prenotazione INT NOT NULL,
                num_di_camera INT NOT NULL,
                PRIMARY KEY (id_prenotazione, num_di_camera),
                FOREIGN KEY (id_prenotazione) REFERENCES Prenotazione(id_prenotazione),
                FOREIGN KEY (num_di_camera) REFERENCES Camera(num_di_camera)
            )"
        ];

        $success = true;
        foreach ($queries as $query) {
            if (!$conn->query($query)) {
                echo "Errore: " . $conn->error . "<br>";
                $success = false;
            }
        }

        if ($success) {
            echo "Tutte le tabelle sono state create correttamente!<br>";
        }
    }

    // Inserisci i dati di esempio nelle tabelle
    if (isset($_POST['insert_data'])) {
        $sql_cliente = "INSERT INTO Cliente (id_cliente, nome, cognome, via, citta, numero_civico, telefono) 
        VALUES 
            (1, 'Mario', 'Rossi', 'Via Roma', 'Milano', 12, 3381234567),
            (2, 'Luca', 'Bianchi', 'Viale Europa', 'Torino', 22, 3399876543),
            (3, 'Anna', 'Verdi', 'Piazza del Popolo', 'Roma', 5, 3312345678)";
        
        $sql_camera = "INSERT INTO Camera (esposizione, piano, dimensione_camera, tipologia_di_camera) 
        VALUES 
            ('Sud', 1, 20, 'Singola'),
            ('Nord', 1, 25, 'Doppia'),
            ('Est', 2, 30, 'Suite'),
            ('Ovest', 2, 35, 'Doppia')";

        $sql_documento = "INSERT INTO Documento (id_documento, id_cliente, CF, data_di_nascita, luogo_di_nascita, tipo_documento) 
        VALUES 
            (1, 1, 'RSSMRA80A01H501Z', '1980-01-01', 'Roma', 'carta di credito'),
            (2, 2, 'BNCLCU90A01Z404K', '1990-03-15', 'Milano', 'paypal'),
            (3, 3, 'VRDNNN70A01A089M', '1970-09-20', 'Napoli', 'postpay')";

        $sql_prenotazione = "INSERT INTO Prenotazione (id_prenotazione, id_cliente, Data_di_partenza, Data_di_arrivo) 
        VALUES 
            (1, 1, '2025-05-10', '2025-05-15'),
            (2, 2, '2025-06-01', '2025-06-07'),
            (3, 3, '2025-07-20', '2025-07-25')";

        $sql_prenotazione_camera = "INSERT INTO Prenotazione_Camera (id_prenotazione, num_di_camera) 
        VALUES 
            (1, 1),
            (2, 2), 
            (3, 3)";

        if (
            $conn->query($sql_cliente) === TRUE &&
            $conn->query($sql_camera) === TRUE &&
            $conn->query($sql_documento) === TRUE &&
            $conn->query($sql_prenotazione) === TRUE &&
            $conn->query($sql_prenotazione_camera) === TRUE
        ) {
            echo "Tutti i dati di esempio sono stati inseriti correttamente!<br>";
        } else {
            echo "Errore nell'inserimento dati: " . $conn->error . "<br>";
        }
    }
}

// Ora chiudi la connessione con root
$conn->close();

// Riapri una connessione con l'utente Anvar
$username = "Anvar";
$password = "dslkfjewrt20985u0gj";

// Connessione come Anvar per lavorare con il database appena creato
$conn = new mysqli($hostname, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connessione fallita con Anvar: " . $conn->connect_error);
}

// Ora puoi eseguire altre operazioni con il database
// Come esempio, puoi inserire dati o fare query a tua scelta
?>
<?php
// Inizializza la sessione
// Memorizza l'utente (da $_GET['user']) e il contatore delle operazioni
// Crea una funzione per incrementare il contatore
// Crea una funzione per i messaggi flash

session_start();
if (isset($_GET['user'])) {
    $_SESSION['user'] = htmlspecialchars($_GET['user']);
}

<?php
require_once 'includes/functions.php';
require_once 'includes/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Ricevi i dati dal form
    $title = $_POST['title'];
    $date = $_POST['date'];
    $description = $_POST['description'];

    // 2. Crea nuovo evento usando le funzioni
    $newEvent = [
        'id' => generate_id(),
        'title' => $title,
        'date' => $date,
        'description' => $description
    ];

    // 3. Carica eventi, aggiungi il nuovo e salva
    $events = load_events();
    $events[] = $newEvent;
    save_events($events);

    // 4. Incrementa operazioni e imposta messaggio flash
    increment_operations();
    set_flash_message("Evento '{$title}' aggiunto con successo!", 'success');

    // 5. Reindirizza alla home
    header('Location: index.php');
    exit;
}

$title = '';
$date = '';
$description = '';

include 'views/form.php';
?>
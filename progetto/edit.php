<?php
require_once 'includes/functions.php';
require_once 'includes/session.php';

$id = $_GET['id'] ?? null;

// Trova l'evento da modificare usando la funzione
$event = get_event_by_id($id);

if (!$event) {
    set_flash_message("Evento non trovato!", 'error');
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Carica tutti gli eventi
    $events = load_events();
    
    // Trova e aggiorna l'evento
    foreach ($events as &$e) {
        if ($e['id'] == $id) {
            $e['title'] = $_POST['title'];
            $e['date'] = $_POST['date'];
            $e['description'] = $_POST['description'];
            break;
        }
    }
    
    // Salva usando la funzione
    save_events($events);
    
    // Incrementa operazioni e imposta messaggio flash
    increment_operations();
    set_flash_message("Evento '{$_POST['title']}' modificato con successo!", 'success');
    
    header('Location: index.php');
    exit;
}

// Passa i dati dell'evento al form
$title = $event['title'] ?? '';
$date = $event['date'] ?? '';
$description = $event['description'] ?? '';

include 'views/form.php';
?>
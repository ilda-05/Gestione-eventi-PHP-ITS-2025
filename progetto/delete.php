<?php
require_once 'includes/functions.php';
require_once 'includes/session.php';

$id = $_GET['id'] ?? null;

if ($id === null) {
    set_flash_message("ID evento non specificato!", 'error');
    header('Location: index.php');
    exit;
}

// Trova l'evento da eliminare
$event = get_event_by_id($id);

if (!$event) {
    set_flash_message("Evento non trovato!", 'error');
    header('Location: index.php');
    exit;
}

// Carica tutti gli eventi
$events = load_events();

// Rimuovi l'evento dall'array
foreach ($events as $key => $e) {
    if ($e['id'] == $id) {
        unset($events[$key]);
        break;
    }
}

// Riordina gli indici dell'array e salva
$events = array_values($events);
save_events($events);

// Incrementa operazioni e imposta messaggio flash
increment_operations();
set_flash_message("Evento '{$event['title']}' eliminato con successo!", 'success');

// Reindirizza alla home
header('Location: index.php');
exit;
?>
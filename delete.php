<?php
require_once 'includes/functions.php';

$id = $_GET['id'] ?? null;

if ($id === null) {
    header('Location: index.php');
    exit;
}

// Trova l'evento da eliminare
$event = get_event_by_id($id);

if (!$event) {
    echo "Evento non trovato!";
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

// Reindirizza alla home
header('Location: index.php');
exit;
?>
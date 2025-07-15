<?php
require_once 'includes/functions.php';

$id = $_GET['id'] ?? null;

// Trova l'evento da modificare usando la funzione
$event = get_event_by_id($id);

if (!$event) {
    echo "Evento non trovato!";
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
    header('Location: index.php');
    exit;
}

// Passa i dati dell'evento al form
$title = $event['title'] ?? '';
$date = $event['date'] ?? '';
$description = $event['description'] ?? '';

include 'views/form.php';
?>
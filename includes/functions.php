<?php

/**
 * Carica gli eventi dal file JSON
 * @return array Array degli eventi
 */
function load_events() {
    $filePath = __DIR__ . '/../data/events.json';
    
    if (!file_exists($filePath)) {
        return [];
    }
    
    $jsonContent = file_get_contents($filePath);
    $events = json_decode($jsonContent, true);
    
    return $events ?: [];
}

/**
 * Salva gli eventi nel file JSON
 * @param array $events Array degli eventi da salvare
 * @return bool True se il salvataggio è riuscito
 */
function save_events($events) {
    $filePath = __DIR__ . '/../data/events.json';
    
    $jsonContent = json_encode($events, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    
    return file_put_contents($filePath, $jsonContent) !== false;
}

/**
 * Cerca un evento per ID
 * @param int $id ID dell'evento da cercare
 * @return array|null Evento trovato o null se non trovato
 */
function get_event_by_id($id) {
    $events = load_events();
    
    foreach ($events as $event) {
        if ($event['id'] == $id) {
            return $event;
        }
    }
    
    return null;
}

/**
 * Genera un ID numerico univoco per un nuovo evento
 * @return int ID numerico incrementale
 */
function generate_id() {
    $events = load_events();
    
    if (empty($events)) {
        return 1;
    }
    
    $ids = array_column($events, 'id');
    return max($ids) + 1;
}
<?php
// I# Memorizza l'utente (da $_GET['user']) se specificato
if (isset($_GET['user'])) {
    $_SESSION['user'] = htmlspecialchars($_GET['user']);
}

// Imposta utente di default se non esiste
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = 'Alice';
}

// Inizializza il contatore delle operazioni se non esisteizza la sessione
session_start();

// Reset della sessione se richiesto
if (isset($_GET['reset'])) {
    session_destroy();
    session_start();
}

// Memorizza l'utente (da $_GET['user']) se specificato
if (isset($_GET['user'])) {
    $_SESSION['user'] = htmlspecialchars($_GET['user']);
}

// Inizializza il contatore delle operazioni se non esiste
if (!isset($_SESSION['operations_count'])) {
    $_SESSION['operations_count'] = 0;
}

/**
 * Incrementa il contatore delle operazioni
 */
function increment_operations() {
    $_SESSION['operations_count']++;
}

/**
 * Ottiene il numero di operazioni effettuate
 * @return int Numero di operazioni
 */
function get_operations_count() {
    return $_SESSION['operations_count'] ?? 0;
}



/**
 * Ottiene il nome utente dalla sessione
 * @return string|null Nome utente o null se non impostato
 */
function get_username() {
    return $_SESSION['user'] ?? null;
}

/**
 * Imposta un messaggio flash
 * @param string $message Messaggio da mostrare
 * @param string $type Tipo di messaggio (success, error, warning, info)
 */
function set_flash_message($message, $type = 'info') {
    $_SESSION['flash_message'] = [
        'message' => $message,
        'type' => $type
    ];
}

/**
 * Ottiene e rimuove il messaggio flash
 * @return array|null Array con messaggio e tipo, o null se non presente
 */
function get_flash_message() {
    if (isset($_SESSION['flash_message'])) {
        $flash = $_SESSION['flash_message'];
        unset($_SESSION['flash_message']);
        return $flash;
    }
    return null;
}

/**
 * Mostra il messaggio flash in HTML se presente
 */
function display_flash_message() {
    $flash = get_flash_message();
    if ($flash) {
        $alertClass = '';
        switch ($flash['type']) {
            case 'success':
                $alertClass = 'success';
                break;
            case 'error':
                $alertClass = 'danger';
                break;
            case 'warning':
                $alertClass = 'warning';
                break;
            default:
                $alertClass = 'info';
        }
        
        echo "<div class='alert alert-{$alertClass}' style='margin: 1rem 0; padding: 1rem; border-radius: 4px; background-color: #f8f9fa; border-left: 4px solid #007bff;'>";
        echo htmlspecialchars($flash['message']);
        echo "</div>";
    }
}
?>

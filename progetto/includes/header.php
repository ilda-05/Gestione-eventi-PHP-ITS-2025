<?php
// Includi il file di sessione
require_once __DIR__ . '/session.php';

// Ottieni le informazioni dell'utente e operazioni
$username = get_username();
$operations = get_operations_count();
?>

        <p>Utente: <strong><?= htmlspecialchars($username) ?></strong> | 
           Operazioni: <strong><?= $operations ?></strong></p>
        
        <main>
            <?php display_flash_message(); ?>
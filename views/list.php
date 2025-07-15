<?php
// Includi header e funzioni
require_once  __DIR__ . '/../includes/functions.php';

// Carica gli eventi usando la funzione
$events = load_events();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Eventi - Gestione Eventi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">

</head>
<body>
    <div class="container">
        <header>
            <h1>Gestione Eventi</h1>
            <nav>
                <a href="add.php">+ Aggiungi Nuovo Evento</a>
            </nav>
        </header>

        <main>
            <?php if (empty($events)): ?>
                <div>
                    <h3>Nessun evento presente</h3>
                    <p>Inizia aggiungendo il tuo primo evento!</p>
                    <a href="add.php">Aggiungi Primo Evento</a>
                </div>
            <?php else: ?>
                <h2>Eventi (<?= count($events) ?>)</h2>
                
                <?php foreach ($events as $event): ?>
                    <article>
                        <h3><?= htmlspecialchars($event['title'] ?? 'Senza titolo') ?></h3>
                        
                        <p>
                            <strong>ID:</strong> <?= htmlspecialchars($event['id'] ?? 'N.D.') ?> | 
                            <strong>Data:</strong> <?= htmlspecialchars($event['date'] ?? 'N.D.') ?>
                        </p>
                        
                        <p><?= htmlspecialchars($event['description'] ?? 'Nessuna descrizione') ?></p>
                        
                        <div>
                            <a href="edit.php?id=<?= urlencode($event['id']) ?>">Modifica</a>
                            <a href="delete.php?id=<?= urlencode($event['id']) ?>" 
                               onclick="return confirm('Sei sicuro di voler eliminare questo evento?')">
                            Elimina
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>
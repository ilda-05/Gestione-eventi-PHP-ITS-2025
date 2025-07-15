<?php
// Il form viene usato sia per aggiunta che modifica
// Le variabili $title, $date, $description devono essere definite dal file chiamante (add.php/edit.php)
// Se non sono definite, le inizializzo vuote
$title = $title ?? '';
$date = $date ?? '';
$description = $description ?? '';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
    >
</head>
<body>

    <div class="container">
    <h1><?= empty($title) && empty($date) && empty($description) ? 'Aggiungi Nuovo Evento' : 'Modifica Evento' ?></h1>

    <form method="POST" action="">
        <label for="title">Titolo:</label>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($title) ?>" required>
        
        <label for="date">Data:</label>
        <input type="date" id="date" name="date" value="<?= htmlspecialchars($date) ?>" required>
        
        <label for="description">Descrizione:</label>
        <textarea id="description" name="description" required><?= htmlspecialchars($description) ?></textarea>
        
        <button type="submit">
            <?= empty($title) && empty($date) && empty($description) ? 'Aggiungi Evento' : 'Salva Modifiche' ?>
        </button>
    </form>

    </div>

</body>
</html>
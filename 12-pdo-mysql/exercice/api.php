<?php

require __DIR__.'/config/db.php';

// On récupère les données
$contacts = db()->query('SELECT * FROM contacts ORDER BY created_at DESC')->fetchAll();

// On renvoie les données en json
header('Content-Type: application/json');
echo json_encode($contacts);

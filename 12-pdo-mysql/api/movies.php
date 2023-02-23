<?php

// Comment renvoyer du json en PHP ?
// $example = ['name' => 'Toto'];

// echo json_encode($example); // {"name": "Toto"}

require __DIR__.'/../config/db.php';
require __DIR__.'/../config/functions.php';

// Récupèrer les données de la BDD
$movies = db()->query('SELECT * FROM movie')->fetchAll();

// On peut transformer les données avant de les renvoyer
$newMovies = [];

foreach ($movies as $movie) {
    $newMovies[] = [
        'id' => $movie['id_movie'],
        'title' => $movie['title'],
        'released_at' => format_date($movie['released_at']),
        'description' => $movie['description'],
        'duration' => format_duration($movie['duration']),
        'cover' => 'http://localhost/php/12-pdo-mysql/uploads/'.$movie['cover'],
    ];
}

// On doit préciser dans la réponse HTTP qu'on renvoie du JSON
header('Content-Type: application/json');
echo json_encode($newMovies);

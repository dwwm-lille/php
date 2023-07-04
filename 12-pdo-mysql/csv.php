<?php

require __DIR__.'/config/db.php';
require __DIR__.'/config/functions.php';

if (! is_dir(__DIR__.'/exports')) {
    mkdir(__DIR__.'/exports');
}

// Movies
$file = fopen(__DIR__.'/exports/movies.csv', 'w');
$movies = select('select * from movie');

fputcsv($file, array_keys($movies[0]), ';');

foreach ($movies as $movie) {
    fputcsv($file, $movie, ';');
}

// Categories
$file = fopen(__DIR__.'/exports/categories.csv', 'w');
$categories = select('select * from category');

fputcsv($file, array_keys($categories[0]), ';');

foreach ($categories as $category) {
    fputcsv($file, $category, ';');
}

// Actors
$file = fopen(__DIR__.'/exports/actors.csv', 'w');
$actors = select('select * from actor');

fputcsv($file, array_keys($actors[0]), ';');

foreach ($actors as $actor) {
    fputcsv($file, $actor, ';');
}

// Movie Has Actor
$file = fopen(__DIR__.'/exports/movie_has_actor.csv', 'w');
$movie_has_actors = select('select * from movie_has_actor');

fputcsv($file, array_keys($movie_has_actors[0]), ';');

foreach ($movie_has_actors as $movie_has_actor) {
    fputcsv($file, $movie_has_actor, ';');
}

<?php require __DIR__.'/partials/header.php';

// On peut faire une requête SQL en PHP
$query = db()->query('SELECT * FROM movie');

// On doit exécuter la requête pour avoir le résultat
$movies = $query->fetchAll();

// var_dump($movies);
?>

<div class="max-w-5xl mx-auto">
    <div class="flex flex-wrap">
        <?php foreach ($movies as $movie) { ?>
            <div class="w-1/2 md:w-1/3 lg:w-1/4">
                <div class="border rounded-lg shadow m-3">
                    <img class="h-[400px] lg:h-[300px] w-full object-cover rounded-t-lg" src="uploads/<?= $movie['cover']; ?>" alt="<?= $movie['title']; ?>">
                    <div class="p-3">
                        <h2 title="<?= $movie['title']; ?>"><?= truncate($movie['title']); ?></h2>
                        <p class="text-xs text-gray-400"><?= format_date($movie['released_at']); ?></p>
                        <a href="film.php?id=<?= $movie['id_movie']; ?>" class="bg-blue-400 hover:bg-blue-300 duration-500 px-3 py-2 rounded-lg mt-3 block text-white text-center">
                            Voir
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php require __DIR__.'/partials/footer.php'; ?>

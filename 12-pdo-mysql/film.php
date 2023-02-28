<?php require __DIR__.'/partials/header.php';

// Récupèrer l'id dans l'url
$id = $_GET['id'] ?? null;

// Je prépare une requête pour aller chercher
// le film dans la BDD
$query = db()->prepare('SELECT * FROM movie WHERE id_movie = :id');

// Pour une requête préparée (se protéger des failles SQL)
// On doit remplacer les paramètres (:id devient $id)
$query->execute(['id' => $id]);

// Permet de récupèrer un seul résultat
$movie = $query->fetch();

// La 404
if (! $movie) {
    show404();
}

// Les acteurs
$actors = select('SELECT * FROM actor a
INNER JOIN movie_has_actor mha ON mha.id_actor = a.id_actor
WHERE mha.id_movie = :id', ['id' => $id]);

/*
 * Choses à faire :
 * - Intégrer la page du film (2 colonnes => Image à gauche et
 *   le titre, la durée, la date et la description à droite).
 * - Pour la durée, il faut une fonction qui transforme une durée donnée
 *   en minutes en heures / minutes (122 devient 2h02)
 * - Ecrire une seconde requête SQL qui permet d'afficher les acteurs
 *   du film dans une liste (join)
 * - Si l'id du film n'existe pas, on peut afficher une 404
 */
?>

<div class="max-w-4xl mx-auto mt-16 px-3">
    <div class="mb-4">
        <a href="index.php">Liste des films</a>
        <span class="mx-3">/</span>
        <span class="text-gray-400"><?= $movie['title']; ?></span>
    </div>
    <div class="flex border rounded-xl shadow bg-white">
        <div class="w-1/2 md:w-1/3">
            <img class="w-full rounded-l-xl" src="uploads/<?= $movie['cover']; ?>" alt="<?= $movie['title']; ?>">
        </div>
        <div class="w-1/2 md:w-2/3 p-6">
            <h1 class="text-center text-3xl mb-4">
                <?= $movie['title']; ?>
            </h1>
            <p class="font-bold">Durée: <?= format_duration($movie['duration']); ?> (<?= $movie['duration']; ?> minutes)</p>
            <p class="font-bold">Sortie en <?= format_date($movie['released_at'], 'Y'); ?></p>
            <p class="mt-4"><?= $movie['description']; ?></p>

            <p class="mt-8">Il y a <?= count($actors); ?> acteur(s) dans ce film.</p>
            <ul class="list-disc pl-4">
                <?php foreach ($actors as $actor) { ?>
                    <li><?= $actor['firstname']; ?> <?= $actor['name']; ?></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>

<?php require __DIR__.'/partials/footer.php'; ?>

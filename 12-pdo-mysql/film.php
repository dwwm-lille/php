<?php require __DIR__.'/partials/header.php';

// Récupèrer l'id dans l'url
$id = $_GET['id'] ?? null;

// Je prépare une requête pour aller chercher
// le film dans la BDD
$query = db()->prepare('SELECT * FROM movie
WHERE id_movie = :id');

// Pour une requête préparée (se protéger des failles SQL)
// On doit remplacer les paramètres (:id devient $id)
$query->execute(['id' => $id]);

// Permet de récupèrer un seul résultat
$movie = $query->fetch();

var_dump($movie);

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

<?php require __DIR__.'/partials/footer.php'; ?>

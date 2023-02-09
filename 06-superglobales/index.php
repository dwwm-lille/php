<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les superglobales</title>
</head>
<body>
    <h2>Les superglobales</h2>
    <p>$_GET et $_POST sont des variables superglobales. On va utiliser $_GET pour récupèrer des valeurs dans l'URL.
        On va utiliser $_POST pour récupérer des valeurs dans un formulaire (On peut aussi utiliser $_GET).</p>

    <?php
        // $_GET est un tableau qui contient tous les paramètres de l'URL
        // index.php?name=toto&age=31 => $_GET contient ['name' => 'toto', 'age' => 31];
        var_dump($_GET);
        // Si la clé name est présente dans l'URL, on prend sa valeur sinon on prend une valeur par défaut
        // C'est la méthode PHP 5 (ancienne)
        $name = isset($_GET['name']) ? $_GET['name'] : 'John Doe';
        // Avec une nouvelle méthode (PHP 7), le null coalesce
        $name = $_GET['name'] ?? 'John Doe';
        $age = $_GET['age'] ?? null;
    ?>

    <h1>Bonjour <?= $name; ?></h1>

    <?php if ($age) { ?>
        <p>Tu as <?= $age; ?> ans.</p>
    <?php } ?>

    <a href="index.php?name=fiorella&age=3">Fiorella</a>
    <a href="index.php?name=toto">Toto</a>

    <h2>Un formulaire avec $_GET</h2>
    <form method="get" action="">
        <input type="text" name="name" value="<?= $name; ?>">
        <input type="text" name="age" value="<?= $age; ?>">

        <button>Envoyer</button>
    </form>
</body>
</html>

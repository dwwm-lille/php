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
        $uppercase = (bool) ($_GET['uppercase'] ?? false); // On caste le "on" pour que la variable soit true ou false
        $originalName = $name;
        $selectedHouse = $_GET['house'] ?? null;

        if ($uppercase) { // Si la case est cochée, on mets le nom en majuscule
            $name = strtoupper($name);
        }
    ?>

    <h1>Bonjour <?= ucfirst($name); ?></h1>

    <?php if ($age) { ?>
        <p>Tu as <?= $age; ?> ans.</p>
    <?php } ?>

    <a href="index.php?name=fiorella&age=3">Fiorella</a>
    <a href="index.php?name=toto">Toto</a>

    <h2>Un formulaire avec $_GET</h2>
    <form method="get" action="">
        <div>
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" value="<?= $originalName; ?>">
        </div>

        <div>
            <label for="age">Âge</label>
            <!-- <input type="text" name="age" value="<?= $age; ?>"> -->
            <select name="age" id="age">
                <?php for ($i = 13; $i <= 120; $i++) { ?>
                    <option value="<?= $i ;?>" <?= $i === $age ? 'selected' : ''; ?>>
                        <?= $i; ?> ans
                    </option>
                <?php } ?>
            </select>
        </div>

        <div>
            <?php $houses = ['Griffondor', 'Serdaigle', 'Poufsouffle', 'Serpentard']; ?>
            <label>Maison sorcier</label>
            <?php foreach ($houses as $house) { ?>
                <input type="radio" name="house" id="house-<?= $house; ?>" value="<?= $house; ?>" <?= $house === $selectedHouse ? 'checked' : ''; ?>>
                <label for="house-<?= $house; ?>"><?= $house; ?></label>
            <?php } ?>
        </div>

        <div>
            <input type="checkbox" name="uppercase" id="uppercase" <?= $uppercase ? 'checked' : ''; ?>>
            <label for="uppercase">Majuscule</label>
        </div>

        <button>Envoyer</button> <!-- Le button est DANS le form -->
        <input type="submit" value="Envoyer"> <!-- Méthode 2 -->

        <button type="button">Envoyer (Non fonctionnel)</button> <!-- Désactiver le bouton -->
    </form>
</body>
</html>

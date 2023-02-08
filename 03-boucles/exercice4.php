<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table carré</title>
    <link rel="stylesheet" href="table.css">
</head>
<body>
    <div class="square">
        <!-- F - Ici, on affiche la légende du haut de 0 à 10 avec x en premier -->
        <div class="flex">
            <div class="item center bold border-b border-r bg-light">x</div>
            <?php for ($i = 0; $i <= 10; $i++) { ?>
                <div class="item center border-b bold <?= $i % 2 !== 0 ? 'bg-light' : '' ?>"><?= $i; ?></div>
            <?php } ?>
        </div>

        <!-- A - En premier, on a simplement affiché le carré avec les résultats des multiplications -->
        <!-- B - Pour faire ça, on a 2 boucles ($table représente les lignes et $multiple représente les colonnes) -->
        <?php for ($table = 0; $table <= 10; $table++) { ?>
            <div class="flex">
                <!-- E - Ici, on affiche la légende (chaque ligne de 0 à 10) -->
                <div class="item center bold border-r <?= $table % 2 !== 0 ? 'bg-light' : '' ?>"><?= $table; ?></div>
                <!-- C - La 2ème boucle permet d'afficher chaque colonne ($multiple) -->
                <?php for ($multiple = 0; $multiple <= 10; $multiple++) {
                    // H - Pour les cases en gris clair, on doit déterminer si $table et $multiple sont pairs
                    // ou impairs en même temps
                    $class = null;
                    if ($multiple % 2 === $table % 2) {
                        $class = 'bg-light';
                    }
                ?>
                    <!-- G - Si on arrive sur un nombre carré (4 x 4 = 16 par exemple), on ajoutera
                        un fond gris foncé sur la case du résultat. -->
                    <div class="item center <?= $class; ?> <?= $table === $multiple ? 'bg-dark' : ''; ?>">
                        <!-- D - On affiche le résultat entre chaque ligne et chaque colonne -->
                        <?= $table * $multiple; ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</body>
</html>

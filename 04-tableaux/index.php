<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les tableaux</title>
</head>
<body>
    <h2>Les tableaux numériques</h2>

    <?php
        // Les index sont numériques (0, 1, 2)
        $drinks = ['Monster', 'Coca-cola', 'Orangina'];

        // Afficher Orangina ?
        echo $drinks[2];
        echo '<br />';

        // Comment ajouter une boisson dans un tableau
        // array_push($drinks, 'Ice Tea'); // Ancienne méthode
        $drinks[] = 'Ice Tea';

        var_dump($drinks);
        echo '<br />';

        // Comment remplacer une boisson (Coca-cola) ?
        $drinks[1] = 'Vittel';

        var_dump($drinks);
        echo '<br />';

        // Comment supprimer une boisson (Orangina) ?
        unset($drinks[2]);

        var_dump($drinks);
        echo '<br />';
    ?>

    <ul>
        <?php foreach ($drinks as $drink) { ?>
            <li><?= $drink; ?></li>
        <?php } ?>
    </ul>

    <h2>Les tableaux associatifs</h2>

    <?php
        // Un tableau associatif possède des index que l'on définit nous-même.
        // Un index est unique. On n'est pas obligé de définir tous les index.
        $fruits = [
            'A' => 'Fraise',
            'jaune' => 'Banane',
            'Cerise',
            'D' => 'Orange',
            'Pomme',
        ];

        var_dump($fruits);
        echo '<br />';

        echo $fruits['jaune'];
        echo '<br />';

        $fruits['jaune2'] = 'Citron';
    ?>

    <ul>
        <!-- On peut récupèrer l'index avec le double arrow operator (opérateur double flèche) -->
        <?php foreach ($fruits as $index => $fruit) { ?>
            <li><?= $index.' : '.$fruit; ?></li>
        <?php } ?>
    </ul>

    <h2>Les tableaux multidimensionnels</h2>

    <?php
        $users = [ // Dimension 1
            [ // Dimension 2
                'name' => 'Mota',
                'firstname' => 'Fiorella',
                'phone' => '0600000000',
                'addresses' => ['Hulluch', 'Lens', 'Lille'], // Dimension 3
            ],
            [
                'name' => 'Mota',
                'firstname' => 'Marina',
                'phone' => '0700000000',
                'addresses' => ['Hulluch'],
            ],
        ];

        // Comment afficher Fiorella Mota vit à Hulluch et à Lens.
    ?>
    <p><?= $users[0]['firstname'].' '.$users[0]['name']; ?> vit à <?= $users[0]['addresses'][0]; ?> et à <?= $users[0]['addresses'][1]; ?>.</p>

    <!-- Comment afficher tous les utilisateurs avec toutes leurs adresses -->
    <?php foreach ($users as $user) { ?>
        <p>
            <?= $user['firstname'].' '.$user['name']; ?> vit

            <?php foreach ($user['addresses'] as $index => $address) { ?>
                à <?= $address; ?>
                <?= $index < count($user['addresses']) - 1 ? 'et' : ''; ?>
            <?php } ?>
        </p>
    <?php } ?>

    <h2>Nous avons <?= count($users); ?> utilisateurs.</h2>
</body>
</html>

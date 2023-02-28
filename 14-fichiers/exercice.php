<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichiers</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <?php
        // La "BDD" avec tous les prix
        $prices = [
            'Harry Potter' => 1,
            'Batman' => 2,
            'Pokemon' => 3,
        ];

        if (!empty($_POST)) {
            $email = $_POST['email'] ?? null;
            $products = $_POST['products'] ?? [];

            // L'ajout d'une commande
            $contenu = $email.' a commandé le '.date('d/m/Y H:i:s').': '.implode(', ', $products)."\n";
            file_put_contents('orders.txt', $contenu, FILE_APPEND);
        }

        touch('orders.txt'); // Créer le fichier s'il n'existe pas
        // La récupération de la liste des commandes (On parse les données)
        $orders = array_filter(explode("\n", file_get_contents('orders.txt')));
    ?>

    <div class="max-w-5xl mx-auto">
        <h1 class="text-3xl text-center">Commande</h1>

        <form action="" method="post" class="w-1/2 mx-auto">
            <div class="mb-3">
                <label for="email" class="block">Email</label>
                <input class="w-full" type="text" name="email" id="email">
            </div>

            <div class="mb-3">
                <label class="block">Produits</label>
                <?php foreach ($prices as $name => $price) { ?>
                <input type="checkbox" name="products[]" id="product-<?= $name; ?>" value="<?= $name; ?>">
                <label for="product-<?= $name; ?>" class="mx-3">
                    <?= $name; ?> (<?= $price; ?> €)
                </label>
                <?php } ?>
            </div>

            <button class="w-full bg-blue-400 hover:bg-blue-600 px-4 py-2 text-white rounded-lg shadow">Commander</button>
        </form>

        <?php if (! empty($orders)) { ?>
        <h2 class="text-center mt-5 text-xl font-bold">Liste des commandes</h2>
        <ul class="text-center">
            <?php
                $total = 0; // Total des commandes
            ?>

            <?php foreach ($orders as $order) {
                $totalLine = 0; // Total de la ligne
                $products = explode(', ', substr(strstr($order, ': '), 2)); // : A, B, C => ['A', 'B', 'C']
                foreach ($products as $product) {
                    $totalLine += $prices[$product];
                }
                $total += $totalLine;
            ?>
                <li>
                    <?= $order; ?> (<?= $totalLine; ?> €)
                </li>
            <?php } ?>
        </ul>
        <h2 class="text-center">Total des commandes: <?= $total; ?> €</h2>
        <?php } ?>
    </div>
</body>
</html>

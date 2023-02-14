<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
</head>
<body>
    <div class="max-w-lg mx-auto">
        <h2 class="text-center my-4 text-3xl">Formulaire d'inscription</h2>

        <?php
            // Etape 1 - Afficher le formulaire X
            // Etape 2 - Récupèrer les données du formulaire X
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;
            $errors = []; // Tableau qui contient les erreurs potentielles du formulaire

            // Etape 3 - Vérifier le formulaire
            if (!empty($_POST)) {

                if (empty($email)) {
                    $errors['email'] = 'L\'email est obligatoire.';
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = 'L\'email est invalide.';
                }

                if (mb_strlen($password) < 8) { // mb_ permet de compter les accents comme 1 et non 2
                    $errors['password'] = 'Le mot de passe doit faire 8 caractères minimum.';
                }

                // var_dump($errors);

                // Etape 4 - Afficher un message de succès ou on affiche les erreurs
                if (empty($errors)) {
                    // On pourrait envoyer un mail, faire une requête SQL...
                    // Succès, on affiche un message ?>
                    <h1 class="bg-green-300 p-4 rounded text-green-800 mb-3">
                        Merci <?= $email; ?>, vous êtes bien inscrit !
                    </h1>
                <?php } else {
                    foreach ($errors as $error) { ?>
                        <p class="text-red-600 mb-3">- <?= $error; ?></p>
                    <?php }
                }
            }
        ?>

        <form method="post" action="">
            <div class="mb-3">
                <label for="email" class="block">Email</label>
                <input class="mt-1 rounded-lg w-full" type="text" name="email" id="email" value="<?= $email; ?>">
            </div>

            <div class="mb-3">
                <label for="password" class="block">Mot de passe</label>
                <input class="mt-1 rounded-lg w-full <?= isset($errors['password']) ? 'border-red-600' : ''; ?>" type="password" name="password" id="password">
                <?php if (isset($errors['password'])) { ?>
                    <p class="text-red-600"><?= $errors['password']; ?></p>
                <?php } ?>
            </div>

            <button class="bg-blue-600 text-white px-3 py-2 rounded hover:bg-blue-800 duration-500">
                S'inscrire
            </button>
        </form>
    </div>
</body>
</html>

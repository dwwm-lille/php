<?php require __DIR__.'/partials/header.php';

// Récupère les données
$username = post('username');
$password = post('password');
$password_confirmation = post('password_confirmation');
$errors = [];

if (isSubmit()) {
    if (empty($username)) {
        $errors[] = 'Le pseudo est invalide.';
    }

    // On vérifie que le mot de passe soit rempli et qu'il soit identique
    // au champ password_confirmation
    if (empty($password) || $password != $password_confirmation) {
        $errors[] = 'Le mot de passe est invalide ou ne correspond pas à sa confirmation.';
    }

    // On vérifie si l'utilisateur existe
    $user = selectUser($username);

    if ($user) {
        $errors[] = 'Le pseudo est déjà utilisé.';
    }

    // Si on n'a pas d'erreurs, on inscrit l'utilisateur et on se connecte...
    if (empty($errors)) {
        db()->prepare('INSERT INTO user (username, email, password, token) VALUES (:username, :email, :password, :token)')->execute([
            'username' => $username,
            'email' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'token' => bin2hex(random_bytes(16)),
        ]);

        $_SESSION['user'] = $username; // On se connecte (avec la session)
        header('Location: profile.php');
    }
}

?>

<div class="h-screen flex items-center justify-center max-w-xl mx-auto">
    <div class="p-12 border rounded shadow flex-grow">
        <?php if (!empty($errors)) { ?>
            <div class="bg-red-300 p-5 rounded border border-red-800 text-red-800 mb-4">
                <?php foreach ($errors as $error) { ?>
                    <p><?= $error; ?></p>
                <?php } ?>
            </div>
        <?php } ?>

        <form action="" method="post" class="space-y-4">
            <div>
                <input class="border-gray-300 w-full" type="text" name="username" placeholder="Login" value="<?= $username; ?>">
            </div>
            <div>
                <input class="border-gray-300 w-full" type="password" name="password" placeholder="Mot de passe">
            </div>
            <div>
                <input class="border-gray-300 w-full" type="password" name="password_confirmation" placeholder="Confirmer le mot de passe">
            </div>

            <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded w-full">S'inscrire</button>
            <a href="index.php" class="mt-4 text-center block text-sm text-gray-500">Déjà un compte ?</a>
        </form>
    </div>
</div>

<?php require __DIR__.'/partials/footer.php'; ?>

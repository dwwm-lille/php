<?php require __DIR__.'/partials/header.php';

// Récupère les données
$username = post('username');
$password = post('password');
$remember = post('remember');
$errors = [];

if (isSubmit()) {
    // if ($username != 'admin' || $password != 'admin') {
    //     $errors[] = 'Les identifiants sont invalides.';
    // }

    // On veut vérifier que l'utilisateur existe dans la BDD
    // $query = db()->prepare('SELECT * FROM user WHERE username = :username');
    // $query->execute(['username' => $username]);
    // $user = $query->fetch();
    $user = selectUser($username);

    if (!$user || !password_verify($password, $user['password'])) {
        $errors[] = 'Les identifiants sont invalides.';
    }

    // Si on n'a pas d'erreurs, on se connecte...
    if (empty($errors)) {
        $_SESSION['user'] = $username; // On se connecte (avec la session)

        if ($remember) { // Si la case est cochée, on fait un cookie
            setcookie('remember', $user['token'], time() + 60 * 60 * 24 * 365);
        }

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
            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="border-gray-300 mr-4">
                <label for="remember" class="text-sm text-gray-500">Se rappeller de moi</label>
            </div>

            <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded w-full">Login</button>
            <a href="register.php" class="mt-4 text-center block text-sm text-gray-500">Pas de compte ?</a>
        </form>
    </div>
</div>

<?php require __DIR__.'/partials/footer.php'; ?>

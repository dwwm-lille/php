<?php require __DIR__.'/partials/header.php'; ?>

<div class="h-screen flex items-center justify-center max-w-xl mx-auto">
    <div class="p-12 border rounded shadow flex-grow">
        <form action="" method="post" class="space-y-4">
            <div>
                <input class="border-gray-300 w-full" type="text" name="username" placeholder="Login">
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

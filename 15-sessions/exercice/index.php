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

            <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded w-full">Login</button>
        </form>
    </div>
</div>

<?php require __DIR__.'/partials/footer.php'; ?>

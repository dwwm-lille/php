<?php require __DIR__.'/partials/header.php'; ?>

<div class="max-w-5xl mx-auto">
    <h1 class="text-3xl text-center">Ajouter un film</h1>

    <form action="" method="post" class="px-3 w-1/2 mx-auto">
        <div class="mb-3">
            <label for="title" class="block">Titre</label>
            <input class="w-full rounded-lg border-gray-300" type="text" name="title" id="title">
        </div>
        <div class="mb-3">
            <label for="released_at" class="block">Date de sortie</label>
            <input class="w-full rounded-lg border-gray-300" type="date" name="released_at" id="released_at">
        </div>
        <div class="mb-3">
            <label for="description" class="block">Description</label>
            <textarea class="w-full rounded-lg border-gray-300" name="description" id="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="duration" class="block">Durée</label>
            <input class="w-full rounded-lg border-gray-300" type="text" name="duration" id="duration">
        </div>
        <!-- @todo Upload de l'image -->
        <div class="mb-6">
            <label for="category" class="block">Catégorie</label>
            <select class="w-full rounded-lg border-gray-300" name="category" id="category">
                <option>@todo récupérer les catégories</option>
            </select>
        </div>
        <button class="bg-blue-400 hover:bg-blue-300 duration-500 px-3 py-2 rounded-lg mt-3 block w-full text-white text-center">Ajouter un film</button>
    </form>
</div>

<?php require __DIR__.'/partials/footer.php'; ?>

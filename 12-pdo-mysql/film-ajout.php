<?php require __DIR__.'/partials/header.php';

// Récupèrer les catégories
$categories = db()->query('SELECT * FROM category')->fetchAll();

// Récupérer les valeur du formulaire
$title = sanitize($_POST['title'] ?? null);
$released_at = sanitize($_POST['released_at'] ?? null);
$description = sanitize($_POST['description'] ?? null);
$duration = sanitize($_POST['duration'] ?? null);
$cover = $_FILES['cover'] ?? null;
$category = sanitize($_POST['category'] ?? null);

$errors = [];

// Vérifier et traiter le formulaire
if (!empty($_POST)) {
    // Vérification des erreurs
    if (strlen($title) === 0) {
        $errors['title'] = 'Le titre est obligatoire.';
    }

    // Vérification de la date : 2023-02-23
    $date = explode('-', $released_at); // [2023, 02, 23];
    $year = (int) ($date[0] ?? 0); // 'toto' devient 0 et '' devient 0
    $month = (int) ($date[1] ?? 0);
    $day = (int) ($date[2] ?? 0);
    if (! checkdate($month, $day, $year)) {
        $errors['released_at'] = 'La date est incorrecte.';
    }

    if (mb_strlen($description) <= 5) {
        $errors['description'] = 'La description doit faire 5 caractères minimum.';
    }

    if ($duration < 1 || $duration > 999) {
        $errors['duration'] = 'La durée doit être entre 1 et 999 minutes.';
    }

    // Vérifier le type du fichier uploadé
    $mime = !empty($cover['tmp_name']) ? mime_content_type($cover['tmp_name']) : ''; // image/jpg
    $mimeTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif']; // Les types qu'on autorise

    if (! in_array($mime, $mimeTypes)) {
        $errors['covers'] = 'Le fichier n\'est pas une image';
    }

    // Vérifier l'existence de la catégorie avec une requête (Non préparé ici pour l'exemple mais il faudrait...)
    // ->fetchColumn() prend la valeur unique du résultat SQL
    $exists = db()->query('SELECT COUNT(id_category) FROM category WHERE id_category = '.intval($category))->fetchColumn(); // 1 ou 0
    if (! $exists) {
        $errors['category'] = 'La catégorie doit exister.';
    }

    // Traitement du formulaire s'il n'y a pas d'erreurs
    if (empty($errors)) {
        // Upload de l'image
        $file = $cover['tmp_name']; // Emplacement temporaire
        $filename = $cover['name']; // Nom du fichier original toto.jpg
        $extension = substr(strrchr($filename, '.'), 1); // jpg
        // Die Hard.jpg => die-hard-abf123.jpg
        $filename = strtolower(str_replace(' ', '-', $title)).'-'.uniqid().'.'.$extension;

        move_uploaded_file($file, __DIR__.'/uploads/'.$filename); // on upload dans dossier/uploads/die-hard.jpg

        // On fait la requête SQL pour insérer le film
        $query = db()->prepare('INSERT INTO movie (title, released_at, description, duration, cover, id_category)
            VALUES (:title, :released_at, :description, :duration, :cover, :category)');
        $query->execute([
            'title' => $title,
            'released_at' => $released_at,
            'description' => $description,
            'duration' => $duration,
            'cover' => $filename,
            'category' => $category,
        ]);
    }
}
?>

<div class="max-w-5xl mx-auto">
    <h1 class="text-3xl text-center">Ajouter un film</h1>

    <form action="" method="post" enctype="multipart/form-data" class="px-3 w-1/2 mx-auto">
        <?php if (! empty($errors)) { ?>
            <div class="bg-red-300 p-5 rounded border border-red-800 text-red-800 my-4">
                <?php foreach ($errors as $error) { ?>
                    <p><?= $error; ?></p>
                <?php } ?>
            </div>
        <?php } ?>

        <div class="mb-3">
            <label for="title" class="block">Titre</label>
            <input class="w-full rounded-lg border-gray-300" type="text" name="title" id="title" value="<?= $title; ?>">
        </div>
        <div class="mb-3">
            <label for="released_at" class="block">Date de sortie</label>
            <input class="w-full rounded-lg border-gray-300" type="date" name="released_at" id="released_at" value="<?= $released_at; ?>">
        </div>
        <div class="mb-3">
            <label for="description" class="block">Description</label>
            <textarea class="w-full rounded-lg border-gray-300" name="description" id="description"><?= $description; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="duration" class="block">Durée</label>
            <input class="w-full rounded-lg border-gray-300" type="text" name="duration" id="duration" value="<?= $duration; ?>">
        </div>
        <div class="mb-3">
            <label for="cover" class="block">Image</label>
            <input type="file" class="file:bg-blue-400 hover:file:bg-blue-300 file:rounded-lg file:border-0 file:text-white file:px-3 file:py-2 file:cursor-pointer" name="cover" id="cover">
        </div>
        <div class="mb-6">
            <label for="category" class="block">Catégorie</label>
            <select class="w-full rounded-lg border-gray-300" name="category" id="category">
                <option hidden>Choisir une catégorie...</option>
                <?php foreach ($categories as $cat) { ?>
                <option <?= $cat['id_category'] === $category ? 'selected' : '' ?> value="<?= $cat['id_category']; ?>">
                    <?= $cat['name']; ?>
                </option>
                <?php } ?>
            </select>
        </div>
        <button class="bg-blue-400 hover:bg-blue-300 duration-500 px-3 py-2 rounded-lg mt-3 block w-full text-white text-center">Ajouter un film</button>
    </form>
</div>

<?php require __DIR__.'/partials/footer.php'; ?>

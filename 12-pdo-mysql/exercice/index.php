<?php require __DIR__.'/partials/header.php';

$name = post('name');
$message = post('message');

$errors = [];

// On récupère les derniers contacts
$contacts = db()->query('SELECT * FROM contacts ORDER BY created_at DESC')->fetchAll();

if (isSubmit()) {
    if (empty($name)) {
        $errors['name'] = 'Le nom est obligatoire.';
    }

    if (strlen($message) < 15) {
        $errors['message'] = 'Le message doit faire 15 caractères minimum.';
    }

    if (count($contacts) > 5) {
        $errors['general'] = 'Il y a trop de messages. Veuillez essayer plus tard.';
    }

    if (empty($errors)) {
        $query = db()->prepare('INSERT INTO contacts (name, message, created_at)
            VALUES (:name, :message, :created_at)');

        $query->execute([
            'name' => $name,
            'message' => $message,
            'created_at' => date('Y-m-d H:i:s'), // 2023-02-24 10:58:09
        ]);

        // On récupère les derniers contacts
        $contacts = db()->query('SELECT * FROM contacts ORDER BY created_at DESC')->fetchAll();
    }
}
?>

<div class="max-w-5xl mx-auto my-8">
    <h1 class="text-3xl text-center mb-8">Nous contacter</h1>

    <?php if (isSubmit() && empty($errors)) { ?>
        <p class="text-green-500">Le message de <?= $name; ?> a été ajouté.</p>
    <?php } ?>

    <?php if (!empty($errors)) { ?>
        <div class="bg-red-300 p-5 rounded border border-red-800 text-red-800 my-4">
            <?php foreach ($errors as $error) { ?>
                <p><?= $error; ?></p>
            <?php } ?>
        </div>
    <?php } ?>

    <form action="" method="post">
        <div class="flex gap-3 justify-between">
            <div class="w-1/3">
                <label for="name" class="block">Nom</label>
                <input class="w-full rounded" type="text" name="name" id="name">
            </div>
            <div class="w-1/3">
                <label for="message" class="block">Message</label>
                <textarea class="w-full rounded" name="message" id="message"></textarea>
            </div>
            <div class="w-1/3">
                <label for="message" class="block">&nbsp;</label>
                <button class="bg-emerald-300 hover:bg-emerald-500 text-emerald-800 hover:text-emerald-100 duration-500 rounded-md px-6 py-2">
                    Envoyer
                </button>
            </div>
        </div>
    </form>

    <div class="flex flex-wrap">
        <?php foreach ($contacts as $contact) { ?>
            <div class="w-1/4">
                <div class="m-3">
                    <h3><?= $contact['name']; ?></h3>
                    <p><?= $contact['message']; ?></p>
                    <p><?= $contact['created_at']; ?></p>
                    <a href="delete.php?id=<?= $contact['id']; ?>">Supprimer</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php require __DIR__.'/partials/footer.php'; ?>

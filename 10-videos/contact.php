<?php require __DIR__.'/partials/header.php';

    // La liste des sujets. La valeur représente ce qu'on affiche et la clé est un identifiant du sujet
    // qui pourrait être utile si on veut stocker la demande de contact dans la base de données.
    $subjects = [
        'stage' => 'Proposition de stage',
        'job' => 'Proposition d\'emploi',
        'project' => 'Demande de projet',
    ];

    // La valeur des champs
    $email = post('email');
    $subject = post('subject');
    $message = post('message');
    $civility = post('civility');

    // Tableau d'erreurs
    $errors = [];

    // On vérifie que le formulaire est soumis
    if (isSubmit()) {
        // On vérifie les champs
        if (empty($email)) {
            $errors['email'] = 'L\'email est obligatoire.';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'L\'email est invalide.';
        }

        if (strlen($message) < 15) {
            $errors['message'] = 'Le message doit faire 15 caractères.';
        }

        // BONUS: Vérifier le sujet (par rapport à un tableau)
        // En gros, on veut vérifier que le sujet saisi est dans le tableau
        // array_keys retourne un tableau avec les clés d'un tableau
        if (empty($subject) || !in_array($subject, array_keys($subjects))) {
            $errors['subject'] = 'Le sujet est invalide.';
        }

        if ($civility != 'mme' && $civility != 'mr') {
            $errors['civility'] = 'La civilité est invalide.';
        }
    }
?>

<div class="max-w-2xl mx-auto px-3 pb-32">
    <h1 class="text-4xl text-center my-8">Nous contacter</h1>

    <?php if (!empty($errors)) { ?>
        <div class="bg-red-300 p-5 rounded border border-red-800 text-red-800 my-4">
            <?php foreach ($errors as $error) { ?>
                <p><?= $error; ?></p>
            <?php } ?>
        </div>
    <?php } ?>

    <?php if (isSubmit() && empty($errors)) { ?>
        <div class="bg-green-100 p-5 rounded text-green-900 mb-4">
            <p>Bonjour <?= $email; ?></p>
            <p>Sujet: <?= $subjects[$subject]; ?></p>
            <p>Message: <?= $message; ?></p>
            <p>Civilité: <?= ucfirst($civility); ?></p>
        </div>
    <?php } ?>

    <form method="post" action="">
        <div class="lg:flex justify-between gap-8">
            <div class="lg:w-1/2 mb-3">
                <label for="email" class="block text-gray-600 text-sm">Email</label>
                <input class="w-full rounded mt-1 border-gray-300 shadow <?= isset($errors['email']) ? 'border-red-500' : ''; ?>" type="text" name="email" id="email" value="<?= $email; ?>">

                <?php if (isset($errors['email'])) { ?>
                    <span class="text-sm text-red-600 mt-1"><?= $errors['email']; ?></span>
                <?php } ?>
            </div>
            <div class="lg:w-1/2 mb-3">
                <label for="subject" class="block text-gray-600 text-sm">Sujet</label>
                <select class="w-full rounded mt-1 border-gray-300 shadow <?= isset($errors['subject']) ? 'border-red-500' : ''; ?>" name="subject" id="subject">
                    <option hidden>Choisir un sujet</option>
                    <?php foreach ($subjects as $key => $sub) { ?>
                    <option <?= $key == $subject ? 'selected' : '' ; ?> value="<?= $key; ?>"><?= $sub; ?></option>
                    <?php } ?>
                </select>

                <?php if (isset($errors['subject'])) { ?>
                    <span class="text-sm text-red-600 mt-1"><?= $errors['subject']; ?></span>
                <?php } ?>
            </div>
        </div>

        <div class="mt-3">
            <label for="message" class="block text-gray-600 text-sm">Message</label>
            <textarea class="w-full rounded mt-1 border-gray-300 shadow <?= isset($errors['message']) ? 'border-red-500' : ''; ?>" name="message" id="message" rows="5"><?= $message; ?></textarea>

            <?php if (isset($errors['message'])) { ?>
                <span class="text-sm text-red-600 mt-1"><?= $errors['message']; ?></span>
            <?php } ?>
        </div>

        <div class="mt-3">
            <p class="text-gray-600 text-sm">Civilité</p>

            <div class="flex gap-3 mt-2">
                <div class="flex items-center">
                    <input <?= $civility == 'mme' ? 'checked' : '' ; ?> id="mme" name="civility" type="radio" class="border-gray-300 shadow <?= isset($errors['civility']) ? 'border-red-500' : ''; ?>" value="mme">
                    <label for="mme" class="ml-3 block text-gray-600 text-sm">Mme</label>
                </div>

                <div class="flex items-center">
                    <input <?= $civility == 'mr' ? 'checked' : '' ; ?> id="mr" name="civility" type="radio" class="border-gray-300 shadow <?= isset($errors['civility']) ? 'border-red-500' : ''; ?>" value="mr">
                    <label for="mr" class="ml-3 block text-gray-600 text-sm">Mr</label>
                </div>
            </div>

            <?php if (isset($errors['civility'])) { ?>
                <span class="text-sm text-red-600 mt-1"><?= $errors['civility']; ?></span>
            <?php } ?>
        </div>

        <div class="mt-3 text-center">
            <button class="px-8 py-2 bg-indigo-600 hover:bg-indigo-700 rounded shadow text-white duration-500">Envoyer</button>
        </div>
    </form>
</div>
    
<?php require __DIR__.'/partials/footer.php'; ?>

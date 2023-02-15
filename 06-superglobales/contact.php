<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;700&display=swap">
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
</head>
<body class="font-[figtree]">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-4xl text-center my-8">Nous contacter</h1>

        <form method="post" action="">
            <div class="flex justify-between gap-8">
                <div class="w-1/2">
                    <label for="email" class="block text-gray-600 text-sm">Email</label>
                    <input class="w-full rounded mt-1 border-gray-300 shadow" type="text" name="email" id="email" value="">
                </div>
                <div class="w-1/2">
                    <label for="subject" class="block text-gray-600 text-sm">Sujet</label>
                    <select class="w-full rounded mt-1 border-gray-300 shadow" name="subject" id="subject">
                        <option disabled selected>Choisir un sujet</option>
                        <option value="stage">Proposition de stage</option>
                        <option value="job">Proposition d'emploi</option>
                        <option value="project">Demande de projet</option>
                    </select>
                </div>
            </div>

            <div class="mt-3">
                <label for="message" class="block text-gray-600 text-sm">Message</label>
                <textarea class="w-full rounded mt-1 border-gray-300 shadow" name="message" id="message" rows="5"></textarea>
            </div>

            <div class="mt-3">
                <p class="text-gray-600 text-sm">Civilité</p>

                <div class="flex gap-3 mt-2">
                    <div class="flex items-center">
                        <input id="mme" name="civility" type="radio" class="border-gray-300 shadow" value="mme">
                        <label for="mme" class="ml-3 block text-gray-600 text-sm">Mme</label>
                    </div>

                    <div class="flex items-center">
                        <input id="mr" name="civility" type="radio" class="border-gray-300 shadow" value="mr">
                        <label for="mr" class="ml-3 block text-gray-600 text-sm">Mr</label>
                    </div>
                </div>
            </div>

            <div class="mt-3 text-center">
                <button class="px-8 py-2 bg-indigo-600 hover:bg-indigo-700 rounded shadow text-white duration-500">Envoyer</button>
            </div>
        </form>
    </div>
</body>
</html>

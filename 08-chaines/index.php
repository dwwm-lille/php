<?php

/**
 * Fonctions sur les chaines en PHP
 */

// Extraire des chaines
$email = 'fiorella@cloud.boxydev.com';
$domain = strstr($email, '@'); // @boxydev.com (strstr prend la première apparition)
$domain = substr($domain, 1); // boxydev.com
$tld = strrchr($domain, '.'); // .com (strrchr prend la dernière apparition du .)

echo "Le domaine est $domain <br />";
echo "Le domaine de 1er niveau est $tld<br />";

// Vérifier qu'une chaine contient quelque chose
$sentence = 'Faire ou ne pas faire.';

// Le mb_ est utile pour les phrases avec accents
// Le i est pour être insensible à la casse (majuscule pas importante)
echo 'Le mot faire est à la position '.mb_stripos($sentence, 'faire');

var_dump(strpos($sentence, 'rien'));

// Attention dans un if, strpos peut induire un erreur si le mot est à la position
// 0 car cela peut être false pour le PHP
if (stripos($sentence, 'fai') !== false) {
    echo 'OK <br />';
}

// Remplacer une chaine dans une chaine
echo str_replace('boxydev', 'gmail', $email).'<br />';

// En PHP, une chaine est un tableau
echo $email[8].'<br />'; // @

// Si on caste une chaine en tableau, on peut la parcourir
foreach ((array) $email as $letter) {
    echo $letter;
}

echo '<br />';
// Extraire une chaine d'une chaine
// fiorella@cloud.boxydev.com

// strpos($email, '@') vaut 8
echo substr($email, 0, strpos($email, '@')).'<br />'; // fiorella
echo substr($email, 9, -4).'<br />'; // cloud.boxydev
echo substr($email, -3).'<br />'; // com

$countriesString = 'italie,portugal,france';
$countries = explode(',', $countriesString);
var_dump($countries);

echo '<ul>';
echo '<li>'.implode('</li><li>', $countries).'</li>'; // <li>italie</li><li>portugal</li><li>france</li>
echo '</ul>';

// Quelques fonctions pour les formulaires
$password = 'azerty123   ';
var_dump($password);
var_dump(trim($password));

// Exemple de faille XSS
// sur index.php?message=<script>alert('salut')</script>
$message = $_GET['message'] ?? '';

// Pour se protéger d'une faille XSS, on doit désactiver l'interprétation du HTML ou supprimer les balises
// $message = htmlspecialchars($message);
$message = strip_tags($message, ['strong', 'em']);

echo $message;

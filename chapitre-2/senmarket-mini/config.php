<?php
// Configuration de l'envoi d'email de confirmation de commande.
// La cle vit desormais dans .env (jamais committe) -- voir .env.example
// pour la liste des variables attendues.
$racine = dirname(__DIR__, 0);
if (file_exists(__DIR__ . '/.env')) {
    foreach (parse_ini_file(__DIR__ . '/.env') as $cle => $valeur) {
        putenv("$cle=$valeur");
    }
}

define('TERANGAMAIL_API_KEY', getenv('TERANGAMAIL_API_KEY') ?: '');
define('TERANGAMAIL_FROM', getenv('TERANGAMAIL_FROM') ?: 'commandes@senmarket.sn');

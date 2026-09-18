<?php
// Envoie un email de confirmation au client apres la creation d'une commande.
// Appele depuis commande.php une fois le paiement confirme (a brancher).
require __DIR__ . '/config.php';
require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

function envoyerConfirmationCommande(string $emailClient, int $idCommande): bool {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.terangamail.sn';
    $mail->Username = TERANGAMAIL_FROM;
    $mail->Password = TERANGAMAIL_API_KEY;
    $mail->setFrom(TERANGAMAIL_FROM, 'SenMarket');
    $mail->addAddress($emailClient);
    $mail->Subject = 'Confirmation de ta commande n°' . $idCommande;
    $mail->Body = 'Ta commande n°' . $idCommande . ' est confirmee. Merci de ton achat sur SenMarket.';

    return $mail->send();
}

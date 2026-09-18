<?php
session_start();
$connecte = isset($_SESSION['utilisateur_id']);
?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="utf-8"><title>SenMarket mini</title><link rel="stylesheet" href="style.css"></head>
<body>
<h1>SenMarket mini</h1>
<p>Application volontairement vulnérable du chapitre 1 -- ne l'expose jamais au-delà de ta machine.</p>
<?php if ($connecte): ?>
  <p><a href="mon-compte.php">Mon compte</a> · <a href="avis.php">Avis produits</a> · <a href="logout.php">Se déconnecter</a></p>
<?php else: ?>
  <p><a href="login.php">Se connecter</a> · <a href="avis.php">Avis produits</a></p>
<?php endif; ?>
</body>
</html>

<?php
session_start();
require __DIR__ . '/includes/db.php';

$erreur = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $motDePasse = $_POST['mot_de_passe'] ?? '';

    $pdo = connexionBD();

    // VULNERABLE : le texte tape par l'utilisateur est concatene directement
    // dans la requete SQL. C'est exactement le defaut du chapitre 1.
    $sql = "SELECT * FROM utilisateurs WHERE email = '$email' AND mot_de_passe = '$motDePasse'";
    $resultat = $pdo->query($sql);
    $utilisateur = $resultat ? $resultat->fetch(PDO::FETCH_ASSOC) : false;

    if ($utilisateur) {
        $_SESSION['utilisateur_id'] = $utilisateur['id'];
        $_SESSION['nom'] = $utilisateur['nom'];
        header('Location: mon-compte.php');
        exit;
    }
    $erreur = 'Identifiants incorrects.';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="utf-8"><title>SenMarket -- Connexion</title><link rel="stylesheet" href="style.css"></head>
<body>
<h1>SenMarket</h1>
<h2>Connexion</h2>
<?php if ($erreur): ?><p class="erreur"><?= $erreur ?></p><?php endif; ?>
<form method="post">
  <label>Email <input type="email" name="email"></label>
  <label>Mot de passe <input type="password" name="mot_de_passe"></label>
  <button type="submit">Se connecter</button>
</form>
</body>
</html>

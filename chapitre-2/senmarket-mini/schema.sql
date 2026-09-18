-- SenMarket mini -- schema SQLite, version enonce (volontairement vulnerable)
DROP TABLE IF EXISTS utilisateurs;
DROP TABLE IF EXISTS commandes;
DROP TABLE IF EXISTS avis;

CREATE TABLE utilisateurs (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  email TEXT NOT NULL UNIQUE,
  mot_de_passe TEXT NOT NULL,
  nom TEXT NOT NULL
);

CREATE TABLE commandes (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  utilisateur_id INTEGER NOT NULL,
  produit TEXT NOT NULL,
  montant_fcfa INTEGER NOT NULL,
  adresse_livraison TEXT NOT NULL,
  FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id)
);

CREATE TABLE avis (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  produit TEXT NOT NULL,
  auteur TEXT NOT NULL,
  texte TEXT NOT NULL
);

-- Mots de passe stockes en clair : c'est la version VULNERABLE (enonce).
-- La version corrige utilise password_hash().
INSERT INTO utilisateurs (email, mot_de_passe, nom) VALUES
  ('khady@senmarket.sn', 'boutique2024', 'Khady'),
  ('ousmane@senmarket.sn', 'frontend2024', 'Ousmane'),
  ('mariama@senmarket.sn', 'mariama77', 'Mariama');

INSERT INTO commandes (utilisateur_id, produit, montant_fcfa, adresse_livraison) VALUES
  (1, 'Tissu wax 6 metres', 24000, 'Khady, Marche Sandaga, Dakar'),
  (1, 'Machine a coudre portable', 65000, 'Khady, Marche Sandaga, Dakar'),
  (2, 'Casque audio sans fil', 18000, 'Ousmane, Cite Keur Gorgui, Dakar'),
  (3, 'Sac a main cuir', 32000, 'Mariama, Rue 10, Thies');

INSERT INTO avis (produit, auteur, texte) VALUES
  ('Tissu wax 6 metres', 'Ousmane', 'Tres beau tissu, livraison rapide.'),
  ('Casque audio sans fil', 'Mariama', 'Le son est correct pour le prix.');

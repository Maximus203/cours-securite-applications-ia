# Chapitre 1 — Contrôle d'accès et injections

## Application fournie : SenMarket mini

`senmarket-mini/` est une application PHP volontairement vulnérable, écrite
pour ce chapitre. Elle contient exactement les trois failles étudiées :
injection SQL sur la connexion, IDOR (contrôle d'accès cassé) sur la
consultation d'une commande, XSS stocké sur les avis produits.

### Lancer l'application

Aucune dépendance à installer : PHP seul suffit (SQLite embarqué).

```bash
cd chapitre-1/senmarket-mini
php -S 127.0.0.1:8000
# puis ouvre http://127.0.0.1:8000
```

La base `senmarket.sqlite` se crée automatiquement au premier lancement à
partir de `schema.sql`. Supprime ce fichier pour repartir de zéro.

Comptes de test (mots de passe volontairement simples, base locale
jetable) :

| Email | Mot de passe |
|---|---|
| khady@senmarket.sn | boutique2024 |
| ousmane@senmarket.sn | frontend2024 |
| mariama@senmarket.sn | mariama77 |

### Ne jamais exposer au-delà de ta machine

`127.0.0.1` uniquement — jamais `0.0.0.0`, jamais de port forwarding. Cette
application est volontairement truffée de failles (voir le cadre légal du
chapitre 0).

## Batterie d'exercices

Pas encore rédigée pour ce chapitre — les dossiers `exercices/1101` à
`1502` sont des squelettes génériques, en attente de contenu.

Les énoncés complets iront dans les documents Word `XXXX-exercice.docx`.

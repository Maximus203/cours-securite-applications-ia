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

## Batterie de 10 exercices

| Exercice | Niveau | Titre | Dossier |
|---|---|---|---|
| 1101 | 1 Découverte | Authentification ou autorisation ? | `exercices/1101/` |
| 1102 | 1 Découverte | Lire les codes HTTP sans paniquer | `exercices/1102/` |
| 1201 | 2 Application | Installer et explorer SenMarket mini | `exercices/1201/` |
| 1202 | 2 Application | Repérer un identifiant suspect sur Juice Shop | `exercices/1202/` |
| 1301 | 3 Consolidation | Exploiter l'IDOR de SenMarket mini | `exercices/1301/` |
| 1302 | 3 Consolidation | Contourner la connexion et laisser une trace | `exercices/1302/` |
| 1411 | 4 Approfondissement | Un XSS qui fait plus qu'une popup (concept externe) | `exercices/1411/` |
| 1402 | 4 Approfondissement | Prioriser trois failles avec un budget limité | `exercices/1402/` |
| 1501 | 5 Expert | Corriger les trois failles de SenMarket mini | `exercices/1501/` |
| 1502 | 5 Expert | Auditer un projet que tu as toi-même écrit | `exercices/1502/` |

Les énoncés complets sont dans les documents Word `XXXX-exercice.docx`.

Rappel du cadre légal du chapitre 0 : toute manipulation offensive se fait
exclusivement sur SenMarket mini et sur ton instance Juice Shop en local,
jamais sur un système qui ne t'appartient pas.

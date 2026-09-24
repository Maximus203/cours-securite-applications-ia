# Chapitre 2 — Chaîne d'approvisionnement et secrets

## Application fournie : SenMarket mini (suite du chapitre 1)

`senmarket-mini/` reprend l'application du chapitre 1 et ajoute une
fonctionnalité réelle : l'envoi d'un email de confirmation de commande. Deux
problèmes volontaires y ont été introduits, exactement comme un vrai projet
les accumule :

1. Une dépendance ajoutée avec une version figée qui contient trois failles
   connues et publiées (`phpmailer/phpmailer` 6.1.0).
2. Une clé d'API codée en dur dans `config.php`, committée, puis retirée du
   code dans un commit suivant — **sans jamais être retirée de l'historique
   Git**. C'est le cœur de la mission de ce chapitre.

### Installer et auditer

```bash
cd chapitre-2/senmarket-mini
composer install
composer audit
```

`composer audit` doit signaler trois avis de sécurité sur `phpmailer/phpmailer`.

### Chercher le secret dans l'historique

La clé `TERANGAMAIL_API_KEY` n'apparaît plus dans aucun fichier actuel du
dépôt — cherche-la avec `git log -p -- chapitre-2/senmarket-mini/config.php`
ou un scanner comme [gitleaks](https://github.com/gitleaks/gitleaks).

**Note de sécurité** : cette clé est entièrement fictive (format inventé
`tm_live_...`, service `TerangaMail` imaginaire). Elle ne correspond à aucun
service réel et n'a aucune valeur en dehors de cet exercice — c'est un
artefact pédagogique volontaire, au même titre que les failles de Juice Shop.

### Lancer l'application

```bash
cd chapitre-2/senmarket-mini
php -S 127.0.0.1:8000
```

Comptes de test identiques au chapitre 1 (voir son README).

## Batterie de 10 exercices

| Exercice | Niveau | Titre | Dossier |
|---|---|---|---|
| 2101 | 1 Découverte | Dépendance directe ou transitive ? | `exercices/2101/` |
| 2102 | 1 Découverte | Lire un avis de sécurité sans paniquer | `exercices/2102/` |
| 2201 | 2 Application | Auditer SenMarket mini avec composer audit | `exercices/2201/` |
| 2202 | 2 Application | Auditer OWASP Juice Shop avec npm audit | `exercices/2202/` |
| 2301 | 3 Consolidation | Trouver le secret dans l'historique | `exercices/2301/` |
| 2302 | 3 Consolidation | Corriger la dépendance et sortir le secret | `exercices/2302/` |
| 2411 | 4 Approfondissement | Purger un secret de l'historique avec git filter-repo (concept externe) | `exercices/2411/` |
| 2402 | 4 Approfondissement | Décider face à un « no fix available » | `exercices/2402/` |
| 2501 | 5 Expert | Écrire un plan de rotation complet | `exercices/2501/` |
| 2502 | 5 Expert | Auditer les dépendances et les secrets d'un projet personnel | `exercices/2502/` |

Les énoncés complets sont dans les documents Word `XXXX-exercice.docx`.

Rappel du cadre légal du chapitre 0 : toute manipulation offensive se fait
exclusivement sur SenMarket mini et sur ton instance Juice Shop en local,
jamais sur un système qui ne t'appartient pas.

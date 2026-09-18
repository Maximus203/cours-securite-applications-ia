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

| Exercice | Niveau | Dossier |
|---|---|---|
| 2101 | 1 Découverte | `exercices/2101/` |
| 2102 | 1 Découverte | `exercices/2102/` |
| 2201 | 2 Application | `exercices/2201/` |
| 2202 | 2 Application | `exercices/2202/` |
| 2301 | 3 Consolidation | `exercices/2301/` |
| 2302 | 3 Consolidation | `exercices/2302/` |
| 2401 | 4 Approfondissement | `exercices/2401/` |
| 2402 | 4 Approfondissement | `exercices/2402/` |
| 2501 | 5 Expert | `exercices/2501/` |
| 2502 | 5 Expert | `exercices/2502/` |

Les énoncés complets sont dans les documents Word `XXXX-exercice.docx`.

Rappel du cadre légal du chapitre 0 : toute manipulation offensive se fait
exclusivement sur SenMarket mini et sur ton instance Juice Shop en local,
jamais sur un système qui ne t'appartient pas.

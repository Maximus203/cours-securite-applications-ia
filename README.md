# Cours securite-applications-ia

Dépôt officiel du cours. Il contient le code de départ (starter) de tous les
exercices, chapitre par chapitre.

## Organisation

Un seul dépôt, des branches par chapitre.

| Branche | Contenu |
|---|---|
| `main` | Ce README, la structure générale |
| `chapitre-N/enonce` | Code de départ des exercices du chapitre N |
| `chapitre-N/corrige` | Corrigés — publiés après la date limite |
| `projet/<nom>` | Cahier des charges et squelette du projet final |

## Récupérer le starter d'un chapitre

```bash
git clone -b chapitre-6/enonce https://github.com/Maximus203/cours-securite-applications-ia.git
cd cours-securite-applications-ia
```

## Travailler sur ton propre dépôt

Tu rends **ton** dépôt, pas une pull request sur celui-ci.

```bash
git remote remove origin
git remote add origin https://github.com/<ton-compte>/<ton-repo>.git
git add .
git commit -m "chapitre 6 : mes exercices"
git push -u origin main
```

## Marqueurs dans le code

Les endroits où tu dois écrire du code sont marqués :

```
// TODO(6301) : implémenter la validation de l'email
```

Le nombre entre parenthèses est le code de l'exercice — retrouve son énoncé
complet dans le document Word correspondant.

## Rendu

Chaque exercice se rend sous la forme d'un lien vers ton dépôt, et l'URL de
déploiement quand le projet est déployable.

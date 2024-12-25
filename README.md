# Système de Gestion des Notes Universitaires - LMD

## Description du Projet

Le projet consiste à développer une application web permettant de gérer les notes dans un système d'enseignement basé sur le système LMD (Licence-Master-Doctorat). L'application permet de gérer les Unités d'Enseignement (UE), les éléments constitutifs (EC), ainsi que les notes des étudiants, en calculant les moyennes, validant les UEs, et gérant la progression des étudiants.

## Groupe 4

### Organisation de l'Équipe

#### 1. **AMETEPE Malthus** - *Chef de Projet*

Responsabilités :
- Responsable de la structure générale du projet
- Gérer la base de données (UEs et ECs)
- Gérer le dépôt GitHub
- S'assurer que tout le monde peut travailler ensemble
- Aider les coéquipiers en cas de soucis

**Tâches principales :**
1. Créer les tables pour les UEs et ECs
2. Développer les modèles Laravel
3. Créer les pages pour gérer les UEs et ECs
4. Écrire les tests de base

**Fonctionnalités à implémenter :**
- **Gestion des UEs :**
  - Créer une UE avec son code (exemple : UE11)
  - Définir les crédits ECTS de l'UE
  - Associer des ECs à l'UE
  - Définir le semestre de l'UE (S1 à S6 pour Licence)
- **Gestion des ECs :**
  - Créer un EC avec son code
  - Définir le coefficient de l'EC dans l'UE
  - Associer l'EC à une UE
  - Gérer les enseignants responsables des ECs

**Tests à implémenter :**
- Test de création d'une UE valide
- Vérification des crédits ECTS (entre 1 et 30)
- Test d'association des ECs à une UE
- Validation du code UE (format UExx)
- Vérification du semestre
- Création d'un EC avec coefficient
- Vérification du rattachement à une UE
- Test de modification d'un EC
- Validation du coefficient (entre 1 et 5)
- Test de suppression d'un EC

---

#### 2. **ALOUKOU Bovis** - *Responsable des Tests des Notes*

Responsabilités :
- Gérer les étudiants (ajout, modification)
- Gérer les notes
- Effectuer les calculs des moyennes simples
- Tester le bon fonctionnement des calculs

**Tâches principales :**
1. Créer les tables pour les étudiants et les notes
2. Créer les pages pour ajouter des notes
3. Programmer le calcul des moyennes
4. Tester la bonne sauvegarde des notes

**Fonctionnalités à implémenter :**
- **Gestion des Notes :**
  - Saisir les notes par EC
  - Calculer la moyenne de l'UE
  - Gérer la session normale et la session de rattrapage
  - Afficher les résultats par semestre

**Tests à implémenter :**
- Test d'ajout d'une note valide
- Vérification des limites des notes (0-20)
- Calcul de la moyenne d'une UE
- Gestion des sessions (normale/rattrapage)
- Validation des notes manquantes

---

#### 3. **AMAH-ATAYI Laurance** - *Responsable des Tests de Validation*

Responsabilités :
- Créer les pages principales
- Développer les formulaires
- Afficher les résultats de manière attrayante
- S'assurer que l'application est facile à utiliser

**Tâches principales :**
1. Créer la page d'accueil
2. Créer les tableaux de notes
3. Créer les pages de résultats
4. Tester l'affichage et la convivialité des pages

**Fonctionnalités à implémenter :**
- **Validation des UEs :**
  - Calculer si l'UE est validée (moyenne ≥ 10/20)
  - Gérer la compensation entre UEs du même semestre
  - Calculer les crédits ECTS acquis
  - Déterminer le passage à l'année suivante

**Tests à implémenter :**
- Validation d'une UE (moyenne ≥ 10)
- Test de compensation entre UEs
- Calcul des crédits ECTS acquis
- Validation du semestre
- Test de passage à l'année suivante

---

## Technologies Utilisées

- **Backend :** Laravel 10 ou 11  
- **Frontend :** Blade, TailwindCSS

---

## Fonctionnalités Principales

1. **Gestion des UEs :**
   - Créer une UE avec son code et ses crédits ECTS
   - Associer des ECs à une UE
   - Définir le semestre de l'UE
2. **Gestion des ECs :**
   - Créer un EC avec son code et son coefficient
   - Associer l'EC à une UE
   - Gérer les enseignants responsables
3. **Gestion des Notes :**
   - Saisir les notes par EC
   - Calculer la moyenne d'une UE
   - Gérer la session normale et la session de rattrapage
   - Afficher les résultats par semestre
4. **Validation des UEs :**
   - Calculer la validation d'une UE (moyenne ≥ 10)
   - Gérer la compensation entre UEs
   - Calculer les crédits ECTS acquis
   - Déterminer le passage à l'année suivante

---

## Tests à Implémenter

### Tests des UEs
1. Test de création d'une UE valide  
2. Vérification des crédits ECTS (entre 1 et 30)  
3. Test d'association des ECs à une UE  
4. Validation du code UE (format UExx)  
5. Vérification du semestre  

### Tests des ECs
1. Création d'un EC avec coefficient  
2. Vérification du rattachement à une UE  
3. Test de modification d'un EC  
4. Validation du coefficient (entre 1 et 5)  
5. Test de suppression d'un EC  

### Tests des Notes
1. Ajout d'une note valide  
2. Vérification des limites des notes (0-20)  
3. Calcul de la moyenne d'une UE  
4. Gestion des sessions (normale/rattrapage)  
5. Validation des notes manquantes  

### Tests de Validation
1. Validation d'une UE (moyenne ≥ 10)  
2. Test de compensation entre UEs  
3. Calcul des ECTS acquis  
4. Validation du semestre  
5. Test de passage à l'année suivante

--- 

# Tour du Maroc - Plateforme Digitale 🚴‍♂️

![Tour du Maroc Banner](/public/assets/images/Capture%20d'écran%202025-02-14%20202806.png)

[![PHP Version](https://img.shields.io/badge/PHP-8.x-blue.svg)](https://www.php.net)
[![PostgreSQL](https://img.shields.io/badge/PostgreSQL-12+-blue.svg)](https://www.postgresql.org)

## Vue d'Ensemble

La plateforme Tour du Maroc est une application web innovante qui révolutionne l'expérience du cyclisme professionnel au Maroc. Elle connecte fans, cyclistes et organisateurs dans un écosystème digital complet.

### 🎯 Objectifs du Projet

- Digitaliser l'expérience du Tour du Maroc
- Créer une communauté engagée autour du cyclisme
- Fournir des outils d'analyse performants pour les cyclistes
- Optimiser la gestion des événements

### 📊 Métriques Clés

- Temps réel de suivi des courses
- Analyses de performance avancées
- Engagement communautaire
- Gestion événementielle

## Fonctionnalités

### 🌟 Fonctionnalités Principales

#### Système Multi-Utilisateurs
```php
// Exemple de structure de rôles
public enum UserRole {
    case VISITOR;
    case FAN;
    case CYCLIST;
    case ADMIN;
}
```

#### Pour les Visiteurs
- 🗺️ Carte interactive des étapes
- 🔍 Recherche avancée avec filtres multiples
- 📊 Tableaux de classement en temps réel
- 🎥 Galerie multimédia



#### Pour les Cyclistes
- 📈 Dashboard personnalisé
- 🎯 Suivi des performances
- 📊 Analyses comparatives
- 📸 Galerie personnelle

#### Pour les Administrateurs
- 🎛️ Panel d'administration complet
- 📊 Tableaux de bord analytiques
- 🔍 Outils de modération
- 📨 Système de messagerie


## Architecture Technique

### 🏗️ Stack Technique

#### Backend
- **Framework**: PHP 8.x MVC personnalisé
- **Base de données**: PostgreSQL 12+



### 📦 Structure du Projet

```
tour-maroc/
├── app/
│   ├── Controllers/
│   ├── Dao/
│   ├── Models/
│   ├── Services/
│   └── Views/
│   └── Utils/
├── config/
├── core/
├── public/
├── modeling/
├── vendor/
└── README.md
```

## Installation

### 🔧 Prérequis

- PHP >= 8.0
- PostgreSQL >= 12
- Composer



## 🙏 Remerciements

- Mohammed Ali Rostom 
- Hamza Chehlaoui 
- Hamza Lhadouchi
- Malika EL Abiad
- Kaoutar Laamiri 

---

Développé avec ❤️ pour la communauté cycliste marocaine
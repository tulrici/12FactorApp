
# Application Symfony
## Description

Cette application est conçue pour gérer divers processus administratifs et comprend une API qui centralise les services. Les logs, les relations entre entités, et les tâches automatisées font partie de l’architecture.

## Prérequis

- PHP 8.2 ou supérieur
- Composer
- Un serveur de base de données (MySQL, PostgreSQL)
- Symfony CLI (facultatif mais recommandé)
- Node.js et npm (pour les assets front-end, si nécessaire)

## Installation

1. **Cloner le dépôt**

   ```bash
   git clone https://github.com/votre-utilisateur/votre-depot.git
   cd votre-depot

	2.	Installer les dépendances PHP
Installez les dépendances nécessaires en utilisant Composer :

composer install


	3.	Configurer les variables d’environnement
Copiez le fichier .env et configurez les informations nécessaires pour la base de données :

cp .env .env.local

Dans .env.local, renseignez DATABASE_URL selon votre configuration, par exemple :

DATABASE_URL="mysql://user:password@127.0.0.1:3306/12FactorDB"


	4.	Créer la base de données
Exécutez la commande suivante pour créer la base de données :

php bin/console doctrine:database:create


	5.	Exécuter les migrations
Appliquez les migrations pour créer les tables nécessaires :

php bin/console doctrine:migrations:migrate


	6.	Installer les dépendances front-end (si applicable)
Installez les dépendances JavaScript :

npm install
npm run build



Configuration

	•	Logging : Les logs sont centralisés et gérés via Monolog. Les environnements dev, test et prod utilisent des configurations de logs différentes.
	•	Tâches automatisées : Des commandes Symfony ont été créées pour exécuter les migrations, nettoyer le cache, et envoyer des rapports de statistiques.
Exemples de commandes :
	•	Exécuter les migrations : php bin/console app:run-migrations
	•	Nettoyer le cache : php bin/console app:clear-cache
	•	Envoyer les rapports statistiques : php bin/console app:send-reports

Démarrage

	1.	Lancer le serveur Symfony (en mode développement)
Utilisez la commande suivante pour lancer le serveur local :

symfony server:start

L’application sera accessible à https://localhost:8000.

	2.	Accéder à l’interface
Naviguez vers https://localhost:8000 dans votre navigateur pour accéder à l’application.

Tâches Administratives

Des commandes Symfony sont disponibles pour automatiser les tâches administratives :

	•	Exécuter les migrations : php bin/console app:run-migrations
	•	Nettoyer le cache : php bin/console app:clear-cache
	•	Envoyer des rapports statistiques : php bin/console app:send-reports

Support et Dépannage

	•	Logs : Les erreurs et événements sont loggés selon l’environnement. Vérifiez les fichiers de logs pour les erreurs spécifiques.
	•	Documentation : Pour plus d’informations, consultez la documentation Symfony.

En cas de problème, ouvrez une issue sur le dépôt GitHub.

Auteurs

Développé par [Votre Nom].

Licence

Ce projet est sous licence MIT. Consultez le fichier LICENSE pour plus de détails.

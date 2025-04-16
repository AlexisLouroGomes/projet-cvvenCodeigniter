# Projet CVVEN – Installation avec Docker 🐳

## ⚙️ Prérequis
- Docker Desktop installé et lancé
- PHP installé localement (pour exécuter `php spark serve`)
- Terminal (CMD, PowerShell ou VSCode)

---

## 🧱 Installation et démarrage du projet

1. **Cloner le projet**
```bash
git clone https://github.com/ton-utilisateur/projet-cvvenCodeigniter.git
cd projet-cvvenCodeigniter
```

2. **Renommer le fichier `.env`**
```bash
cp env .env
```

3. **Lancer les services Docker (MariaDB + phpMyAdmin)**
```bash
docker-compose up -d
```

4. **Démarrer le serveur local CodeIgniter**
```bash
php spark serve
```

---

## 🔗 Accès à l'application

- Application : [http://localhost:8080](http://localhost:8080)
- phpMyAdmin : [http://localhost:8081](http://localhost:8081)
  - Serveur : `db`
  - Utilisateur : `user`
  - Mot de passe : `user`

---

## 💾 Base de données

- Nom : `cvven`
- Importation :
  1. Ouvrir phpMyAdmin
  2. Se connecter avec les identifiants ci-dessus
  3. Sélectionner la base `cvven`
  4. Importer le fichier `database/schema.sql` fourni

---

## 🔐 Accès administrateur

- Email : `admin@cvven.com`
- Mot de passe : `admin123`

---

## 🛑 Arrêter le projet

1. **Arrêter le serveur PHP**
```bash
Ctrl + C
```

2. **Arrêter les conteneurs Docker**
```bash
docker-compose down
```

---

## 🧽 Réinitialiser la base de données (optionnel)
```bash
docker volume rm projet-cvvencodeigniter_db_data
```

---

# CodeIgniter 4 Framework

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds the distributable version of the framework.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

You can read the [user guide](https://codeigniter.com/user_guide/)
corresponding to the latest version of the framework.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Contributing

We welcome contributions from the community.

Please read the [*Contributing to CodeIgniter*](https://github.com/codeigniter4/CodeIgniter4/blob/develop/CONTRIBUTING.md) section in the development repository.

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> - The end of life date for PHP 8.1 will be December 31, 2025.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library


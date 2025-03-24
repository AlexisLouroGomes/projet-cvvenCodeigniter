<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? esc($title) : 'Réservation Vacances' ?></title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <?php if (isset($pageCss)) : ?>
        <link rel="stylesheet" href="<?= base_url('css/' . $pageCss) ?>">
    <?php endif; ?>
</head>
<body>
    <header>
        <h1 style="color: #00b894;">Réservation Vacances</h1>
        <nav>
            <ul>
                <li><a href="<?= site_url('/') ?>">Accueil</a></li>
                <li><a href="<?= site_url('logements') ?>">Nos Logements</a></li>
                <li><a href="<?= site_url('compte') ?>">Mon Compte</a></li>
                <li><a href="<?= site_url('logout') ?>">Se déconnecter</a></li>
            </ul>
        </nav>
    </header>

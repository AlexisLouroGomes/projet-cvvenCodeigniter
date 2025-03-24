<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/register.css') ?>">
</head>
<body>
    <section class="register-container">
        <h2>Inscription</h2>

        <?php if (isset($validation)) : ?>
            <div style="color: red;">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('register/submit') ?>" method="POST">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">S'inscrire</button>
        </form>

        <p>Déjà un compte ? <a href="<?= site_url('login') ?>">Connectez-vous ici</a>.</p>
    </section>
</body>
</html>

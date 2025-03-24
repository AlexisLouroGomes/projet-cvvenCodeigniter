<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nos Logements</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/logements.css') ?>">
</head>
<body>
    <header>
        <h1>Nos Logements de Luxe</h1>
    </header>

    <section class="logements-container">
        <?php foreach ($logements as $logement): ?>
            <div class="logement">
                <img src="<?= base_url('images/' . $logement['image']) ?>" alt="<?= esc($logement['nom']) ?>">
                <h2><?= esc($logement['nom']) ?></h2>
                <p><?= esc($logement['description']) ?></p>
                <p class="prix">Prix : <?= esc($logement['prix_par_nuit']) ?>€/nuit</p>
            </div>
        <?php endforeach; ?>
    </section>
    
    <section class="reservation-section">
        <h2>Réservez votre séjour</h2>
        <p>Profitez de nos logements de luxe en effectuant une réservation dès maintenant.</p>
        <a href="<?= site_url('reservation') ?>"><button class="btn-reserver">Réserver</button></a>
    </section>

    <section style="text-align: center; margin-top: 40px;">
        <a href="<?= site_url('/') ?>">
            <button class="btn-retour">← Retour à l'accueil</button>
        </a>
    </section>
</body>
</html>

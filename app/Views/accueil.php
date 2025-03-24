<?php
$title = 'Accueil - Réservation Vacances';
$pageCss = 'index.css';
echo view('partials/header', compact('title', 'pageCss'));
?>

<section class="banner">
    <h2>Bienvenue sur notre plateforme de réservation</h2>
    <p>Trouvez la maison ou l’appartement idéal pour vos vacances !</p>
    <a href="<?= site_url('logements') ?>" class="btn">Voir les logements</a>
</section>

<section class="presentation">
    <h2>Pourquoi réserver avec nous ?</h2>
    <p>Nous proposons des logements de qualité, vérifiés et adaptés à tous les budgets.</p>
</section>

<?php echo view('partials/footer'); ?>

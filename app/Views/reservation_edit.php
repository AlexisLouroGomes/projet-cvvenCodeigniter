<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Réservation</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <h2>Modifier la réservation</h2>

    <form action="<?= site_url('reservation/update/' . $reservation['id']) ?>" method="POST">
        <label for="logement">Logement :</label>
        <select id="logement" name="logement" required>
            <?php foreach ($logements as $log): ?>
                <option value="<?= $log['id'] ?>" data-prix="<?= $log['prix_par_nuit'] ?>"
                    <?= $log['id'] == $reservation['logement_id'] ? 'selected' : '' ?>>
                    <?= $log['nom'] ?> (<?= $log['prix_par_nuit'] ?>€/nuit)
                </option>
            <?php endforeach; ?>
        </select>

        <input type="hidden" name="prix_par_nuit" id="prix_par_nuit" value="<?= $logements[0]['prix_par_nuit'] ?>">

        <label for="nom">Nom :</label>
        <input type="text" name="nom" value="<?= esc($reservation['nom']) ?>" required>

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" value="<?= esc($reservation['prenom']) ?>" required>

        <label for="date_debut">Date de début :</label>
        <input type="date" name="date_debut" id="date_debut" value="<?= $reservation['date_debut'] ?>" required>

        <label for="date_fin">Date de fin :</label>
        <input type="date" name="date_fin" id="date_fin" value="<?= $reservation['date_fin'] ?>" required>

        <p id="prix_total">Prix total : <?= $reservation['prix_total'] ?>€</p>

        <button type="submit">Mettre à jour</button>
    </form>

    <script>
        const logementSelect = document.getElementById('logement');
        const prixInput = document.getElementById('prix_par_nuit');
        const dateDebut = document.getElementById('date_debut');
        const dateFin = document.getElementById('date_fin');
        const prixAffichage = document.getElementById('prix_total');

        function updatePrix() {
            const prix = parseFloat(logementSelect.selectedOptions[0].dataset.prix);
            prixInput.value = prix;
            const d1 = new Date(dateDebut.value);
            const d2 = new Date(dateFin.value);
            const diff = (d2 - d1) / (1000 * 60 * 60 * 24);
            if (diff > 0) {
                prixAffichage.textContent = "Prix total : " + (prix * diff) + "€";
            } else {
                prixAffichage.textContent = "Prix total : 0€";
            }
        }

        logementSelect.addEventListener('change', updatePrix);
        dateDebut.addEventListener('change', updatePrix);
        dateFin.addEventListener('change', updatePrix);
    </script>
</body>
</html>

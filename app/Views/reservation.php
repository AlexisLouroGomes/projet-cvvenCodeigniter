<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réservation</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/reservation.css') ?>">
</head>
<body>
    <section class="reservation-container">
        <h2>Formulaire de Réservation</h2>
        <form action="<?= site_url('reservation/submit') ?>" method="POST">
            <label for="logement">Choisissez un logement :</label>
            <select id="logement" name="logement" required></select>
            <input type="hidden" name="prix_par_nuit" id="prix_par_nuit">

            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="date_debut">Date de début :</label>
            <input type="date" id="date_debut" name="date_debut" required>

            <label for="date_fin">Date de fin :</label>
            <input type="date" id="date_fin" name="date_fin" required>

            <p id="prix_total">Prix total : 0€</p>

            <button type="submit">Valider la réservation</button>
        </form>

        <div style="text-align: center; margin-top: 30px;">
            <a href="<?= site_url('/') ?>">
                <button class="btn-retour">← Retour à l'accueil</button>
            </a>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetch("<?= site_url('api/logements') ?>")
                .then(response => response.json())
                .then(data => {
                    const select = document.getElementById("logement");
                    select.innerHTML = '';
                    data.forEach(logement => {
                        let option = document.createElement("option");
                        option.value = logement.id;
                        option.textContent = logement.nom + " - " + logement.prix_par_nuit + "€/nuit";
                        option.dataset.prix = logement.prix_par_nuit;
                        select.appendChild(option);
                    });
                    updatePrix();
                });

            const dateDebut = document.getElementById("date_debut");
            const dateFin = document.getElementById("date_fin");
            const selectLogement = document.getElementById("logement");
            const prixTotalElement = document.getElementById("prix_total");
            const prixInput = document.getElementById("prix_par_nuit");

            function updatePrix() {
                const debut = new Date(dateDebut.value);
                const fin = new Date(dateFin.value);
                const differenceJours = (fin - debut) / (1000 * 60 * 60 * 24);
                const prixParNuit = parseFloat(selectLogement.options[selectLogement.selectedIndex]?.dataset.prix || 0);
                prixInput.value = prixParNuit;

                if (differenceJours > 0) {
                    prixTotalElement.textContent = "Prix total : " + (differenceJours * prixParNuit) + "€";
                } else {
                    prixTotalElement.textContent = "Prix total : 0€";
                }
            }

            dateDebut.addEventListener("change", updatePrix);
            dateFin.addEventListener("change", updatePrix);
            selectLogement.addEventListener("change", updatePrix);
        });
    </script>
</body>
</html>

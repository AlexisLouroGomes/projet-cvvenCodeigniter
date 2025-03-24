<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Compte</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/compte.css') ?>">
</head>
<body>
    <section class="compte-container">
        <h2>Mon Compte</h2>

        <div class="compte-info">
            <p><strong>Nom d'utilisateur :</strong> <?= esc($user['username']) ?></p>
            <p><strong>Email :</strong> <?= esc($user['email']) ?></p>
            <p><strong>Mot de passe :</strong> ••••••••</p>
        </div>

        <div class="compte-reservations">
            <h3>Mes Réservations</h3>
            <ul>
                <?php if (count($reservations) > 0): ?>
                    <?php foreach ($reservations as $res): ?>
                        <li>
                            <?= esc($res['nom']) ?> du <?= $res['date_debut'] ?> au <?= $res['date_fin'] ?> - <?= $res['prix_total'] ?>€
                            <a href="<?= site_url('reservation/edit/' . $res['id']) ?>">✏️ Modifier</a>
                            <a href="<?= site_url('reservation/delete/' . $res['id']) ?>" onclick="return confirm('Supprimer ?')">🗑 Supprimer</a>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Aucune réservation pour le moment.</li>
                <?php endif; ?>
            </ul>
        </div>

        <?php if (!empty($admin_data)): ?>
            <div class="compte-admin" style="overflow-x: auto;">
                <h3>Gestion des Données (Admin)</h3>
                <?php foreach ($admin_data as $table => $rows): ?>
                    <h4>Table : <?= esc($table) ?></h4>
                    <button onclick="deleteAll('<?= $table ?>')">🧹 Supprimer toutes les données</button>
                    <div style="overflow-x:auto;">
                        <table border="1">
                            <tr>
                                <?php if (count($rows) > 0): ?>
                                    <?php foreach (array_keys($rows[0]) as $col): ?>
                                        <th><?= esc($col) ?></th>
                                    <?php endforeach; ?>
                                    <th>Action</th>
                                <?php else: ?>
                                    <td colspan="100%">Aucune donnée trouvée.</td>
                                <?php endif; ?>
                            </tr>
                            <?php foreach ($rows as $row): ?>
                                <tr>
                                    <?php foreach ($row as $val): ?>
                                        <td><?= esc($val) ?></td>
                                    <?php endforeach; ?>
                                    <td>
                                        <form action="<?= site_url('admin/delete') ?>" method="post" style="display:inline;">
                                            <input type="hidden" name="table" value="<?= esc($table) ?>">
                                            <input type="hidden" name="id" value="<?= esc($row['id']) ?>">
                                            <button type="submit">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <p><a href="<?= site_url('logout') ?>">🚪 Se déconnecter</a></p>

        <p style="text-align: center; margin-top: 40px;">
            <a href="<?= site_url('/') ?>">
                <button class="btn-retour">← Retour à l'accueil</button>
            </a>
        </p>
    </section>

    <script>
        function deleteAll(tableName) {
            if (confirm(`Supprimer toutes les données de la table ${tableName} ?`)) {
                fetch("<?= site_url('admin/delete_all') ?>", {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify({ table: tableName })
                }).then(response => response.json())
                  .then(data => {
                    alert(data.message);
                    location.reload();
                  }).catch(err => alert("Erreur : " + err));
            }
        }
    </script>
</body>
</html>

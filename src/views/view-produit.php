<h1>Liste des produits</h1>
<table class="table table-striped table-bordered">
    <tr>
        <th>Titre</th>
        <th>Genre</th>
        <th>Auteur</th>
        <th>Editeur</th>
        <th>Prix</th>
        <th>Prix</th>
        <th>panier</th>
    </tr>
    <?php foreach ($catalogue as $livre): ?>
        <tr>
            <td><?= $livre['titre'] ?></td>
            <td><?= $livre['genre_id'] ?></td>
            <td><?= $livre['nom'] ?></td>
            <td><?= $livre['date_achat'] ?></td>
            <td><?= $livre['prenom'] ?></td>
            <td class="alignRight"><?= currency_format($livre['prix']) ?></td>
            <td><a href="/ajout-panier?id=<?= $livre['id'] ?>">
                    <i class="glyphicon glyphicon-shopping-cart"></i>
                </a>
            </td>
        </tr>

    </a>
<?php endforeach ?>
</table>



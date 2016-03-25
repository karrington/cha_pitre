<h1>Liste des produits <?= $nbTotal ?></h1>

<table class="table table-striped table-hover ">
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

<ul class="pagination">
    <?php
    for ($i = 1; $i <= $nbPages; $i++) {
        
        if($i == $pageActive){
            $active = "active";
        } else {
            $active ="";
        }
        
        
        $critere ="";
        if(!empty($recherche)){
            $critere ="&recherche=$recherche";
        }
        
        echo"<li class ='$active' ><a href='/produit?page=$i$critere'>$i</a></li>";
    }
    ?>
</ul>



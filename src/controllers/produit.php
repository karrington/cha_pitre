<?php

$catalogue = getCatalogue();
$nbTotalLivres = getNbLivres();
//calcul du nombre de page
$nbpages = (int) $nbTotalLivres / $nbLivresParPages;
//si la division entière possède un reste 
//on ajoute 1 au nombre de page 
if ($nbTotalLivres % $nbLivresParPages > 0) {
    $nbpages++;
}
$response = getResponse('view-produit', array(
    'catalogue' => $catalogue
        ));
echo $response;
?>
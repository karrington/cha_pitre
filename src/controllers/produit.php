<?php

//récupération du nombre de pages
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT);
if ($page == null) {
    $page = 1;
}
$catalogue = getCatalogue($page, $nbLivresParPages);
$nbTotalLivres = getNbLivres();
//calcul du nombre de page
$nbPages = (int) $nbTotalLivres / $nbLivresParPages;
//si la division entière possède un reste 
//on ajoute 1 au nombre de page 
if ($nbTotalLivres % $nbLivresParPages > 0) {
    $nbPages++;
}
$response = getResponse('view-produit', array(
    'catalogue' => $catalogue,
    'nbPages' => $nbPages,
    'nbTotal' => $nbTotalLivres,
    'pageActive' => $page
        ));
echo $response;
?>
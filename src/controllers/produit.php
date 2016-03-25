<?php

$catalogue = getCatalogue();
$nbTotalLivres = getNbLivres();
//calcul du nombre de page
$nbpages =(int)$nbTotalLivres/$nbLivresParPages;
//si
if($nbTotalLivres%$nbLivresParPages >0){
    $nbpages++;
}
$response = getResponse('view-produit', array(
    'catalogue' =>$catalogue

));
echo $response;
?>
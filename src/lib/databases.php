<?php

function getPDO() {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
    $pdo = new PDO($dsn, DB_USER, DB_PASS, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
    return $pdo;
}

function checkLogin($login, $password) {
    $pdo = getPDO();
    $sql = "SELECT EXISTS (SELECT * FROM clients WHERE email=? and password=?) as ok";
    $stm = $pdo->prepare($sql);
    $stm->execute(array($login, sha1($password)));
    $rs = $stm->fetch();
    return $rs['ok'];
}

function getCatalogue($page = 1, $nbLivreParPage = null, $recherche = null) {
    $pdo = getPDO();
    $condition = getConditionLivre($recherche);
    if ($nbLivreParPage == null) {
        $sql = "SELECT * FROM catalogues $condition";
    } else {
        $offset = ($page - 1) * $nbLivreParPage;
        $sql = "SELECT * FROM catalogues $condition LIMIT $nbLivreParPage OFFSET $offset";
    }

    $rs = $pdo->query($sql);
    return $rs;
}

function getConditionLivre($recherche) {

    $condition = "";
    if ($recherche != null) {
        $recherche = "%$recherche%";
        $condition = "WHERE  
        titre LIKE '$recherche' 
        OR nom LIKE '$recherche'
        OR nom_auteur LIKE '$recherche'";
    }
    return $condition;
}

//affichage du nombre total de livres dans le catalogue 
function getNbLivres($recherche = null) {
    $pdo = getPDO();
    $condition = getConditionLivre($recherche);
    $sql = "SELECT COUNT(*) as nb FROM catalogues $condition";
    $rs = $pdo->query($sql)->fetch();
    return $rs ['nb'];
}

function getClientInfo($login) {
    $pdo = getPDO();
    $sql = "SELECT * FROM client WHERE login = ?";
    $stm = $pdo->prepare($sql);
    $stm->execute(array($login));
    $rs = $stm->fetch();
    return $rs['id'];
}

function checkProduitPanier($id) {
    $pdo = getPDO();
    $sql = "SELECT EXISTS(SELECT * FROM panier WHERE produit_id = ?)as ok";
    $stmt = $pdo->prepare($sql);
    $stml->execute(array(
        $id,
    ));
    $rs = $stmt->fetch();
    return $rs['ok'];
}

function ajoutQuantitePanier($idProduit, $idClient, $qt = 1) {

    $pdo = getPDO();
    $sql = "UPDATE panier SET"
            . "produit_id = :produitId, "
            . "client_id = :clientId, "
            . "qt = (qt+:qt)"
            . "WHERE produit_id = :produitId AND "
            . "client_id = :clientId";
    $stm = $pdo->prepare($sql);
    $stm->execute(array(
        'produitId' => $idProduit,
        'clientId' => $idClient,
        'qt' => $qt
    ));
}

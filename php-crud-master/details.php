<?php
// On démarre une session
/* session_start(); */

// Est-ce que l'id existe et n'est pas vide dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('connect.php');

    // On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `liste` WHERE `id` = :id;';

    // On prépare la requête
    $query = $db->prepare($sql);

    // On "accroche" les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On récupère le produit
    $produit = $query->fetch();

    // On vérifie si le produit existe
    if(!$produit){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: index.php');
    }
}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: index.php');
}
?>
<?php require_once('../header.php');?>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Détails du produit <?= $produit['produit'] ?></h1>
                <p>ID : <?= $produit['id'] ?></p>
                <p>Produit : <?= $produit['produit'] ?></p>
                <p>Prix : <?= $produit['prix'] ?></p>
                <p>Nombre : <?= $produit['nombre'] ?></p>
                <p><a href="index.php">Retour</a> <a href="edit.php?id=<?= $produit['id'] ?>">Modifier</a></p>
            </section>
        </div>
    </main>
<?php require_once('../footer.php');?>
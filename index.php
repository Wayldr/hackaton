<?php
// On démarre une session
/* session_start(); */

// On inclut la connexion à la base
require_once('connect.php');

$sql = 'SELECT id,name,question,reponse FROM themes,la_faq WHERE la_faq.id_themes=themes.id_themes';

// On prépare la requête
$query = $db->prepare($sql);

// On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);
$titre="";
require_once('close.php');
?>
<?php require_once('header.php');?>


    <main class="container">
        <div class="row">
            <section class="col-12">
            <?php
            if (isAdmin()){ 
            ?>
                <a href="add.php" class="btn btn-primary">Ajouter un produit</a>
            <?php
            }
            ?>
            <?php
                    if(!empty($_SESSION['erreur'])){
                        echo '<div class="alert alert-danger" role="alert">
                                '. $_SESSION['erreur'].'
                            </div>';
                        $_SESSION['erreur'] = "";
                    }
                ?>
                <?php
                    if(!empty($_SESSION['message'])){
                        echo '<div class="alert alert-success" role="alert">
                                '. $_SESSION['message'].'
                            </div>';
                        $_SESSION['message'] = "";
                    }
                    ?>
                
                <div class="accordion" id="accordionExample">
                <?php foreach($result as $produit){
                    if($titre != $produit['name']){
                        ?><h2 class="text-center m-5"><?php echo $produit['name'];?></h2>
                        <?php
                        $titre = $produit['name'];
                    }else{
                ?> 
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $produit['id']?>" aria-expanded="true" aria-controls="collapseOne">
                            <strong><?php  echo $produit['question']?></strong>
                        </button>
                        </h2>
                        <div id="collapse<?php echo $produit['id']?>" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <?php echo $produit['reponse']?>
                            <?php
                                if (isAdmin()){ 
                            ?>
                            <a href="edit.php?id=<?php echo $produit['id']?>" class="btn btn-primary">Modifer</a>
                            <?php
                                }
                            ?>
                        </div>
                        </div>
                    </div>
                    <?php
                    }
                }
                ?>
                </div>
            </section>
            <a href="#top"><span class="btn btn-primary">Retourner en haut</span></a>
        </div>

        
        
    </main>
<?php require_once('footer.php');?>
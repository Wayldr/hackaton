<?php
// On démarre une session
/* session_start(); */
require_once('connect.php');
$sqlthemes = 'SELECT id_themes,name FROM themes';

// On prépare la requête
$querythemes = $db->prepare($sqlthemes);

// On exécute la requête
$querythemes->execute();

// On stocke le résultat dans un tableau associatif
$resultat = $querythemes->fetchAll(PDO::FETCH_ASSOC);

if($_GET){
    if(isset($_GET['question']) && !empty($_GET['question'])
    && isset($_GET['reponse']) && !empty($_GET['reponse'])
    && isset($_GET['id_themes']) && !empty($_GET['id_themes'])){
        // On inclut la connexion à la base
        require_once('connect.php');

        // On nettoie les données envoyées
        $question = strip_tags($_GET['question']);
        $reponse = strip_tags($_GET['reponse']);
        $id_themes = strip_tags($_GET['id_themes']);


       

        $sql = 'INSERT INTO `la_faq` (`question`, `reponse`, `id_themes`) VALUES (:question, :reponse, :id_themes);';

        $query = $db->prepare($sql);

        $query->bindValue(':question', $question, PDO::PARAM_STR);
        $query->bindValue(':reponse', $reponse, PDO::PARAM_STR);
        $query->bindValue(':id_themes', $id_themes, PDO::PARAM_INT);

        $query->execute();

        $_SESSION['message'] = "question ajouté";
        require_once('close.php');

        header('Location: index.php');
    }
}

?>
<?php require_once('header.php');?>
<script>
      tinymce.init({
        selector: '#reponse'
      });
    </script>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <?php
                    if(!empty($_SESSION['erreur'])){
                        echo '<div class="alert alert-danger" role="alert">
                                '. $_SESSION['erreur'].'
                            </div>';
                        $_SESSION['erreur'] = "";
                    }
                ?>
                <h1>Ajouter un question</h1>
                <form method="get">
                    <div class="form-group">
                        <label for="id_themes">Themes</label>
                        <select class="form-select" id="inputGroupSelect01" name="id_themes">
                        <?php 
                        foreach($resultat as $produit){
                            if($produit['id_themes']==0){
                        ?>
                            <option selected value="<?php echo $produit['id_themes']?>" name="id_themes"><?php echo $produit['name'];?></option>
                            <?php
                            }else{
                        ?>
                            <option value="<?php echo $produit['id_themes']?>" name="id_themes"><?php echo $produit['name'];?></option>
                            
                        <?php
                            }
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="question">question</label>
                        <input type="text" id="question" name="question" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="reponse">reponse</label>
                        <input type="text" id="reponse" name="reponse" class="form-control">

                    </div>
                    <button class="btn btn-primary">Envoyer</button>
                </form>
            </section>
        </div>
    </main>
<?php require_once('footer.php');?>
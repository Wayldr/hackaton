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
    if(isset($_GET['id']) && !empty($_GET['id'])
    && isset($_GET['question']) && !empty($_GET['question'])
    && isset($_GET['reponse']) && !empty($_GET['reponse'])
    && isset($_GET['id_themes']) && !empty($_GET['id_themes'])){
        // On inclut la connexion à la base
        require_once('connect.php');

        // On nettoie les données envoyées
        $id = strip_tags($_GET['id']);
        $question = strip_tags($_GET['question']);
        $reponse = strip_tags($_GET['reponse']);
        $id_themes = strip_tags($_GET['id_themes']);

        $sql = 'UPDATE `la_faq` SET `question`=:question, `reponse`=:reponse, `id_themes`=:id_themes WHERE `id`=:id;';

        $query = $db->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':question', $question, PDO::PARAM_STR);
        $query->bindValue(':reponse', $reponse, PDO::PARAM_STR);
        $query->bindValue(':id_themes', $id_themes, PDO::PARAM_INT);

        $query->execute();

        $_SESSION['message'] = "question modifié";
        require_once('close.php');

        header('Location: index.php');
    }else{
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}

// Est-ce que l'id existe et n'est pas vide dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('connect.php');

    // On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `la_faq` WHERE `id` = :id;';

    // On prépare la requête
    $query = $db->prepare($sql);

    // On "accroche" les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On récupère le question
    $result = $query->fetch();

    // On vérifie si le question existe
    if(!$result){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: index.php');
    }
}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: index.php');
}

?>
<?php require_once('header.php');?>
<script>
      tinymce.init({
        selector: '#mytextarea'
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
                <h1>Modifier un question</h1>
                <form method="get">
                    <div class="form-group">
                        <label for="id_themes">Themes</label>
                        <select class="form-select" id="inputGroupSelect01" name="id_themes">
                        <?php 
                        foreach($resultat as $question){
                            if($question['id_themes']==0){
                        ?>
                            <option selected value="<?php echo $question['id_themes']?>" name="id_themes"><?php echo $question['name'];?></option>
                            <?php
                            }else{
                        ?>
                            <option value="<?php echo $question['id_themes']?>" name="id_themes"><?php echo $question['name'];?></option>
                            
                        <?php
                            }
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="question">question</label>
                        <input type="text" id="question" name="question" class="form-control" value="<?php echo $result['question']?>">
                    </div>
                    <div class="form-group">
                        <label for="reponse">reponse</label>
                        <input type="text" id="mytextarea" name="reponse" class="form-control" value="<?php echo $result['reponse']?>">

                    </div>
                    <input type="hidden" name="id" value="<?php echo $result['id']?>">
                    <button class="btn btn-primary">Envoyer</button>
                </form>
            </section>
        </div>
    </main>
<?php require_once('footer.php');?>
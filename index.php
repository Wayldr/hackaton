<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <title>FAQ</title>
</head>
<body>
    <?php require_once('session_admin.php');?>
    <header>
        <div class="container">
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <?php
                        if (isAdmin()){ //test si l'admin est connecté
                            echo '<button class="btn btn-outline-danger" type="submit"><a href="deconnection.php">Déconnection</a></button>';
                        } else {
                            echo '<button class="btn btn-outline-success" type="submit"><a href="indentification.php">Administrateur</a></button>';
                        }
                    ?>
                    <button class="btn btn-outline-success" type="submit"><a href="indentification.php">Administrateur</a></button>
                    <!--
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
-->
                </div>
            </nav>
        </div>
        <div class="pdf">
            <a title="cv" href="img/CV_F.DOIDI.pdf" target="_blank">
                <button class="btn btn-primary p-3" type="button">Download FAQ</button>
            </a>
        </div>

    </header>
    <main>

    </main>

    <footer>
        
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
</body>
</html>
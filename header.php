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

    <script src="https://cdn.tiny.cloud/1/x7lswj8b50mc3dbzptnumam8bllzn64ksxehxz75h6argua8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <title>FAQ</title>
</head>
<body>
    <?php session_start();
    require_once('session_admin.php');
    ?>
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
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#1">Le Cadre Sanitaire</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#2">Tracer Tester Protéger</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#3">Apprentissage</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#4">Activités Scolaire</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#5">Activités Scolaire</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container">
            <a title="cv" href="img/faq.pdf" target="_blank">
                <button class="btn btn-primary p-3" type="button">Download FAQ</button>
            </a>
            <p>dernière mise à jour le 17 mars 2022</p>
        </div>

    </header>
<?php
try{
    // Connexion à la base
    $db = new PDO('mysql:host=localhost;dbname=faq;charset=utf8', 'root', 'root');
    $db->exec('SET NAMES "UTF8"');
} catch (PDOException $e){
    echo 'Erreur : '. $e->getMessage();
    die();
}


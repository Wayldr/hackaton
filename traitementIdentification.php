<?php
session_start();
$login=$_POST ['login'];
$password=$_POST ['password'];
if (($login=="admin") && ($password=="admin")) {
    $_SESSION ['profil']="admin";
    header('location:index.php');
} else {
    echo "le compte n'existe pas".'
    <a href="indentification.php">essayer de nouveau</a>';
}
?>
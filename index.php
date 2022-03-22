<?php
session_start();
if (!isset($_SESSION["profil"])){
    return;
}
if ($_SESSION["profil"]!="admin") {
    return;
}
echo "hello"
?>

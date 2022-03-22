<?php
session_start();
function isAdmin(){
    if (!isset($_SESSION["profil"])){
        return false;
    }
    if ($_SESSION["profil"]!="admin"){
        return false;
    }
    return true;
}
?>



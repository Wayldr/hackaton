<?php
/* session_start(); */
function isAdmin(){
    if (!isset($_SESSION["profil"])){
        return false;
    }
    if ($_SESSION["profil"]!="admin"){
        return false;
    }
    return true;
}

//NOTICE D'UTILISATION 

/* Pour verifier si l'admin est connécté utliisé le test ci-dessous:

if (isAdmin()){ //test si l'admin est connecté
    
    //ce qu'il faut faire
} 

*/
?>



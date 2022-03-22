<?php
<<<<<<< HEAD
/* Tout ce qui se passe ici sera afficher sera afficher quelque soit le profil*/

session_start();
if (!isset($_SESSION["profil"])){
    return;
}
if ($_SESSION["profil"]!="admin") {
    return;
}
/* Tout ce qui se passe ici sera afficher uniquement si on est connecté en tant qu'admin
 */

=======
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

//NOTICE D'UTILISATION 

/* Pour verifier si l'admin est connécté utliisé le test ci-dessous:

if (isAdmin()){ //test si l'admin est connecté
    
    //ce qu'il faut faire
} 

*/
>>>>>>> a43a18181be3264af87f4e198111b0ae83e69d03
?>



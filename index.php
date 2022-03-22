<?php
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

?>



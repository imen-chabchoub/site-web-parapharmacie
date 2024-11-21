<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<?php
if(!empty($_POST)){
    echo "button clicked";
}else {
    echo "Erreur: Le formulaire n'a pas été soumis.";
}


?>
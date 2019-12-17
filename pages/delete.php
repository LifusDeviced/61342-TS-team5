<?php

    # Base de Dados
    include "../script/database.php";

    # Pega o id do grupo da url
    $groupId = $_GET["groupId"];

    # Pega o id do colecionador da url
    $collectorRegistration = $_GET["collectorRegistration"];
?>

<?php

    deleteCollectorInGroup($groupId, $collectorRegistration);
    
?>
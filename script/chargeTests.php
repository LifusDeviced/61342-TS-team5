<?php

# Testes de carga

# Base de dados
include "./database.php";

# Teste de adição de muitos usuários em um grupo
function chargeInsertCollectorsInGroup(string $groupId, string $collectorRegistration) {
    for ($i =1; $i <= 8000; $i++) {
        insertCollectorInGroup($groupId, $collectorRegistration, false, true);
    }
    echo selectCollectorsByGroup($groupId);
}

# Teste de remoção de muitos usuários de um grupo
function chargeDeleteCollectorsInGroup(string $groupId, string $collectorRegistration) {
    for ($i =1; $i <= 8000; $i++) {
        deleteCollectorInGroup($groupId, $collectorRegistration, false);
    }
    echo selectCollectorsByGroup($groupId);
}

?>

<?php
    #Executando testes
    chargeInsertCollectorsInGroup(1, 8);
?>
<br/>
<br/>
<?php
    chargeDeleteCollectorsInGroup(1, 8);
    # Tempo registrado: 4min 05sec 92mil
?>
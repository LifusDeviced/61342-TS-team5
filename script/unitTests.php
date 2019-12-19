<?php

# Testes unitários

# Base de dados
include "./database.php";

# Testa adição de colecionador a um grupo
function testInsertCollectorInGroup(string $groupId, string $collectorRegistration) {
    $olderGroup = selectCollectorsByGroup($groupId);
    insertCollectorInGroup($groupId, $collectorRegistration, false);
    $newGroup = selectCollectorsByGroup($groupId);
    if (count($newGroup) > count($olderGroup)) {
        echo "Valid test";
    } else {
        echo "Invalid test";
    }
}

# Testa exclusão de colecionador de um grupo
function testDeleteCollectorInGroup(string $groupId, string $collectorRegistration) {
    $olderGroup = selectCollectorsByGroup($groupId);
    deleteCollectorInGroup($groupId, $collectorRegistration, false);
    $newGroup = selectCollectorsByGroup($groupId);
    if (count($newGroup) < count($olderGroup)) {
        echo "Valid test";
    } else {
        echo "Invalid test";
    }
}

?>

<?php #Executando testes ?>

<?php testInsertCollectorInGroup(1, 8) ?>
<br/>
<?php #Tentando inserir o colecionador no grupo novamento ?>
<?php #Resultado esperado: Its already in the group ?>
<?php insertCollectorInGroup(1, 8) ?>
<br/>
<?php testDeleteCollectorInGroup(1, 8) ?>
<br/>
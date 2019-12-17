<?php

    # Fazendo a conexão
	$server = "localhost";
	$user = "root";
	$password = "";
	$db = "test";

    $connection = mysqli_connect($server, $user, $password, $db);
    
    if($connection->connect_error){
        echo "Desconectado! Erro: " . $connection->connect_error;
    }

    # Função para buscar os colecionadores
    function selectAllCollectors() {
        global $connection;
        $query = "SELECT * FROM Collectors";
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        if ($result) {
            return $result;
        } else {
            return [];
        }
    }

    # Função para buscar um colecionador de acordo com seu registro
    function selectCollector(string $registration) {
        global $connection;
        $query = "SELECT * FROM Collectors WHERE Registration = $registration";
        $result = mysqli_query($connection, $query);
        if ($result) {
            return mysqli_fetch_object($result);
        } else {
            echo "Collector Not Found";
        }
    }

    # Função para buscar os grupos
    function selectAllGroups() {
        global $connection;
        $query = "SELECT * FROM Groups";
        $result = mysqli_query($connection,$query) or die(mysqli_error($connection));
        if ($result) {
            return $result;
        } else {
            return [];
        }
    
    }

    # Função para buscar um grupo de acordo com sua identificação
    function selectGroup(string $id) {
        global $connection;
        $query = "SELECT * FROM Groups WHERE Id = $id";
        $result = mysqli_query($connection, $query);
        if ($result) {
            return mysqli_fetch_object($result);
        } else {
            echo "Group Not Found";
        }
    }

    # Função para listar colecionadores de um grupos
    function selectCollectorsByGroup(string $id) {
        global $connection;
        $query = "SELECT * FROM GroupCollectors WHERE GroupId = $id";
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        $collectors = [];
        while ($relation = mysqli_fetch_assoc($result)) {
            array_push($collectors, selectCollector($relation['CollectorRegistration']));
        }
        return $collectors;
    }

    # Função para adicionar um colecionador a um grupo
    function insertCollectorInGroup(string $groupId, string $collectorRegistration) {
        echo "Oi";
        global $connection;
        $query = "INSERT INTO GroupCollectors (GroupId, CollectorRegistration) VALUES
        ('$groupId', '$collectorRegistration')";
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        header("Location: http://localhost/61342-TS-team5/");
    }

    # Função para remover um colecionador de um grupo
    function deleteCollectorInGroup(string $groupId, string $collectorRegistration) {
        global $connection;
        $query = "DELETE FROM GroupCollectors WHERE GroupId=$groupId AND CollectorRegistration=$collectorRegistration";
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        header("Location: http://localhost/61342-TS-team5/");
    }

?>

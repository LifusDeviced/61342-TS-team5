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
        $collectors = mysqli_fetch_all($result);
        if ($collectors) {
            return $collectors;
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
        $groups = mysqli_fetch_all($result);
        if ($groups) {
            return $groups;
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

?>

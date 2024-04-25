<?php

function estabilishDatabaseConnection() {
    $hostname = "localhost";
    $dbname = "rapture_candidates";
    $usuario = "root";
    $senha = "root";
    
    try {
        $conexao = new PDO("mysql:host = $hostname;
                            dbname=$dbname",
                            $usuario,
                            $senha);
        return $conexao;
    }
    catch (PDOException $e) {
        die('Erro ao conectar com banco de dados: ' . $e->getMessage());
    }
}

estabilishdatabaseConnection();

?>
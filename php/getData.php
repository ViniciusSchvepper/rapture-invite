<?php

include "dbConnection.php";

getDataFromForm();

function getDataFromForm() {

    $listToReceiveData = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $full_name = $_POST["full-name"];
        $occupation = $_POST["occupation"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];
        
        array_push($listToReceiveData, $full_name, $occupation, $age, $gender);

        insertIntoDB($listToReceiveData);

        echo ("Dados enviados com sucesso");
    }
    else {
        header("Location: ../index.html");
    }
}

function insertIntoDB($listToReceiveData) {
    $connection = estabilishdatabaseConnection();
    $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $defineSchema = "USE rapture_invite";
    // $stmt = $connection -> prepare()

    $sqlInsertIntoTable = "INSERT INTO candidates(nome_completo,
                                        ocupacao,
                                        idade,
                                        gender)
                                        VALUES (?, ?, ?, ?)";
    $stmt = $connection -> prepare($sqlInsertIntoTable);
    $stmt->execute($listToReceiveData);
}
?>

<?php

include_once "config/config.php";

$idProfessor = isset($_POST["idProfessor"])?$_POST["idProfessor"]:0;
$nomeProfessor = isset($_POST["nomeProfessor"])?$_POST["nomeProfessor"]:"";
$dataNascimentoProfessor = isset($_POST["dataNascimentoProfessor"])?$_POST["dataNascimentoProfessor"]:"";
$telefoneProfessor = isset($_POST["telefoneProfessor"])?$_POST["telefoneProfessor"]:"";
$emailProfessor = isset($_POST["emailProfessor"])?$_POST["emailProfessor"]:"";
$idadeProfessor = isset($_POST["idadeProfessor"])?$_POST["idadeProfessor"]:"";


$acao = isset($_GET["acaoProfessor"])?$_GET["acaoProfessor"]:"";

if ($acao == "excluir"){
    try{
        $idProfessor = isset($_GET["idProfessor"])?$_GET["idProfessor"]:0;

        $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);
        $query = "DELETE FROM professor WHERE idProfessor = :idProfessor";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":idProfessor",$idProfessor);

        if($stmt->execute()){
            header("location: home.php");
        }else{
            echo "Erro";
        }

    }catch(PDOException $e){
        print("Erro ao conectar com o banco de dados . . . <br>".$e->getMessage());
        die();
    }
}else{

if($nomeProfessor != "" && $emailProfessor != "" && $idadeProfessor != ""){
    try{
        $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);

        if($idProfessor > 0){
            $query = "UPDATE professor SET nomeProfessor = :nomeProfessor, emailProfessor = :emailProfessor, idadeProfessor = :idadeProfessor , dataNascimentoProfessor = :dataNascimentoProfessor, telefoneProfessor = :telefoneProfessor WHERE idProfessor = :idProfessor";
        }else{
            $query = "INSERT INTO professor (nomeProfessor, emailProfessor, idadeProfessor, dataNascimentoProfessor, telefoneProfessor) VALUES(:nomeProfessor, :emailProfessor, :idadeProfessor, :dataNascimentoProfessor, :telefoneProfessor)";
        }

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(":nomeProfessor",$nomeProfessor);
        $stmt->bindValue(":emailProfessor",$emailProfessor);
        $stmt->bindValue(":idadeProfessor",$idadeProfessor);
        $stmt->bindValue(":dataNascimentoProfessor",$dataNascimentoProfessor);
        $stmt->bindValue(":telefoneProfessor", $telefoneProfessor);
        if($idProfessor > 0){
            $stmt->bindValue(":idProfessor",$idProfessor);
        }

        if ($stmt->execute()){
            header("location: home.php");
        }

    }catch(PDOException $e){
        print("Erro ao conectar com o banco de dados . . . <br>".$e->getMessage());
        die();
    }
}

}
?>
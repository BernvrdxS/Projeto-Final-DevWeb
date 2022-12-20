<?php

include_once "config/config.php";

$idAluno = isset($_POST["idAluno"])?$_POST["idAluno"]:0;
$nomeAluno = isset($_POST["nomeAluno"])?$_POST["nomeAluno"]:"";
$dataNascimentoAluno = isset($_POST["dataNascimentoAluno"])?$_POST["dataNascimentoAluno"]:"";
$telefoneAluno = isset($_POST["telefoneAluno"])?$_POST["telefoneAluno"]:"";
$emailAluno = isset($_POST["emailAluno"])?$_POST["emailAluno"]:"";
$idadeAluno = isset($_POST["idadeAluno"])?$_POST["idadeAluno"]:"";
$materiaAluno = isset($_POST["materiaAluno"])?$_POST["materiaAluno"]:"";
$nomeProfessor = isset($_POST["nomeProfessor"])?$_POST["nomeProfessor"]:"";


$acao = isset($_GET["acaoAluno"])?$_GET["acaoAluno"]:"";

if ($acao == "excluir"){
    try{
        $idAluno = isset($_GET["idAluno"])?$_GET["idAluno"]:0;

        $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);
        $query = "DELETE FROM aluno WHERE idAluno = :idAluno";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":idAluno",$idAluno);

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

if($nomeAluno != "" && $emailAluno != "" && $idadeAluno != ""){
    try{
        $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);

        if($idAluno > 0){
            $query = "UPDATE aluno SET nomeAluno = :nomeAluno, emailAluno = :emailAluno, idadeAluno = :idadeAluno , dataNascimentoAluno = :dataNascimentoAluno, telefoneAluno = :telefoneAluno, materiaAluno = :materiaAluno, nomeProfessor = :nomeProfessor WHERE idAluno = :idAluno";
        }else{
            $query = "INSERT INTO aluno (nomeAluno, emailAluno, idadeAluno, dataNascimentoAluno, telefoneAluno, materiaAluno, nomeProfessor) VALUES(:nomeAluno, :emailAluno, :idadeAluno, :dataNascimentoAluno, :telefoneAluno, :materiaAluno, :nomeProfessor)";
        }

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(":nomeAluno",$nomeAluno);
        $stmt->bindValue(":emailAluno",$emailAluno);
        $stmt->bindValue(":idadeAluno",$idadeAluno);
        $stmt->bindValue(":dataNascimentoAluno",$dataNascimentoAluno);
        $stmt->bindValue(":telefoneAluno", $telefoneAluno);
        $stmt->bindValue(":materiaAluno", $materiaAluno);        
        $stmt->bindValue(":nomeProfessor", $nomeProfessor);

        if($idAluno > 0){
            $stmt->bindValue(":idAluno",$idAluno);
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
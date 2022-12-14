<script src="scriptAluno.js"></script>

<!DOCTYPE html>
<?php
$acao = isset($_GET["acaoAluno"]) ? $_GET["acaoAluno"] : "";
$id = isset($_GET["idAluno"]) ? $_GET["idAluno"] : "";

if ($acao == "editar") {
    try {
        include_once "config/config.php";
        $conexao = new PDO(MYSQL_DSN, DB_USER, DB_PASSWORD);

        $query = "SELECT * FROM aluno WHERE idAluno = :id";

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(':id', $id);

        $stmt->execute();
        $Aluno = $stmt->fetch();
    } catch (PDOException $e) {
        print("Erro ao conectar com o banco de dados . . . <bre>" . $e->getMessage());
        die();
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body>

    <!--Salvar cada informação em um banco de dados-->

    <h1 class="display-4">Cadastro</h1>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="cadastrarAluno.php">Cadastro de Alunos</a>
        </li>
    </ul>

    <br>
    <div class="container-fluid">
        <form action="acaoAluno.php" id="formulario" method="post" name="formulario">
            <p>Dados do Aluno</p>
            <div class="form-row">
                <div class="col-md-6">
                    <input readonly class="form-control-plaintext" type="text" id="idAluno" name="idAluno" value=<?php if (isset($Aluno)) echo $Aluno['idAluno']; else echo 0; ?>>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Nome Completo" name="nomeAluno" required value=<?= isset($Aluno) ? $Aluno['nomeAluno'] : '' ?>>
                    <span class="error"></span>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <input type="number" class="form-control" placeholder="Telefone" name="telefoneAluno" required value=<?php if (isset($Aluno)) echo $Aluno['telefoneAluno'] ?>>
                    <span class="error"></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email do Aluno" name="emailAluno" value=<?= isset($Aluno) ? $Aluno['emailAluno'] : '' ?>>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Matéria do aluno" name="materiaAluno" value=<?= isset($Aluno) ? $Aluno['materiaAluno'] : '' ?>>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="date" class="form-control" name="dataNascimentoAluno" id="dataNascimentoAluno" value="" required onchange="validate()" value=<?= isset($Aluno) ? $Aluno['dataNascimentoAluno'] : '' ?>>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="idadeAluno" id="idadeAluno" placeholder="Idade do Aluno" readonly>
                </div>
            </div>
            <br>
            <div>
                <button class=" btn btn-primary" type="submit" name="acao" value="salvar">Salvar</button>
                <input class="btn btn-cancel" type="reset" name="cancelar" value="Cancelar" onclick='window.location.href="home.php"'>
            </div>
        </form>
    </div>
</body>

</html>
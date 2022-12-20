<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <title>Lista de Alunos</title>
    <script src="scriptListaProfessor.js"></script>
</head>
<body>
    <nav>
        <!-- menu -->
        <ul class="menu">
            <li id="cadastrar" class="itemenu"><a href="cadastrarProfessor.php">Cadastrar novo professor</a></li>
            <li id="cadastrar" class="itemenu"><a href="cadastrarAluno.php">Cadastrar novo aluno</a></li>
            <li id="cadastrar" class="itemenu"><a href="listaProfessores.php">Lista de professores</a></li>
            <li id="cadastrar" class="itemenu"><a href="listaAlunos.php">Lista de alunos</a></li>
        </ul>
    </nav>
    <form action="GET" id="pesquisa">
        <div class="col">
            <input type="text" class="form-control" placeholder="Pesquisar..." id="busca">
            <input class="btn btn-primary" type="submit" name="pesquisa" value="Pesquisar">
        </div>
    </form>
    <table class="table table-striped table-hover">
    <div class='row'>
                <!-- aqui montamos a tabela com os dados vindo do banco -->
                <table class='table table-striped table-hover'>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Aluno</th>
                            <th>Telefone</th>
                            <th>Email</th>
                            <th>Idade</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider" id='corpo'>
                    
                    </tbody>      
    </table>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <title>Login</title>
</head>
</style>

<body class='container'>
    <div class='row'>
        <div class='col'>
            <h3>Login</h3>
            <div>
                <form class="form" action="acaologin.php" method="POST">
                    <label for="user"></label>
                    <input class="form-control" type="text" name='user' id='user' placeholder="Usuário">
                    <label for="senha"></label>
                    <input class="form-control" type="password" name='senha' id='senha' placeholder="Senha">
                    <br>
                    <button type="submit" class="btn btn-light">Logar</button>
                </form>
            </div>
        </div>
    </div>

</html>
<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD PHP</title>
</head>

<body>
    <h3>Login</h3>               
    <?php
        if (isset($_SESSION['falha_aut'])) {
            header('Location: ../cadastros/usuarios/cadastro.php');
        }
    ?>          
    <div class="box">
        <form action="conn/login.php" method="POST">
            <div class="field">
                <div class="control">
                    <input name="usuario" name="text" placeholder="Seu usuário">
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <input name="senha" type="password" placeholder="Sua senha">
                </div>
            </div>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>

</html>
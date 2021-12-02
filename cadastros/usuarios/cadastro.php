<?php
    include "../../bibliotecas/parametros.php";
    include "../../bibliotecas/conexao.php";

    if (isset($_POST['gravar'])) {
        try {
            $stmt = $conn->prepare(
                'INSERT INTO usuarios (login, email, nome, password) values (:login, :email, :nome, :password)');
            //$stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $senhaMd5 = md5($_POST['password']);
            $stmt->execute(array('login' => $_POST['login'], 'email' => $_POST['email'], 'nome' => $_POST['nome'], 'password' => $senhaMd5));
            //$stmt->execute();
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
?>
<h3>Não possui cadastro? cadastre-se agora</h3>
<form method="post">
    <div class="form-group">
        <label for="login">login</label>
        <input type="text" class="form-control" name="login" id="login" placeholder="login">

        <label for="email">email</label>
        <input type="text" class="form-control" name="email" id="email" placeholder="email">

        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">

        <label for="password">password</label>
        <input type="text" class="form-control" name="password" id="password" placeholder="password">
    </div>
    <input type="submit" name="gravar" value="Gravar">

    <br><br><br>

    voltar para login<br>
    <h2><a href="../../index.php">Voltar</a></h2><br><br> 
</form>

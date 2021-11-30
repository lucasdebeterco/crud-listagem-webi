<?php
    if (isset($_POST['gravar'])) {
        try {
            $stmt = $conn->prepare(
                'INSERT INTO cidades (codigo, nome, estado) values (:codigo, :nome, :estado)');
            //$stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute(array('codigo' => $_POST['codigo'], 'nome' => $_POST['nome'], 'estado' => $_POST['estado'])); 
            //$stmt->execute();
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
?>
<form method="post">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
        <label for="estado">Estados</label><br>
        <select name="estado" id="estado">
            <?php
                $stmt2 = $conn->prepare("SELECT * FROM estados order by id");
                $stmt2->execute();

                if($stmt2->rowCount() > 0) {
                    while($dados = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$dados['id']}'>{$dados['nome']}</option>";
                    }
                }
            ?>
        </select><br>
        <label for="codigo">codigo</label>
        <input type="text" class="form-control" name="codigo" id="codigo" placeholder="codigo">
    </div>
    <input type="submit" name="gravar" value="Gravar">
</form>

<?php
    if (isset($_POST['gravar'])) {
        try {
            $stmt = $conn->prepare(
                'INSERT INTO cidades (nome) values (:nome)');
            //$stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute(array('nome' => $_POST['nome']));
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
        <label for="estados">Estados</label><br>
        <select name="estados" id="estados">
            <?php
                $stmt = $conn->prepare("SELECT * FROM estados order by id");
                $stmt->execute();

                if($stmt->rowCount() > 0) {
                    while($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$dados['id']}'>{$dados['nome']}</option>";
                    }
                }
            ?>
        </select><br>
        <label for="nome">codigo</label>
        <input type="text" class="form-control" name="codigo" id="codigo" placeholder="codigo">
    </div>
    <input type="submit" name="gravar" value="Gravar">
</form>

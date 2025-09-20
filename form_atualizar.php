<?php
include 'cabecalho.php';
?>

<head>
    <link rel="stylesheet" href="atualizar.css">
</head>

<body>
    <div class="container">
        <h2>Atualizar produto</h2>
        <?php

        $id = $_GET['id'];
        // echo "Recebi ==> $id";
        
        require 'conexao.php';
        $sql = "SELECT * FROM produtos WHERE id = $id";
        $stmt = $pdo->query($sql);
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);
        // print_r($produto);
        
        // while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // echo "ID: " . $produto['id'] . "<br>";
        // echo "Nome: " . $produto['nome'] . "<br>";
        // echo "Preço: R$" . $produto['preco'] . "<br>";
        // echo "Estoque: " . $produto['estoque'] . "<br><br>";
        // }
        
        ?>
        <form action="listar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
            <div class="mb-3">
                Nome: <input value="<?php echo $produto['nome']; ?>" type="text" class="form-control" name="produto">
            </div>
            <div class="mb-3">
                Preço: <input value="<?php echo $produto['preco']; ?>" type="text" class="form-control" name="preco">
            </div>
            <div class="mb-3">
                Quantidade: <input value="<?php echo $produto['quantidade']; ?>" type="text" class="form-control" name="quantidade">
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="index.php" type="button" class="btn btn-warning">Voltar</a>
        </form>
    </div>
    <?php
    include 'rodape.php';
    ?>
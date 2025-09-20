<?php
    include 'cabecalho.php';
?>

<head>
    <link rel="stylesheet" href="cadastro.css">
</head>

<body>
    <div class="container">
        <h2>Cadastrar produto</h2>
        <form action='inserir.php' method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" name="produto" placeholder="Digite o nome do produto">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="preco"  placeholder="Digite o preço do produto">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control"  name="quantidade"  placeholder="Digite a quantidade do produto">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="index.php" type="button" class="btn btn-warning">Voltar</a>
            </div>
        </form>
    </div>
<?php
    include 'rodape.php';
?>
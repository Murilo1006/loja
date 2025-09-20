<?php
include 'cabecalho.php';
require 'conexao.php';

if (isset($_GET['delete_id'])) {
    $delete_id = (int)$_GET['delete_id'];
    $sql = "DELETE FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $delete_id, PDO::PARAM_INT);
    $stmt->execute();

    header('Location: listar.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $nome = $_POST['produto'] ?? '';
    $preco = $_POST['preco'] ?? '';
    $quantidade = $_POST['quantidade'] ?? '';

    if ($id && $nome && $preco && $quantidade) {
        $sql = "UPDATE produtos SET nome = :nome, preco = :preco, quantidade = :quantidade WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':preco', $preco);
        $stmt->bindValue(':quantidade', $quantidade);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header('Location: listar.php');
        exit;
    } else {
        echo "<p style='color:red;'>Erro: Dados incompletos para atualização.</p>";
    }
}
?>

<head>
<link rel="stylesheet" href="listar.css">
</head>

<body>
    <div class="container">
        <h1>Sistema Web com CRUD</h1>
        <h2>Lista de Produtos</h2>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">PREÇO</th>
                    <th scope="col">QUANTIDADE</th>
                    <th scope="col">OPÇÕES</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * FROM produtos";
                $stmt = $pdo->query($sql);
                while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    echo "<tr>";
                    echo "<td>".$produto['id']."</td>";
                    echo "<td>".$produto['nome']."</td>";
                    echo "<td>".$produto['preco']."</td>";
                    echo "<td>".$produto['quantidade']."</td>";
                    echo "
                    <td>
                        <div class='btn-group' role='group'>
                            <a href='form_atualizar.php?id=".$produto['id']."' type='button' class='btn btn-danger'>Atualizar</a>
                            <a href='listar.php?delete_id=".$produto['id']."' 
                               class='btn btn-warning' 
                               onclick=\"return confirm('Confirma exclusão?')\">Apagar</a>
                        </div>
                    </td>";
                    echo "</tr>";
                }
                ?>

            </tbody>
        </table>
        <a href="index.php" type="button" class="btn btn-warning">Voltar</a>
    </div>
<?php
include 'rodape.php';
?>
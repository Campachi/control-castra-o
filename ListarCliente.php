<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Clientes</title>
    <?php
        include('menu.php');
    ?>
</head>
<body>
    <?php
        include('includes/conexao.php');
        $sql = "SELECT cli.id, cli.nome nomecliente, cli.email, cli.ativo, 
                cid.nome nomecidade, cid.estado
                FROM cliente cli 
                LEFT JOIN cidade cid on cid.id = cli.id_cidade";
        //echo $sql;     
        $result = mysqli_query($con, $sql); // Executa a consulta
    ?>
    <h1>Consulta de Clientes</h1>
    <a class="center" href="CadastroCliente.php">Cadastrar Novo Cliente</a>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>email</th>
                <th>id_Cidade</th>
                <th>bairro</th> 
                <th>CEP</th>               
                <th>Alterar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
        <?php //mysqli_fetch_array lê uma linha por vez
            while($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td>".$row['nome']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['id_cidade']."</td>";
                echo "<td>".$row['bairro']."</td>";
                echo "<td>".$row['cep']."</td>";
                echo "<td><a href='alteraCliente.php?id="
                .$row['id']."'>Alterar</a></td>";
                echo "<td><a href='deletaCliente.php?id="
                .$row['id']."'>Deletar</a></td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
</body>
</html>
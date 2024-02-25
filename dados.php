<?php

require_once('conexao.php');

if(isset($_REQUEST['cpf'])) {
    $cpf = $_REQUEST['cpf'];

    try {
        // Prepara a instrução SQL para selecionar o cliente com o CPF fornecido
        $sql = "SELECT * FROM clientes WHERE cpf = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$cpf]);


        // Verifica se o cliente foi encontrado
        if($stmt->rowCount() > 0) {
            // Recupera os dados do cliente encontrado
            $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
            // Imprime o CPF do cliente
            echo "CPF encontrado na tabela de clientes: " . $cliente['CPF'];
            echo "<br>";
            echo "nome do cliente: " .$cliente['Nome'];
        } else {
            echo "CPF não encontrado na tabela de clientes.";
        }
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    echo "Nenhum CPF fornecido.";
}

?>

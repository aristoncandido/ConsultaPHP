<?php

require_once('conexao.php'); // retorna a conexao $conn

if(isset($_REQUEST['cpf'])){  //verifica se foi requisitado a variavel global cpf 
    try{
        $cpf = $_REQUEST['cpf'];
        $sql = "SELECT * FROM clientes WHERE cpf = ?";
        $stmt = $conn->prepare($sql);  //prepara a consulta sql passando a variavel CPF
        $stmt->execute([$cpf]);

        if($stmt->rowCount() > 0){  //verifica se tem algum registro na tabela Clientes com esse CPF
            $cliente = $stmt->fetch(PDO::FETCH_ASSOC);  // retorna um array e é associado na variavel Cliente
            echo "CPF DO CLIENTE: " . $cliente['CPF'] . "<br>";   // o array tem vários indices como CPF, NOME E TELEFONE 
            echo "NOME DO CLIENTE: " . $cliente['Nome'] . "<br>";
            echo "TELEFONE DO CLIENTE: " . $cliente['Telefone'];
        } else {
            echo "Cliente não cadastrado"; // caso não encontre retorna mensagem para o usuário
        }
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage(); // exceção de erro !
    }
} else {
    echo "CPF não encontrado";
}

?>

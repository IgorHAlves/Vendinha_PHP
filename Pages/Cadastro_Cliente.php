<?php
        session_start();

        require("../conecta.php");

        $nome = addslashes($_POST['Nome']);
        $cpf = addslashes($_POST['CPF']);
        $telefone = addslashes($_POST['Telefone']);

        $sql = "INSERT INTO clientes (Nome,CPF,Endereco) VALUES ('$nome','$cpf','$telefone')";

        if($conn->query($sql) === TRUE){
           $_SESSION['mensagem'] = 'Usuário criado com sucesso';
           header('Location: Clientes.php');
           echo $_SESSION['mensagem'];
        }
        else{
            $_SESSION['mensagem'] = 'Usuário não cadastrado';
            header('Location: Clientes.php');
            exit;
        }
?>

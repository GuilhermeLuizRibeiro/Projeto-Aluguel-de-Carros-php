<?php 

    function addUsuario($usuario, $cpf, $dataNascimento, $email, $telefone, $senha){
        global $pdo;
        $pdo->query("INSERT INTO usuarios (id, nome, cpf, data_nascimento, email, telefone, senha) VALUES (null, '$usuario', '$cpf', '$dataNascimento', '$email', '$telefone', '$senha');");
    }

    function fazerLogin($usuario, $senha){

        global $pdo;
        $resp = $pdo->query("SELECT * FROM usuarios WHERE nome='$usuario';");

        if($resp->rowCount() > 0){
            $usu = $resp->fetch();
            if(password_verify($senha, $usu->senha)){
                    session_start();
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['id'] = $usu->id;
                    return true;
                } else {
                    echo "ERRO - SENHA";
                    return false;
            }
        } else {
              echo "ERRO - USUÁRIO";
              return false;
        }
    }

?>
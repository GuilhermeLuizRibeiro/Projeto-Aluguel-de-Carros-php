<?php 

     class CadastroController {

        public static function fazerCadastro() {
            include __DIR__ . '/../model/UsuarioModel.php';
            include __DIR__ . '/../funcoes.php';
        
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                
                $usuario = $_POST['nome'] ?? null;
                $cpf = $_POST['cpf'] ?? null;
                $dataNascimento = $_POST['dataNascimento'] ?? null;
                $mail = $_POST['mail'] ?? null;
                $telefone = $_POST['telefone'] ?? null;
                $senha = $_POST['senha'] ?? null;
                
                if(validaCamposCadastro($usuario, $cpf, $dataNascimento, $mail, $telefone, $senha)){
                    echo "Preencha todos os campos";
                    } else {
                        addUsuario($usuario, $cpf, $dataNascimento, $mail, $telefone, password_hash($senha, PASSWORD_DEFAULT));
                        header('location: ?p=fazer-login');
                    } 
                }
            include __DIR__ . '/../view/componentes/cadastro.php';
        }
     }

?>
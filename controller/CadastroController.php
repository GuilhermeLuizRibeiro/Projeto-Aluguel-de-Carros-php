<?php 

     class CadastroController {

        public static function fazerCadastro() {
            include __DIR__ . '/../model/UsuarioModel.php';
        
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                
                $usuario = $_POST['nome'] ?? null;
                $senha = $_POST['senha'] ?? null;
                
                if(is_null($usuario) || is_null($senha)){
                    echo "Preencha os campos";
                    } else {
                        addUsuario($usuario, password_hash($senha, PASSWORD_DEFAULT));
                        header('location: ?p=fazer-login');
                    } 
                }
            include __DIR__ . '/../view/componentes/cadastro.php';
        }
     }

?>
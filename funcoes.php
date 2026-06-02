<?php 

    function validaCamposLogin($usuario, $senha){
        return empty(trim((string) $usuario)) || empty(trim((string) $senha));
    }

    function validarCpf($cpf) {
        empty(trim((string) $cpf));
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        if (strlen($cpf) !== 11) return false;
        if (preg_match('/(\d)\1{10}/', $cpf)) return false;
        return true;
    }

    function validaCamposCadastro($usuario, $cpf, $dataNascimento, $email, $telefone, $senha){
        return empty(trim((string) $usuario))
            || empty(trim((string) $senha))
            || !validarCpf($cpf)
            || empty(trim((string) $dataNascimento))
            || empty(trim((string) $email))
            || empty(trim((string) $telefone));
    }

    function validaCamposRecuperarSenha($cpf, $dataNascimento, $novaSenha){
        return empty(trim((string) $cpf))
            || empty(trim((string) $dataNascimento))
            || empty(trim((string) $novaSenha));
    }

?>
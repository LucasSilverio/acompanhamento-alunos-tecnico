<?php

require_once './config.php';

class Usuarios {

    public function logar($usuario, $senha){
        global $db;
        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND senha = :senha";
		$sql = $db->prepare($sql);
		$sql->bindValue(":usuario", $usuario);
		$sql->bindValue(":senha", $senha);
		$sql->execute();

		if($sql->rowCount() > 0){
			return true; // retorna verdadeiro pois acertou a senha
		}else{
			return false; // não encontrou nenhum usuário
		}
    }
}
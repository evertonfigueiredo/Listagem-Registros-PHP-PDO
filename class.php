<?php
date_default_timezone_set('America/Sao_Paulo');
abstract class BancoDados
{

	const host = 'localhost';
	const dbname = 'laravel'; //Alterar o nome do banco
	const user = 'root';
	const password = '';

	static function conectar()
	{
		try 
		{
			$pdo = new PDO("mysql:host=".self::host.";dbname=".self::dbname.";charset=utf8", self::user, self::password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}
}


abstract class Lista
{

	static function Pessoas(){
		try {
			$pdo = BancoDados::conectar();
			$listaClientes = $pdo->prepare('
			SELECT * FROM pessoas INNER JOIN 
			telefones ON pessoas.id = telefones.pessoa_id INNER JOIN 
			enderecos ON pessoas.endereco_id = enderecos.id INNER JOIN 
			estados ON enderecos.estados_id = estados.id
			WHERE pessoas.deleted_at IS NOT NULL
			;');
			$listaClientes->execute();
			$listaClientes = $listaClientes->fetchAll(PDO::FETCH_OBJ);

			return $listaClientes;
		} catch (PDOException $e) {
			echo "Error: ".$e->getMessage();
		}
	}
}
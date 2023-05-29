<?php
// Inclui banco de dados.
require 'database.php';

// Testa os campos.
$id = ($_GET['id'] !== null && (int)$_GET['id'] > 0)? mysqli_real_escape_string($db, (int)$_GET['id']) : false;
if(!$id)
{
	// Caso não valide: Solicitação Incorreta HTTP 400.
	return http_response_code(400);
}
// Declara variável com uma exclusão SQL ao banco de dados.
$sql = "DELETE FROM products WHERE id =$id";

// Testa se a consulta no banco de dados foi bem sucedida.
if($db->query($sql))
{
	// solicitação foi bem sucedida e o cliente não precisa sair da página atual.
	http_response_code(204);
}
else
{
	// Não foi possível processar as instruções.
	return http_response_code(422);
}
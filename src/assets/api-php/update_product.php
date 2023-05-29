<?php
// Inclui banco de dados.
require 'database.php';
// Declara variável que lê o arquivo inteiro em uma string.
$postdata = file_get_contents('php://input');
// Testa se a variável é nula ou está vazia.
if(isset($postdata) && !empty($postdata))
{
	// Decodifica uma string JSON.
	$request = json_decode($postdata,true);
	// Testa se a variável está vazia ou menor que 0.
	if (trim($request['name']) == '' || (float)$request['price'] < 0) {

		// Caso não valide: solicitação incorreta HTTP 400.
		return http_response_code(400);
	}
	// Escapa caracteres especiais em uma string para uso em uma instrução SQL
	$id = mysqli_real_escape_string($db, (int)$request['id']);
	$name = mysqli_real_escape_string($db, trim($request['name']));
	$price = mysqli_real_escape_string($db, (float)$request['price']);
	// Declara variável com uma atualização SQL ao banco de dados.
	$sql = "UPDATE products SET name='$name',price=$price WHERE id = $id";
	// Testa se a consulta no banco de dados foi bem sucedida.
	if($db->query($sql))
	{
		// Solicitação foi bem sucedida e o cliente não precisa sair da página atual.
		http_response_code(204);
	}
	else
	{
		// Não foi possível processar as instruções.
		return http_response_code(422);
	}
}
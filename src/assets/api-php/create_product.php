<?php
// Inclui banco de dados.
include 'database.php';
// Declara variável que lê o arquivo inteiro em uma string.
$postdata = file_get_contents("php://input");
// Testa se a variável é nula ou está vazia.
if(isset($postdata) && !empty($postdata))
{
	// Decodifica uma string JSON.
	$request = json_decode($postdata,true);
	// Testa se a variável está vazia ou é menor que 0.
	if(trim($request['name']) === '' || (float)$request['price'] < 0)
	{
		// Caso não valide: solicitação incorreta HTTP 400.
		return http_response_code(400);
	}
	// Escapa caracteres especiais em uma string para uso em uma instrução SQL.
	$name = mysqli_real_escape_string($db, trim($request['name']));
	$price = mysqli_real_escape_string($db, (int)$request['price']);
	// Declara variável com uma inserção SQL ao banco de dados.
	$sql = "INSERT INTO products (id,name,price) VALUES (null,'$name',$price)";
	// Testa se a consulta no banco de dados foi bem sucedida.
	if($db->query($sql))
	{
		// Obtém ou define o código de resposta HTTP.
		http_response_code(201);
		$product = [
		'id' => mysqli_insert_id($db),'name' => $name,
		'price' => $price];
		// Retorna a representação JSON de um valor.
		echo json_encode($product);
	}
	else
	{
		// Não foi possível processar as instruções.
		http_response_code(422);
	}
}
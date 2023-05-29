<?php

// Inclui banco de dados.
include 'database.php';

// Declara vetor.
$products = [];

// Declara variável com uma consulta SQL ao banco de dados.
$sql = "SELECT * FROM products";

// Declara variável e testa se a consulta no banco de dados foi bem sucedida.
if($result = $db->query($sql))
{
	// Declara variável do contador.
	$i = 0;

	// Declara variável e obtém uma linha do conjunto de resultados como uma matriz associativa.
	while($row = $result->fetch_assoc())
	{
		$products[$i]['id'] = $row['id'];
		$products[$i]['name'] = $row['name'];
		$products[$i]['price'] = $row['price'];
		$i++;
	}
	// Retorna a representação JSON dos valores.
	echo json_encode($products);
}
else
{
	// servidor não conseguiu encontrar o recurso solicitado.
	http_response_code(404);
}
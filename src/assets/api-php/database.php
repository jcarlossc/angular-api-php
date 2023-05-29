<?php
/* 
O valor (*) informa aos navegadores para permitir 
a solicitação de código de qualquer origem para 
acessar o recurso.
*/
header("Access-Control-Allow-Origin: *");
/*
Access-Control-Allow-Credentials: cabeçalho de 
resposta informa aos navegadores se devem expor 
a resposta ao código JavaScript front-end quando 
o modo de credenciais da solicitação.
*/
header('Access-Control-Allow-Credentials: true');
/*
O cabeçalho de resposta Access-Control-Allow-Methods 
especifica o método ou métodos permitidos quando o recurso
é acessado.
*/
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
/*
Access-Control-Allow-Headers: cabeçalho que é usado 
em resposta a uma solicitação de simulação que inclui o 
Access-Control-Request-Headers para indicar quais cabeçalhos 
HTTP podem ser usados ​​durante a solicitação real.
*/
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
/*
Content-Type: cabeçalho de representação é usado para indicar 
o tipo de mídia original do recurso 
(antes de qualquer codificação de conteúdo aplicada para envio).
*/
header("Content-Type: application/json; charset=UTF-8");

// Define a constante HOST para localhost.
define('HOST', 'localhost');
// Define a constante USER para usuário.
define('USER', 'root');
// Define a constante PASS para senha.
define('PASS', '');
// Define a constante NAME para base de dados.
define('NAME', 'test-api');

// Declara a variável db para receber os parâmetros das funções DEFINES
$db = new mysqli(HOST ,USER ,PASS ,NAME);

// Testa a conexão
if ($db->connect_errno) {
	die("Database connection error:" . $db->connect_errno);
}
?>
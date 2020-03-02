<?php
function getConexao(){
    $conexao = new \PDO("pgsql:host=localhost;dbname=php_basico","postgres","Maker@1");
    return $conexao;
}
?>

<?php
include 'config.php';
include 'users.php';
include 'produtos.php';

function getPagina(){
  $url = $_SERVER['REQUEST_URI'];
  $url = explode('%22', $url);
  $url = $url[0];
  $method = $_SERVER['REQUEST_METHOD'];
if($method == "GET"){
  switch($url){
    case "/": $produtos = getProdutos();include 'paginas/home.php';break;
    case "/home": $produtos = getProdutos();include 'paginas/home.php';break;
    case "/sobre": include 'paginas/sobre.php';break;
    case "/contato": include 'paginas/contato.php';break;
    case "/busca":
    $produtos = buscaProdutos($_GET['busca']);
    include 'paginas/home.php';break;
    default: $produtos = getProdutos();include 'paginas/home.php';break;
  }
}

if($method == "POST"){

}
}
 ?>

<?php
include 'config.php';
include 'db.php';
include 'users.php';
include 'produtos.php';

function getPagina(){
  $method = $_SERVER['REQUEST_METHOD'];
  $url = $_SERVER['REQUEST_URI'];
  $urlModificada = explode('%22', $url);
  $urlModificada = $urlModificada[0];
if($method == "GET"){
    if($urlModificada == "/") {
      $produtos = getProdutos();include 'paginas/home.php';
    }
    if($urlModificada == "/home"){
       $produtos = getProdutos();include 'paginas/home.php';
    }
    if($urlModificada == "/sobre") include 'paginas/sobre.php';
    if($urlModificada == "/contato") include 'paginas/contato.php';
    if($urlModificada == "/busca"){
      $produtos = buscaProdutos($_GET['busca']);
      include 'paginas/home.php';
    }
    $urlModificada = explode('?', $url);
    $urlModificada = $urlModificada[0];
    if($urlModificada == "/produto/editar"){
      $produtoEdit = buscaProdutoPorId($_GET['id']);
      $editando = true;
      $produtos = getProdutos();
      include 'paginas/home.php';
    }
    $urlModificada = explode('%22', $url);
    $urlModificada = $urlModificada[0];

    //default: $produtos = getProdutos();include 'paginas/home.php';break;
}else if($method == "POST"){
  switch($urlModificada){
    case "/produto/adicionar":
    if(!adicionarProdutos($_POST)){
      $msg = "Erro ao salvar o registro!";
      $produtos = getProdutos();
      include 'paginas/home.php';
      break;
    }
    header('location:../');
    break;
      case "/produto/salvar":
      if(!salvarProduto($_POST)){
        $msg = "Erro ao atualizar o registro!";
        $produtos = getProdutos();
        include 'paginas/home.php';
        break;
      }
      header('location:../');
      break;

    default: $produtos = getProdutos();include 'paginas/home.php';break;
  }
}
}
 ?>

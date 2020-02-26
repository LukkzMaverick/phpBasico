<?php
  function getProdutos(){
    $dados = array(
      ["titulo"=>"PHP Básico","descricao"=>"Curso de PHP Básico","valor"=>"120.90"],
      ["titulo"=>"PHP com PDO","descricao"=>"Curso de PHP com PDO","valor"=>"140.90"],
      ["titulo"=>"PHP OO","descricao"=>"Curso de PHP Orientado a Objetos","valor"=>"1490.90"]
  );
    return $dados;
  }
  function buscaProdutos($busca){
    $produtos = getProdutos();
    $resultados = [];
    foreach ($produtos as $produto) {
      //$existe = in_array($busca, $produto);
      $existe = in_array(strtolower($busca),array_map('strtolower',$produto));
      if($existe){
        array_push($resultados, $produto);
      }
    }
    return $resultados;
  }
 ?>

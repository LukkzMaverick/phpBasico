<?php
  function getProdutos(){
    $dados = array(
      ["titulo"=>"PHP Básico","descricao"=>"Curso de PHP Básico","valor"=>"120.90"],
      ["titulo"=>"PHP com PDO","descricao"=>"Curso de PHP com PDO","valor"=>"140.90"],
      ["titulo"=>"PHP OO","descricao"=>"Curso de PHP Orientado a Objetos","valor"=>"1490.90"]
  );

    $conexao = getConexao();
    $select = "select * from produtos";
    $ret = $conexao->query($select);
    $produtos = $ret->fetchAll();
    return $produtos;
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
  function adicionarProdutos($dados){
    $conexao = getConexao();
    $insert = "insert into produtos (pro_titulo,pro_descricao,pro_valor)
    values (:titulo,:descricao,:valor)";
    $stmt = $conexao->prepare($insert);
    $stmt->bindValue(':titulo',$dados['titulo']);
    $stmt->bindValue(':descricao',$dados['descricao']);
    $stmt->bindValue(':valor',$dados['valor']);
    $stmt->execute();
    return $conexao->lastInsertId();
  }

  function salvarProduto($dados){
    $conexao = getConexao();
    $update = "Update produtos set pro_titulo=:titulo, pro_descricao=:descricao, pro_valor:=valor where pro_id=:id";

    $stmt = $conexao->prepare($update);
    $stmt->bindValue(':titulo',$dados['titulo']);
    $stmt->bindValue(':descricao',$dados['descricao']);
    $stmt->bindValue(':valor',(string)$dados['valor']);
    $stmt->bindValue(':id',(int)$dados['id']);
    $ret = $stmt->execute();
    return $ret;
  }

  function buscaProdutoPorId($id){
    $conexao = getConexao();
    $select = "select * from produtos where pro_id=:id";
    $stmt = $conexao->prepare($select);
    $stmt->bindValue(':id',(int)$id);
    $stmt->execute();
    return $stmt->fetch(\PDO::FETCH_ASSOC);
  }
 ?>

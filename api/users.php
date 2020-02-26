<?php
function getUsers(){
    $dados = [["nome" => "Lucas", "email" => "lukkzmaverick@gmail.com"],
    ["nome" => "João", "email" => "joaozinho@gmail.com"],
    ["nome" => "Pedro", "email" => "Pedro@hotmail.com"],
    ["nome" => "Joana", "email" => "Joana@gmail.com"]];
    return $dados;
}
function showUser(){
  $usuarios = getUsers();
  $html = '';
  foreach ($usuarios as $key => $value) {
    $nome = $value['nome'];
    $email = $value['email'];
    $html .= "<li>Nome: $nome - Email: $email</li>";
  }
  echo $html;
}
function showUser2(){
  $usuarios = getUsers();
  $html = '';
  for($i = 0; $i < count($usuarios);  $i++){
    $nome = $usuarios[$i]["nome"];
    $email = $usuarios[$i]["email"];
    $html .= "<li>Nome: $nome - Email: $email</li>";
  }
  echo $html;
}
 ?>

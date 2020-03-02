<h2><?php echo getInfo("titulo") ?></h2>
<p><?php echo getInfo("descricao") ?></p>
<hr></hr>
<h2>Pesquisar</h>
<form action=busca"" method="get">
    <input type="text" name="busca" value="">
    <button>Pesquisar</button>
</form>
<hr></hr>
<h2>Lista de Produtos</h>
<ul>
    <?php foreach ($produtos as $produto): ?>
      <li><?php echo $produto['pro_titulo'] ." - ". $produto['pro_descricao'] ." - ".$produto['pro_valor'] ?>
        <a href="/produto/editar?id=<?php echo $produto['pro_id']; ?>">Editar</a>
      </li>
    <?php endforeach; ?>
</ul>
<hr></hr>
<?php if(isset($editando)):?>
  <h2>Editando Produto</h>
<?php else:?>
  <h2>Adicionar Produto</h>
<?php endif;?>
  <?php if(isset($msg)): ?>
    <p><?php echo $msg; ?></p>
  <?php endif; ?>
  <form action=" <?php echo (isset($editando)? '/produto/salvar' : '/produto/adicionar');?>" method="post">
    <?php if(isset($editando)):?>
      <input type="hidden" name="id" value="<?php echo $produtoEdit['pro_id']; ?>"></input>
    <?php endif;?>
      <input type="text" name="titulo" placeholder="Título" value="<?php
      echo (isset($produtoEdit['pro_titulo'])? $produtoEdit['pro_titulo'] : ''); ?>"></input>
      <input type="text" name="descricao" placeholder="Descrição" value="<?php
      echo (isset($produtoEdit['pro_descricao'])? $produtoEdit['pro_descricao'] : ''); ?>">"></input>
      <input type="text" name="valor" placeholder="Valor R$" value="<?php
      echo (isset($produtoEdit['pro_valor'])? $produtoEdit['pro_valor'] : ''); ?>">"></input>
      <button><?php echo (isset($editando)? 'Atualizar' : 'Adicionar'); ?></button>
      <a href="/home">Cancelar</a>
  </form>

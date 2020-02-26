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
      <li><?php echo $produto['titulo'] ." - ". $produto['descricao'] ." - "."R$".number_format($produto['valor'],2,",","."); ?></li>
    <?php endforeach; ?>
</ul>

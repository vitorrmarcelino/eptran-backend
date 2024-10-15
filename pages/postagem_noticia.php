<?php
$noticia = isset($_POST['noticia']) ? $_POST['noticia'] : "Título padrão";
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : "Descrição padrão";
$imagem_url = isset($_POST['imagem_url']) ? $_POST['imagem_url'] : "caminho/para/imagem.jpg";
$id = isset($_POST['id']) ? intval($_POST['id']) : 1;
?>

<a href="./pages/news.php?id=<?= $id ?>">
  <?= htmlspecialchars($noticia) ?>
</a>
<p><?= htmlspecialchars($descricao) ?></p>
<img src="<?= htmlspecialchars($imagem_url) ?>" alt="Imagem da notícia">

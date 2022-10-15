<?php
session_start();

if(isset($_SESSION['USER'])) {
  header('Location: ../index.php');
  exit;
}

require_once '../database/pdo.php';

$sql = 'SELECT users.userName, articles.content, articles.user, articles.articleId FROM articles JOIN users ON articles.user = users.userId';
$request = $pdo->query($sql);
$articles = $request->fetchAll();

if(!empty($_POST)) {
  if(!empty($_POST['content']))
  {
    $content = strip_tags($_POST['content']);

    $article = 'INSERT INTO articles (user, content) VALUES (:user, :content)';
    $query = $pdo->prepare($article);
    $query->bindValue(':user', $_SESSION['user']['id'], PDO::PARAM_STR);
    $query->bindValue(':content', $content, PDO::PARAM_STR);
    $query->execute();

    $sql = 'SELECT users.userName, articles.content, articles.user, articles.articleId FROM articles JOIN users ON articles.user = users.userId';
    $request = $pdo->query($sql);
    $articles = $request->fetchAll();
  }  

  if(!empty($_POST['edit']))
  {
    $contentEdit = strip_tags($_POST['edit']);
    $id = strip_tags($_POST['id']);

    $check = 'UPDATE articles SET content = :content WHERE articleId = :id';
    $query = $pdo->prepare($check);
    $query->bindValue(':content', $contentEdit, PDO::PARAM_STR);
    $query->bindValue(':id', $id, PDO::PARAM_STR);
    $query->execute();

    $sql = 'SELECT users.userName, articles.content, articles.user, articles.articleId FROM articles JOIN users ON articles.user = users.userId';
    $request = $pdo->query($sql);
    $articles = $request->fetchAll();
  }
}

$title = 'Feed';
$css = '../css/feed.css';

include_once '../templates/header.php';
?>

<h1>Bonjour <?= $_SESSION['user']['name'] ?></h1>

<div id='block'>
  <?php foreach($articles as $art) : ?>
    <div>
      <span><?= $art['userName'] ?></span>
      <span><?= $art['content'] ?></span>
      <?php if($art['user'] == $_SESSION['user']['id'] or $_SESSION['user']['admin'] == 'admin'): ?>
        <form id='check' method='post'>
          <input type='text' name='edit' id='edit'>
          <input type='hidden' name='id' value='<?= $art['articleId'] ?>'>
          <button type='submit'>valider</button>
        </form>
      <?php endif ?>
    </div>
  <?php endforeach; ?>
</div>

<form id='new' method='post'>
  <textarea type='text' name='content' id='textArea'></textarea>
  <button type='submit'>envoyer</button>
</form>

<script src='../js/script.js'></script>
<?php include_once '../templates/footer.php'; ?>
<?php
session_start();

if(isset($_SESSION['USER'])) {
  header('Location: ../index.php');
  exit;
}

require_once '../database/pdo.php';

$sql = 'SELECT users.userName, articles.content FROM articles JOIN users ON articles.user = users.userId';

$request = $pdo->query($sql);

$articles = $request->fetchAll(PDO::FETCH_ASSOC);

foreach($articles as $art) {
  echo json_encode([
  'name' => $art['userName'],
  'content' => $art['content']
  ]);
}
?>
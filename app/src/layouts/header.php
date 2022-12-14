<?php
// session_start();
// require_once '../../vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang='fr' class='h-full bg-gray-50'>
<head>
  <meta charset='UTF-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title><?php if (isset($title)) { echo $title; } else { echo 'Blog'; } ?></title>
  <link rel='stylesheet' href=<?php if (isset($css)) { echo $css; } else { echo '../output.css'; } ?>>
  <link rel='preconnect' href='https://fonts.googleapis.com'>
  <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
  <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap' rel='stylesheet'>

</head>
<body class='h-full'>
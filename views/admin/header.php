<!DOCTYPE html>
<html lang="es">
<head>
	<title>Admin</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

  <script>
    const appUrl = 'http://localhost/eset-native/';
  </script>

  <?php
    if (isset($_SESSION['msg'])){
      $msg = $_SESSION['msg'];
      unset($_SESSION['msg']);
    }
    
    include_once(__DIR__ . '/modal.php');
  ?>
  
</head>
<body>

  <div class="container-fluid">
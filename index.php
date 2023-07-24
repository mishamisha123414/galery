<?php
require_once("connection.php");
$query = "SELECT * FROM images";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Photo Gallery</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<section class="galeria">
      <div class="container">
        <h1 class="tit">Galeria de Imagenes</h1>
        <h2>Lorem Ipsum</h2>
        <a href="/add.php">Добавить изображение</a>
        <div class="contenedorImgs">
      <?php 
       foreach ($result as $row) {
      ?>
      <div class="imagen" style="background-image:url('<?php  echo $row['url']?>')">
        <p class="nombre"><?php  echo $row['title'] ?> </p>
        <p class="descr"><?php  echo $row['descr'] ?> </p>
      </div>
      <?php 
       }
      ?>
    </div>
      </div>
    </section>
  </body>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>

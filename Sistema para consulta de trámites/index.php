<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/mediaQueryIndex.css">
    <link rel="icon" type="text/jpg" href="img/menu.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Trámites Municipales</title>
  </head>
  <style>
    .content{
      overflow-y:auto;
  }

  </style>
  <body>

  <header>
    <img src="img/menu.png" alt="" class="img__menu">
    <h2 class="tituloPrincipal" id="titulo"  name="titulo">CONSULTE LOS REQUISITOS DE TRÁMITES MUNICIPALES</h2>
  </header>
    
  <div class="content" id="content">
    <?php
      include "Querys/ConsultaDepartamentos.php";
      echo departamentos();
    ?> 
    
  </div>

</body>

<script  src="js/index.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</html>
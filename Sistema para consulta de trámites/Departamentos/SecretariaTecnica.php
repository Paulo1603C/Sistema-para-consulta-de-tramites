<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="text/jpg" href="../img/menu.png">
    <link rel="stylesheet" href="../css/departamentos.css">
    <link rel="stylesheet" href="../css/depaMediaQuerys.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!--Estilos del paginador-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"> 
    <?php 
        $dato = isset($_REQUEST['v']) ? $_REQUEST['v'] : null; 
    ?>
    <title ><?php echo $dato ?></title>
</head>
<style>
    header{
        display: flex;
        align-items:center;
        justify-content: center;
        padding: 5px;
        background-color: #073665;
        color: white;
        background-size:cover;
        width: 100%;
        height: 90px; 
    }
    a{
        color:black;
    }

    a:hover{
        text-decoration:none;
        color:black;
    }

    .fa-home{
        margin-right:2px;
    }

    .img__menu{
        margin-right:2em;
    }

    .col-md-7{
        display:none;
    }

        /*PARA CELULARES S8 */
        @media all and  (max-width: 360px) {
        .content{
            position:absolute;
            top:55%;
            left:50%;
            transform: translate(-50%, -50%);
            width:100%;
            height:86%;
            overflow-y:scroll;
        } 
    
        .botones{
            /*POSICION DEL BOTON */
            position: relative;
            top:4%;
            left:81%;
            transform: translate(-50%, -50%);  
        }
    }
    
    @media all and  (max-width: 768px) {
    

        body{
            background:white;
        }
        .content{
            position:absolute;
            top:56%;
            left:50%;
            transform: translate(-50%, -50%);
            width:100%;
            height:86%;
            overflow-y:scroll;
        } 
    
        .botones{
            /*POSICION DEL BOTON */
            position: relative;
            top:4%;
            left:89%;
            transform: translate(-50%, -50%);  
        }
    }
    
    @media all and  (max-width: 767px) {
        .content{
            position:absolute;
            top:55%;
            left:50%;
            transform: translate(-50%, -50%);
            width:100%;
            height:86%;
            overflow-y:scroll;
        } 
    
        .botones{
            /*POSICION DEL BOTON */
            position: relative;
            top:4%;
            left:82%;
            transform: translate(-50%, -50%);  
        }
        .content2{
            margin-top:8px;
            
        }
    }

</style>

<body> 

    <header class="div">
        <img src="../img/menu.png" alt="" class="img__menu">
        <h2 class="tituloPrincipal" id="titulo"  name="titulo"><?php echo $dato ?></h2>
    </header>    
    
    <div class="content" id="content" >

        <div class="botones" id="btnHome">
            <a href="../index.php"><i class="fas fa-home"></i>MENÚ INICIO</a>
        </div>

        <div class="content2">

            <div class="tramites" id="pagination-1" name="listaTramites">
                <table id="tablax" class="table table-striped table-bordered" style="width:100%" >
                    <thead>
                        <tr>
                            <td><b>LISTADO TRÁMITES</b></td>
                        </tr>
                    </thead>        

                    <tbody  id="pagination-1">
                        <?php
                            include '../Querys/modules/RequisitosSecretariaTecnica.php';
                            echo tramites();
                        ?>
                    </tbody>    
                </table>
            </div>

            <div class="aside" id="aside" >
                <div class="content3">
                    <div class="SubTitulo" >
                        <h3 class="tituloRequisito" id="tituloRequisito">orden control</h3>
                    </div>
                    <div class="cuerpoRequisito">
                       <div class="btn__imprimir" id="btn__imprimir">
                            <div class="aux" id="aux__imprimir" >
                                <img src="../img/impresora.png" alt="" class="img__card" style="width:50px;height:50px" id="aux__imprimir">
                                <p class="card-text" id="aux__imprimir">Imprimir Requisitos</p>
                            </div>
                       </div>
                            <p class="tituloR" >Requisitos</p>
                            <div class="requisitos" id="requisitos" data-value="100">
                                Selecione un trámite de la lista 
                            </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer></footer>

</body>

<script src="../js/departamentos.js" > </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

<!--/*paginador */-->
<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.4.1.js"
      integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
      </script>
  <!-- DATATABLES -->
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
  </script>
  <!-- BOOTSTRAP -->
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
  </script>

  <script>
      $(document).ready(function () {
            $('#tablax').DataTable({
                
                language: {
                    processing: "Tratamiento en curso...",
                    search: "Buscar&nbsp;:",
                    lengthMenu: "",
                    info: "",
                    infoEmpty: "No existen datos.",
                    infoFiltered: "(filtrado de _MAX_ elementos en total)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron datos con tu busqueda",
                    emptyTable: "No hay datos disponibles en la tabla.",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                    },
                    aria: {
                        sortAscending: ": active para ordenar la columna en orden ascendente",
                        sortDescending: ": active para ordenar la columna en orden descendente"
                    }
                },
                scrollY: 400,
                lengthMenu: [ [10000, 15, -1], [10000, 15, "All"] ],
            });

            $('.dataTables_filter input[type="search"]').css(
                {'width':'150px','display':'inline-block'}
            );
        });
  </script>

</html>
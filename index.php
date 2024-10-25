<?php 

include ('app/config.php');

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
</head>
<body style="background-image: url('public/imagenes/piso-fondo.jpg');
            background-repeat:no-repeat;
            z-index: -3;
            background-size: 100vw 100vh;">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="#">
    <img src="" width="30" height="30" class="d-inline-block align-top" alt="">
    SISTEMA PARQUEO
</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">INICIO<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">SOBRE: NOSOTROS</a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          PROMOCIONES
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">MENSUALES</a>
          <a class="dropdown-item" href="#">DIAS</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">FICHAS</a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">CONTACTANOS</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="buscar" placeholder="Buscar" aria-label="Buscar">
    </form>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Ingresar
    </button>
  </div>
</nav>

<br>
<div class="container">
<div class="row">
                            <?php 
                            $query_mapeos = $pdo->prepare("SELECT * FROM tb_mapeos WHERE estado = '1' ");
                            $query_mapeos->execute();
                            $mapeos = $query_mapeos->fetchAll(PDO::FETCH_ASSOC);
                            foreach($mapeos as $mapeo){
                                $id_map = $mapeo['id_map'];
                                $nro_espacio = $mapeo['nro_espacio'];
                                $estado_espacio = $mapeo['estado_espacio'];

                                if($estado_espacio == "LIBRE"){ ?>
                                    <div class="col">
                                        <center>
                                            <h2><?php echo $nro_espacio?></h2>
                                            <button class="btn btn-success" style="width: 100%;height: 106px">
                                                <p><?php echo $estado_espacio?></p>
                                            </button>
                                        </center>
                                    </div>
                                <?php    
                                }

                                if($estado_espacio == "OCUPADO"){ ?>
                                     <div class="col">
                                        <center>
                                            <h2><?php echo $nro_espacio?></h2>
                                            <button class="btn btn-info">
                                                <img src="<?php echo $URL;?>/public/imagenes/auto.png" width="55px" alt="">
                                            </button>
                                            <p><?php echo $estado_espacio?></p>
                                        </center>
                                    </div>
                                <?php    
                                }
                                
                                ?>
                            <?php
                                }
                            ?>
                           
                        </div>
</div>

<script src="public/js/jquery-3.7.1.min.js"></script>
<script src="public/js/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="public/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</body>
</html>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inicio de Sesion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Usuario/Email</label>
                    <input id="usuario" class="form-control" type="email" name="">
                </div>
                <div class="form-group">
                    <label for="">Contraseña</label>
                    <input id="password" class="form-control" type="password" name="">
                </div>
            </div>
        </div>

        <div id="respuesta">
            
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn_ingresar">Ingresar</button>
      </div>
    </div>
  </div>
</div>

<script>
$('#btn_ingresar').click(function(){
    login();
});

$('#password').keypress(function(e){
    if(e.which == 13){
        login();
    }
});

function login(){
    var usuario = $('#usuario').val();
     var password_user = $('#password').val();

    if(usuario == ""){
        alert('Debe introducir su Usuario...');
        $('#usuario').focus();
    }else if(password_user == ""){
        alert('Debe de introducir su Contraseña...');
        $('#password').focus();
    }else{
        var url = 'login/controller_login.php';
        $.post(url, {usuario:usuario, password_user:password_user}, function(datos){
            $('#respuesta').html(datos);
        });
    }
}
</script>

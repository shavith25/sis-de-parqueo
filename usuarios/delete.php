<?php
    include ('../app/config.php');
    include ('../layout/admin/datos_usuario_sesion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('../layout/admin/head.php');?>
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
    <?php include('../layout/admin/menu.php');?>

<div class="content-wrapper">
    <br>
    <div class="container">

    <?php 
    $id_get = $_GET['id'];
    $query_usuario = $pdo->prepare("SELECT * FROM tb_usuarios WHERE id = '$id_get' AND estado = '1' ");
    $query_usuario->execute();
    $usuarios = $query_usuario->fetchAll(PDO::FETCH_ASSOC);
    foreach($usuarios as $usuario){
        $id = $usuario['id'];
        $nombres = $usuario['nombres'];
        $email = $usuario['email'];
        $password_user = $usuario['password_user'];
    }
    ?>

        <h2>Eliminacion del Usuario</h2>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                <div class="card card-danger" style="border: 1px solid #777777">
                    <div class="card-header">
                        <h3 class="card-title">¿Estas seguro de eliminar este registro?</h3>
                    </div>
                    <div class="card-body">
                            <div class="<div class="form-group">
                                <label for="m">Nombres</label>
                                <input id="nombres" class="form-control" type="text" value="<?php echo $nombres;?>" disabled>
                            </div>
                            <div class="<div class="form-group">
                                <label for="m">Email</label>
                                <input id="email" class="form-control" type="email" value="<?php echo $email;?>" disabled>
                            </div>
                            <div class="<div class="form-group">
                                <label for="m">Password</label>
                                <input id="password_user" class="form-control" type="password_user" value="<?php echo $password_user;?>" disabled>
                            </div>
                            <div class="<div class="form-group">
                                <br>
                                <button type="submit" class="btn btn-danger" id="btn_borrar">Borrar</button>
                                <a type="<?php echo $URL;?>/usuarios/" class="btn btn-default">Cancelar</a>
                            </div>
                            <div id="respuesta"></div>
                        </div>
                </div>
                <div class="col-md-6"></div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                <div>     
            </div>
        </div>
    </div>
   
</div>
    <?php include('../layout/admin/footer.php');?>  

</div>
<?php include('../layout/admin/footer_link.php');?>

</body>
</html>

<script>
    $('#btn_borrar').click(function(){
        var id_user = '<?php echo $id_get = $_GET['id'];?>';
        
        var url = 'controller_delete.php';
            $.get(url, {id_user:id_user}, function(datos){
                $('#respuesta').html(datos);
            });
    });

</script>

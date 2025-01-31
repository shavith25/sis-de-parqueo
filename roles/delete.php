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
        <h2>Eliminacion de Nuevo Rol</h2>

        <?php 
        $id_rol = $_GET['id'];
        $query_roles = $pdo->prepare("SELECT * FROM tb_roles WHERE id_rol = '$id_rol' AND estado = '1' ");
        $query_roles->execute();
        $roles = $query_roles->fetchAll(PDO::FETCH_ASSOC);
        foreach($roles as $role){
            $id_rol = $role['id_rol'];
            $nombre = $role['nombre'];
        }
        ?>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="border: 1px solid #606060;">
                        <div class="card-header" style="background-color: #d92005; color: #ffffff;">
                        <h4>¿Estas seguro de eliminar este registro?</h4>
                        </div>
                        <div class="card-body">
                            <div class="<div class="form-group">
                                <label for="m">Nombre</label>
                                <input id="nombre" class="form-control" type="text" value="<?php echo $nombre;?>" disabled>
                            </div>
                
                            <div class="<div class="form-group">
                                <br>
                                <button type="submit" class="btn btn-danger" id="btn_borrar">Borrar</button>
                                <a type="<?php echo $URL;?>/roles/" class="btn btn-default">Cancelar</a>
                            </div>
                            <div id="respuesta">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6"></div>
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
        var id_rol = '<?php echo $id_rol;?>';

            var url = 'controller_delete.php';
            $.get(url, {id_rol:id_rol}, function(datos){
                $('#respuesta').html(datos);
            });
    });
</script>

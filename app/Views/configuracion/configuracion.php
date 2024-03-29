<div class="container-fluid">
    <h4 class="mb-2 text-gray-800"><?php echo $titulo; ?></h4>
    
    <?php if (isset($validation)) {?>
        <div class="alert alert-danger">
            <?php echo $validation->listErrors(); ?>
        </div>
    <?php }?>

    <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>/configuracion/actualizar" autocomplete="off">
    <?php csrf_field();?>
    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label>Nombre de la tienda</label>
                <input class="form-control" id="tienda_nombre" name="tienda_nombre" type="text" value="<?php echo $nombre ['valor'] ?>" autofocus required>
            </div>

            <div class="col-12 col-sm-6">
                <label>RFC</label>
                <input class="form-control" id="tienda_rfc" name="tienda_rfc" value="<?php echo $rfc['valor'] ?>" type="text" required>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label>Telefono de la tienda</label>
                <input class="form-control" id="tienda_telefono" name="tienda_telefono" type="text" value="<?php echo $telefono ['valor'] ?>" required>
            </div>

            <div class="col-12 col-sm-6">
                <label>Correo de la tienda</label>
                <input class="form-control" id="tienda_email" name="tienda_email" value="<?php echo $email ['valor'] ?>" type="text" required>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label>Direccion de la tienda</label>
                <textarea class="form-control" id="tienda_direccion" name="tienda_direccion" required><?php echo $direccion ['valor'] ?>
                </textarea>
            </div>

            <div class="col-12 col-sm-6">
                <label>Leyenda del ticket</label>
                <textarea class="form-control" id="ticket_leyenda" name="ticket_leyenda" required><?php echo $leyenda ['valor'] ?>
                </textarea>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label>Logotipo</label><br />
                <img class="img-responsive" width="200" src="<?php echo base_url().'/img/logotipo.png'; ?>" alt=""><br />
                <input type="file" name="tienda_logo" id="tienda_logo" accept="image/png">
                <p class="text-danger">Cargar en imagen en formato png en 150x150 pixeles</p>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success float-right  ml-2">Guardar</button>
    <a href="<?php echo base_url(); ?>/configuracion" class="btn btn-primary float-right">Regresar</a>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Desea eliminar este registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <a type="button" class="btn btn-danger btn-ok">Si</a>
            </div>
        </div>
    </div>
</div>



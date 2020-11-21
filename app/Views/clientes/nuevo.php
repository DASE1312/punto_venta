<div class="container-fluid">
    <h4 class="mb-2 text-gray-800"><?php echo $titulo; ?></h4>

    <?php if (isset($validation)) {?>
        <div class="alert alert-danger">
            <?php echo $validation->listErrors(); ?>
        </div>
    <?php }?>

    <form method="POST" action="<?php echo base_url(); ?>/clientes/insertar" autocomplete="off">
    <?php csrf_field();?>
    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label for="">Nombre</label>
                <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo set_value('nombre') ?>" autofocus required>
            </div>
            <div class="col-12 col-sm-6">
                <label for="">Direccion</label>
                <input class="form-control" id="direccion" name="direccion" value="<?php echo set_value('direccion') ?>" type="text" required>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label for="">Telefono</label>
                <input class="form-control" id="telefono" name="telefono" value="<?php echo set_value('telefono') ?>" type="text" required>
            </div>
            <div class="col-12 col-sm-6">
                <label for="">Correo</label>
                <input class="form-control" id="correo" name="correo" value="<?php echo set_value('correo') ?>" type="text" required>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success float-right  ml-2">Guardar</button>
    <a href="<?php echo base_url(); ?>/clientes" class="btn btn-primary float-right">Regresar</a>
    </form>
</div>




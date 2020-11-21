<div class="container-fluid">
    <h4 class="mb-2 text-gray-800"><?php echo $titulo; ?></h4>

    <?php if (isset($validation)) {?>
        <div class="alert alert-danger">
            <?php echo $validation->listErrors(); ?>
        </div>
    <?php }?>

    <form method="POST" action="<?php echo base_url(); ?>/roles/insertar" autocomplete="off">
    <?php csrf_field();?>
    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label>Nombre</label>
                <input class="form-control" id="nombre" name="nombre" value="<?php echo set_value('nombre') ?>" type="text" required>
            </div>
            
        </div>
    </div>

    <button type="submit" class="btn btn-success float-right  ml-2">Guardar</button>
    <a href="<?php echo base_url(); ?>/roles" class="btn btn-primary float-right">Regresar</a>
    </form>
</div>




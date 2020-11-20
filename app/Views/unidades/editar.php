<div class="container-fluid">
    <h4 class="mb-2 text-gray-800"><?php echo $titulo; ?></h4>

    <?php if (isset($validation)) {?>
        <div class="alert alert-danger">
            <?php echo $validation->listErrors(); ?>
        </div>
    <?php }?>

    <form method="POST" action="<?php echo base_url(); ?>/unidades/actualizar" autocomplete="off">
    <input type="hidden" value="<?php echo $datos['id'];?>" name="id"> 
    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label for="">Nombre</label>
                <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo $datos['nombre'];?>" autofocus required>
            </div>
            <div class="col-12 col-sm-6">
                <label for="">Nombre corto</label>
                <input class="form-control" id="nombre_corto" name="nombre_corto" value="<?php echo $datos['nombre_corto'];?>" type="text" required>
            </div>
        </div>
    </div>
    <button tyoe="submit" class="btn btn-success float-right ml-2">Guardar</button>
    <a href="<?php echo base_url(); ?>/unidades" class="btn btn-primary float-right">Regresar</a>
    </form>
</div>



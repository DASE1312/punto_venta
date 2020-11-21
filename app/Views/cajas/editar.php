<div class="container-fluid">
    <h4 class="mb-2 text-gray-800"><?php echo $titulo; ?></h4>

    <?php if (isset($validation)) {?>
        <div class="alert alert-danger">
            <?php echo $validation->listErrors(); ?>
        </div>
    <?php }?>

    <form method="POST" action="<?php echo base_url(); ?>/cajas/actualizar" autocomplete="off">
    <input type="hidden" value="<?php echo $cajas['id'];?>" name="id"> 
    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label>Numero de caja</label>
                <input class="form-control" id="numero_caja" name="numero_caja" type="text" value="<?php echo $cajas['numero_caja']; ?>" autofocus required>
            </div>

            <div class="col-12 col-sm-6">
                <label>Nombre</label>
                <input class="form-control" id="nombre" name="nombre" value="<?php echo $cajas['nombre']; ?>" type="text" required>
            </div>
            
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label>Folio</label>
                <input class="form-control" id="folio" name="folio" type="text" value="<?php echo $cajas['folio']; ?>" required>
            </div>
        </div>
    </div>
    <button tyoe="submit" class="btn btn-success float-right ml-2">Guardar</button>
    <a href="<?php echo base_url(); ?>/cajas" class="btn btn-primary float-right">Regresar</a>
    </form>
</div>



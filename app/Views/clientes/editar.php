<div class="container-fluid">
    <h4 class="mb-2 text-gray-800"><?php echo $titulo; ?></h4>

    <?php if (isset($validation)) {?>
        <div class="alert alert-danger">
            <?php echo $validation->listErrors(); ?>
        </div>
    <?php }?>

    <form method="POST" action="<?php echo base_url(); ?>/clientes/actualizar" autocomplete="off">
    
    <input type="hidden" value="<?php echo $cliente['id'];?>" name="id"> 
    <div class="form-group">
        <div class="row">
        <div class="col-12 col-sm-6">
                <label>Nombre</label>
                <input value="<?php echo $cliente['nombre'];?>" class="form-control" id="nombre" name="nombre" type="text"  autofocus required>
            </div>

            <div class="col-12 col-sm-6">
                <label>Direccion</label>
                <input class="form-control" id="direccion" name="direccion" type="text" value="<?php echo $cliente['direccion'];?>" required>
            </div>

            <div class="col-12 col-sm-6">
                <label>Telefono</label>
                <input class="form-control" id="telefono" name="telefono" value="<?php echo $cliente['telefono'];?>"  type="text" required>
            </div>

            <div class="col-12 col-sm-6">
                <label>Correo</label>
                <input class="form-control" id="correo" name="correo" value="<?php echo $cliente['correo'];?>" type="text" required>
            </div>
        </div>
    </div>
    <button tyoe="submit" class="btn btn-success float-right ml-2">Guardar</button>
    <a href="<?php echo base_url(); ?>/clientes" class="btn btn-primary float-right">Regresar</a>
    </form>
</div>



<div class="container-fluid">
    <h4 class="mb-2 text-gray-800"><?php echo $titulo; ?></h4>

    <form method="POST" action="<?php echo base_url(); ?>/usuarios/actualizar" autocomplete="off">

    <input type="hidden" name="id" id="id" value="<?php echo $usuarios['id']; ?>">
    
    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label>Usuario</label>
                <input class="form-control" id="usuario" name="usuario" type="text" value="<?php echo $usuarios['usuario']; ?>" autofocus required>
            </div>

            <div class="col-12 col-sm-6">
                <label>Nombre</label>
                <input class="form-control" id="nombre" name="nombre" value="<?php echo $usuarios['nombre']; ?>" type="text" required>
            </div>
            
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label>Caja</label>
                <select class="form-control" name="id_caja" id="id_caja" required>
                    <option value="">Seleccionar caja</option>
                    <?php foreach ($cajas as $caja) {?>
                        <option value="<?php echo $caja['id']; ?>"<?php if ($caja['id'] == $usuarios['id_caja']) {echo 'selected';}?>><?php echo $caja['nombre']; ?></option>
                    <?php }?>
                </select>
            </div>
            <div class="col-12 col-sm-6">
                <label>Rol</label>
                <select class="form-control" name="id_rol" id="id_rol" required>
                    <option value="">Seleccionar rol</option>
                    <?php foreach ($roles as $rol) {?>
                        <option value="<?php echo $rol['id']; ?>"<?php if ($rol['id'] == $usuarios['id_rol']) {echo 'selected';}?>><?php echo $rol['nombre']; ?></option>
                    <?php }?>
                </select>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success float-right  ml-2">Guardar</button>
    <a href="<?php echo base_url(); ?>/usuarios" class="btn btn-primary float-right">Regresar</a>
    </form>
</div>




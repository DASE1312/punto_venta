<div class="container-fluid">
    <h4 class="mb-2 text-gray-800"><?php echo $titulo; ?></h4>
    <form method="POST" action="<?php echo base_url(); ?>/categorias/actualizar" autocomplete="off">
    <input type="hidden" value="<?php echo $datos['id'];?>" name="id"> 
    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label for="">Nombre</label>
                <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo $datos['nombre'];?>" autofocus require>
            </div>
        </div>
    </div>
    <button tyoe="submit" class="btn btn-success float-right">Guardar</button>
    <a href="<?php echo base_url(); ?>/categorias" class="btn btn-primary float-right ml-2">Regresar</a>
    </form>
</div>



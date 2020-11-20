<div class="container-fluid">
    <h4 class="mb-2 text-gray-800"><?php echo $titulo; ?></h4>
    <form method="POST" action="<?php echo base_url(); ?>/categorias/insertar" autocomplete="off">
    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label for="">Nombre</label>
                <input class="form-control" id="nombre" name="nombre" type="text" autofocus require>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success float-right ml-2">Guardar</button>
    <a href="<?php echo base_url(); ?>/categorias" class="btn btn-primary float-right">Regresar</a>
    </form>
</div>




<div class="container-fluid">
    <h4 class="mb-2 text-gray-800"><?php echo $titulo; ?></h4>
    <?php \Config\Services::validation()->listErrors();?>
    <form method="POST" action="<?php echo base_url(); ?>/productos/insertar" autocomplete="off">
    <?php csrf_field();?>

    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label for="">Codigo</label>
                <input class="form-control" id="codigo" name="codigo" type="text" autofocus required>
            </div>
            <div class="col-12 col-sm-6">
                <label for="">Nombre</label>
                <input class="form-control" id="nombre" name="nombre" type="text" required>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label for="">Unidad</label>
                <select class="form-control" name="id_unidad" id="id_unidad" required>
                    <option value="">Seleccionar Unidad</option>
                    <?php foreach ($unidades as $unidad) {?>
                        <option value="<?php echo $unidad['id']; ?>"><?php echo $unidad['nombre']; ?></option>
                    <?php }?>
                </select>
            </div>
            <div class="col-12 col-sm-6">
                <label for="">Categorias</label>
                <select class="form-control" name="id_categoria" id="id_categoria" required>
                    <option value="">Seleccionar Categoria</option>
                    <?php foreach ($categorias as $categoria) {?>
                        <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></option>
                    <?php }?>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label for="">Precio_venta</label>
                <input class="form-control" id="precio_venta" name="precio_venta" type="text" autofocus required>
            </div>
            <div class="col-12 col-sm-6">
                <label for="">Precio_compra</label>
                <input class="form-control" id="precio_compra" name="precio_compra" type="text" required>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label for="">Stock_minimo</label>
                <input class="form-control" id="stock_minimo" name="stock_minimo" type="text" autofocus required>
            </div>
            <div class="col-12 col-sm-6">
                <label for="">Es inventariable</label>
                <select name="inventariable" id="inventariable" class="form-control">
                    <option value="1">Si</option>
                    <option value="1">No</option>
                </select>
            </div>
        </div>
    </div>

    <a href="<?php echo base_url(); ?>/productos" class="btn btn-primary">Regresar</a>
    <button tyoe="submit" class="btn btn-success">Guardar</button>
    </form>
</div>




<div class="container-fluid">
    <h4 class="mb-2 text-gray-800"><?php echo $titulo; ?></h4>
    
    <form method="POST" action="<?php echo base_url(); ?>/productos/actualizar" autocomplete="off">
   

    <input type="hidden" name="id" id="id" value="<?php echo $producto['id']; ?>">

    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label for="">Codigo</label>
                <input class="form-control" value="<?php echo $producto['codigo']; ?>" id="codigo" name="codigo" type="text" autofocus required>
            </div>
            <div class="col-12 col-sm-6">
                <label for="">Nombre</label>
                <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo $producto['nombre']; ?>" required>
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
                        <option value="<?php echo $unidad['id']; ?>"<?php if ($unidad['id'] == $producto['id_unidad']) {echo 'selected';}?>><?php echo $unidad['nombre']; ?></option>
                    <?php }?>
                </select>
            </div>
            <div class="col-12 col-sm-6">
                <label for="">Categorias</label>
                <select class="form-control" name="id_categoria" id="id_categoria" required>
                    <option value="">Seleccionar Categoria</option>
                    <?php foreach ($categorias as $categoria) {?>
                        <option value="<?php echo $categoria['id']; ?>"<?php if ($categoria['id'] == $producto['id_categoria']) {echo 'selected';}?>><?php echo $categoria['nombre']; ?></option>
                    <?php }?>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label for="">Precio_venta</label>
                <input class="form-control" value="<?php echo $producto['precio_venta']; ?>" id="precio_venta" name="precio_venta" type="text" required>
            </div>
            <div class="col-12 col-sm-6">
                <label for="">Precio_compra</label>
                <input class="form-control" id="precio_compra" value="<?php echo $producto['precio_compra']; ?>" name="precio_compra" type="text" required>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label for="">Stock_minimo</label>
                <input class="form-control" value="<?php echo $producto['stock_minimo']; ?>" id="stock_minimo" name="stock_minimo" type="text" required>
            </div>
            <div class="col-12 col-sm-6">
                <label for="">Es inventariable</label>
                <select name="inventariable" id="inventariable" value="<?php echo $producto['inventariable']; ?>" class="form-control">
                    <option value="1" <?php if ($producto['inventariable'] == 1) {echo 'selected';}?>>Si</option>
                    <option value="0" <?php if ($producto['inventariable'] == 0) {echo 'selected';}?>>No</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label>Imagen del producto</label><br />
                <img class="img-responsive" width="200" src="<?php echo base_url().'/img/productos/'.$producto['id'].'.jpeg'; ?>" alt=""><br />
                <input type="file" name="img_productos" id="img_productos" accept="image/jpeg">
                <p class="text-danger">Cargar en imagen en formato png en 150x150 pixeles</p>
            </div>
        </div>
    </div>

    <a href="<?php echo base_url(); ?>/productos" class="btn btn-primary">Regresar</a>
    <button tyoe="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
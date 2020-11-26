<div class="container-fluid">

    <form method="POST" action="<?php echo base_url(); ?>/compras/guardar" autocomplete="off">
    
    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-4">
                
                <label>Codigo</label>

                <input class="form-control" id="codigo" name="codigo" type="text" onkeyup="buscarProducto(event,this,this.value)" autofocus placeholder="Esribe el codigo y presiona enter">

                <label for="codigo" id="resultado_error" style="color:red"></label>
            </div>

            <div class="col-12 col-sm-4">
                <label>Nombre</label>
                <input class="form-control" id="nombre" name="nombre"  type="text" disabled>
            </div>

            <div class="col-12 col-sm-4">
                <label>Cantidad</label>
                <input class="form-control" id="cantidad" name="cantidad"  type="text">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-4">
                <label>Precio de compra</label>
                <input class="form-control" id="precio_compra" name="precio_compra" type="text" disabled autofocus>
            </div>
            <div class="col-12 col-sm-4">
                <label>Subtotal</label>
                <input class="form-control" id="subtotal" name="subtotal"  type="text" disabled>
            </div>
            <div class="col-12 col-sm-4">
                <label><br>&nbsp;</label>
                <button class="btn btn-primary" type="button" id="agregar_producto" name="agregar_producto">Agregar Producto</button>
            </div>
        </div>
    </div>
    <div class="table-responsive table-sm table table-hover table-striped">
        <table id="tablaProductos" class="table table-bordered tablaProductos" width="100%" cellspacing="0">
            <thead>
                <tr class="thead-dark">
                    <th>#</th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th width="1%"></th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 offset-md-7">
            <label style="font-weight: bold; font-size: 30px; text-align: center;">Total $</label>
            <input id="total" name="total" size="7" type="text" readonly="true" value="0.00" style="font-weight: bold; font-size: 30px; text-align: center;">
            <button type="button" id="completar_compra" class="btn btn-success">Completar Compra</button>
        </div>
    </div>
    </form>
</div>

<script src="<?php echo base_url(); ?>/assets/javascript/functions_carro_compra.js"></script>




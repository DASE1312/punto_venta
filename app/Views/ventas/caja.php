<?php
$id_venta = uniqid();
?>
<div class="container-fluid">
<br>

    <form class="form-horizontal" method="POST" id="form_venta" name="form_venta" action="<?php echo base_url(); ?>/ventas/guardar" autocomplete="off">
    <input type="hidden" name="id_venta" id="id_venta" value="<?php echo $id_venta; ?>">


    <div class="form-group">
        <div class="row">
        <div class="col-12 col-sm-6">
                    <div class="ui-widget">
                        <label>Cliente:</label>
                        <input type="hidden" name="id_cliente" id="id_cliente" value="1">
                        <input class="form-control" type="text" name="cliente" id="cliente" placeholder="Escribe el nombre del cliente" value="Publico en general" onkeyup="" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <label>Forma de pago:</label>
                    <select id="forma_pago" name="forma_pago" class="form-control" required>
                        <option value="001">Efectivo</option>
                        <option value="002">tarjeta</option>
                        <option value="003">Transferencia</option>
                    </select>
                </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-6">
                <input type="hidden" id="id_producto" name="id_producto">
                <label>Codigo de barras</label>
                <input class="form-control" id="codigo" name="codigo" onkeyup="agregarProductoV(event,this.value,1,'<?php echo $id_venta; ?>')" type="text" autofocus placeholder="Escribe el codigo y presiona enter" autofocus>
            </div>
            <div class="col-12 col-sm-6 offset-md-7">
                <label style="font-weight: bold; font-size: 30px; text-align: center;">Total $</label>
                <input id="total" name="total" size="7" type="text" readonly="true" value="0.00" style="font-weight: bold; font-size: 30px; text-align: center;">
                <button type="button" id="completar_venta" class="btn btn-success">Completar Venta</button>
            </div>
        </div>
    </div>

    <div class="table-responsive table-sm table table-hover table-striped">
        <table id="tablaProductos" class="table table-bordered tablaProductos" width="100%">
            <thead class="thead-dark">
                    <th>#</th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th width="1%"></th>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    </form>
</div>

<script src="<?php echo base_url(); ?>/assets/javascript/functions_carro_ventas.js"></script>
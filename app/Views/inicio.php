<div class="container-fluid">
    <br>

    <div class="row">
        <div class="col-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <?php echo $total; ?> Total de productos
                </div>
                <a href="<?php echo base_url(); ?>/productos" class="card-footer text-white bg-primary">Ver detalles</a>
            </div>
        </div>

        <div class="col-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    $<?php echo $totalVentas['total']; ?> Ventas del dia
                </div>
                <a href="<?php echo base_url(); ?>/ventas" class="card-footer text-white bg-success">Ver detalles</a>
            </div>
        </div>

        <div class="col-4">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <?php echo $minimos; ?> Productos con stock minimo
                </div>
                <a href="<?php echo base_url(); ?>/productos/mostrar_minimos" class="card-footer text-white bg-danger">Ver detalles</a>
            </div>
        </div>
    
    </div>
</div>

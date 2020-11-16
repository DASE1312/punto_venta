<div class="container-fluid">
    <h4 class="mb-2 text-gray-800"><?php echo $titulo; ?></h4>
    <div>
        <p>
            <a href="<?php echo base_url(); ?>/productos" class="btn btn-warning">Productos</a>
        </p>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>Id</th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Existencia</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos as $dato){ ?>
                    <tr>
                    <td><?php echo $dato['id']; ?></td>
                        <td><?php echo $dato['codigo']; ?></td>
                        <td><?php echo $dato['nombre']; ?></td>
                        <td><?php echo $dato['precio_venta']; ?></td>
                        <td><?php echo $dato['existencia']; ?></td>


                        <td><a href="#" data-href="<?php echo base_url().'/productos/reingresar/'.$dato['id']; ?>" data-toggle="modal" data-target="#modal_confirma" data-placement="top" title="Reingresar registro registro" ><i class="fas fa-arrow-alt-circle-up"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reingresar registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Desea reingresar este registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <a type="button" class="btn btn-danger btn-ok">Si</a>
            </div>
        </div>
    </div>
</div>



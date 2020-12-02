<div class="container-fluid">
    <h4 class="mb-2 text-gray-800"><?php echo $titulo; ?></h4>
    <div>
        <p>
            <a href="<?php echo base_url(); ?>/productos/nuevo" class="btn btn-info">Agregar</a>
            <a href="<?php echo base_url(); ?>/productos/eliminados" class="btn btn-warning">Eliminados</a>
        </p>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Codigo</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Existencia</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos as $dato){ ?>
                    <tr>
                        <td><?php echo $dato['id']; ?></td>
                        <td><?php echo $dato['codigo']; ?></td>

                        <td><img src="<?php echo base_url().'/img/productos/'.$dato['id'].'.jpeg'; ?>" width="100" alt=""></td>

                        <td><?php echo $dato['nombre']; ?></td>
                        <td><?php echo $dato['precio_venta']; ?></td>
                        <td><?php echo $dato['existencia']; ?></td>

                        <td><a href="<?php echo base_url().'/productos/editar/'.$dato['id'];?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a></td>

                        <td><a href="#" data-href="<?php echo base_url().'/productos/eliminar/'.$dato['id']; ?>" data-toggle="modal" data-target="#modal_confirma" data-placement="top" title="Eliminar registro" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
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
                <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Desea eliminar este registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <a type="button" class="btn btn-danger btn-ok">Si</a>
            </div>
        </div>
    </div>
</div>



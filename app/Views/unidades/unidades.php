
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h4 class="mb-2 text-gray-800"><?php echo $titulo; ?></h4>
                    <div>
                        <p>
                            <a href="<?php echo base_url(); ?>/unidades/nuevo" class="btn btn-info">Agregar</a>
                            <a href="<?php echo base_url(); ?>/unidades/eliminados" class="btn btn-warning">Eliminados</a>
                        </p>
                    </div>
                    <!-- DataTales Example -->
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Nombre corto</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($datos as $dato){ ?>
                                            <tr>
                                                <td><?php echo $dato['id']; ?></td>
                                                <td><?php echo $dato['nombre']; ?></td>
                                                <td><?php echo $dato['nombre_corto']; ?></td>

                                                <td><a href="<?php echo base_url();  ?>/unidades/editar/"<?php echo $dato['id'];  ?> class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a></td>

                                                <td><a href="<?php echo base_url(); ?>/unidades/eliminar/"<?php echo $dato['id']; ?> class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                                               
                        
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>




                <!-- /.container-fluid -->

         
            </div>
            <!-- End of Main Content -->


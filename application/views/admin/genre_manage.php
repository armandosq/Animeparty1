<div class="card">
    <div class="row">
        <div class="col-sm-12">
            <button data-toggle="modal" data-target="#mymodal" data-id="<?php echo base_url() . 'admin/view_modal/genre_add';?>" id="menu" class="btn btn-sm btn-primary waves-effect waves-light"><span class="btn-label"><i class="fa fa-plus"></i></span>Agregar Genero</button>
            <br>
            <br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Nombre</th>
                        <th>Icono</th>
                        <th>Slug</th>
                        <th>Descripcion</th>
                        <th>Premium</th>
                        <th>Estado</th>
                        <th>Opcion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sl = 1;
                        foreach ($genres as $genre):                    

                    ?>
                    <tr id='row_<?php echo $genre['genre_id'];?>'>
                        <td><?php echo $sl++;?></td>
                        <td><strong><?php echo $genre['name'];?></strong></td>
                        <td><img class="img img-responsive img-thumbnail bg-gray-50" width="80" src="<?php echo $this->common_model->get_genre_image_url($genre['genre_id']);?>"></td>
                        <td><?php echo $genre['slug'];?></td>
                        <td><?php echo $genre['description'];?></td>
                        <td>
                            <?php
                                if($genre['featured']=='1'){
                                    echo '<span class="label label-primary label-xs">Featured</span>';
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                            if($genre['publication']=='1'){
                                echo '<span class="label label-primary label-xs">Published</span>';
                            }
                            else{
                                echo '<span class="label label-warning label-mini">Unublished</span>';
                            }

                                ?>
                        </td>
                        
                        <td>
                            <div class="btn-group m-b-20"> <a data-toggle="modal" data-target="#mymodal" data-id="<?php echo base_url() . 'admin/view_modal/genre_edit/'. $genre['genre_id'];?>" id="menu" title="Editar" class="btn btn-icon"><i class="fa fa-pencil"></i></a> <a title="Borrar" class="btn btn-icon" onclick="delete_row(<?php echo " 'genre' ".','.$genre['genre_id'];?>)" class="delete"><i class="fa fa-remove"></i></a> </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <!-- end col-12 -->
    </div>
</div>
    
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/parsleyjs/dist/parsley.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>

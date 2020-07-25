<div class="card">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
             
                   
                    <br>
                </div>
                <div class="col-md-9">
                    <form class="form-inline pull-right" method="get" action="<?php echo base_url('admin/manage_user') ?>">
                        <div class="form-group mx-sm-3 mb-2 ">
                            <label for="title" class="sr-only">Nombre</label>
                            <input type="text" name="name" value="<?php if(isset($name)){ echo $name;} ?>" class="form-control" id="title" placeholder="User Name">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2"><span class="btn-label"><i class="fa fa-search"></i></span>Buscar</button>
                    </form>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>opcion</th>
                        <th>Nombre Completo</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Inicio actual</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sl = 1;
                        foreach ($users as $user):                     

                    ?>
                    <tr id='row_<?php echo $user['user_id'];?>'>
                        <td><?php echo $sl++;?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-white btn-sm dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                <ul class="dropdown-menu" role="menu">
                                  
                                  <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#mymodal" data-id="<?php echo base_url() . 'admin/view_modal/user_edit/'. $user['user_id'];?>" id="menu" title="Editar">Editar</a></li>
                                  <li><a class="dropdown-item" href="#" title="Eliminar" onclick="delete_row(<?php echo " 'user' ".','.$user['user_id'];?>)" class="delete">Eliminar</a></li>
                                </ul>
                            </div>
                        </td>
                        <td><strong><?php echo $user['name'];?></strong></td>
                        <td><?php echo $user['email'];?></td>
                        <td><?php echo $user['role'];?></td>
                        <td><?php echo date("d-m-Y, H:i:s",strtotime($user['last_login']));?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/parsleyjs/dist/parsley.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>

<!-- select2-->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/select2/select2.min.js" type="text/javascript"></script>
<!-- select2-->
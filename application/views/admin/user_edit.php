<?php
$users    = $this->db->get_where('user', array('user_id' => $param2))->result_array();
foreach ($users as $row) :
  ?>
  <?php echo form_open(base_url() . 'admin/manage_user/update/' . $param2, array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data')); ?>

  <h4 class="text-center"><?php echo trans('edit_user_information'); ?></h4>
  <hr>
  <div class="form-group">
    <label class="control-label">Nombre Completo</label>
    <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" placeholder="" />
  </div>
  <div class="form-group">
    <label class="control-label">Email</label>
    <input type="text" name="email" value="<?php echo $row['email']; ?>" class="form-control" placeholder="email" />
  </div>
  <div class="form-group">
    <label class="control-label">Contraseña</label>
    <input type="password" name="password" class="form-control" placeholder="" />
  </div>


  <div class="form-group">
    <label class="control-label">Rol</label>
    <select class="form-control" name="role" required>
      <option value="admin" <?php if ($row['role'] == "admin") {
                                echo "selected";
                              } ?>><?php echo trans('admin'); ?></option>
      <option value="subscriber" <?php if ($row['role'] == "subscriber") {
                                      echo "selected";
                                    } ?>>Usuario</option>
    </select>
  </div>
<?php endforeach; ?>
<div class="form-group">
  <div class="col-sm-offset-3 col-sm-9 m-t-15">
    <button type="submit" class="btn btn-sm btn-primary waves-effect"><span class="btn-label"><i class="fa fa-floppy-o"></i></span>Crear</button>
    <button type="" class="btn btn-sm btn-white m-l-5 waves-effect" data-dismiss="modal">Cerrar </button>
  </div>
</div>
</form>
<script>
  jQuery(document).ready(function() {
    $(".select2").select2();
    $('form').parsley();

  });
</script>
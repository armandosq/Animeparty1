<?php
$genres   = $this->db->get_where('genre', array('genre_id' => $param2))->result_array();
foreach ($genres as $row) :
    ?>
    <?php echo form_open(base_url() . 'admin/genre/update/' . $param2, array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data')); ?>

    <h4 class="text-center">Eidicion del Genero</h4>
    <hr>

    <div class="form-group">
        <label class=" col-sm-3 control-label">Nombre</label>
        <div class="col-sm-12">
            <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" required>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3">Descripcion</label>
        <div class="col-sm-12">
            <textarea class="wysihtml5 form-control" name="description" rows="10"><?php echo $row['description']; ?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-3">Icono</label>  
        <div class="col-sm-12" >
            <div class="profile-info-name text-center"> <img id="thumb_image" src="<?php echo $this->common_model->get_genre_image_url($row['genre_id']); ?>" class="img-thumbnail bg-gray-50" alt="genre" width="120"> </div>
            <br>
            <div id="thumbnail_content">
            <input type="file" id="thumbnail_file" onchange="showImg(this);" name="image" class="filestyle" data-input="false" accept="image/*"></div><br>
            <p class="btn btn-white" id="thumb_link" href="#"><span class="btn-label"><i class="fa fa-link"></i></span>Link</p>
            <p class="btn btn-white" id="thumb_file" href="#"><span class="btn-label"><i class="fa fa-file-o"></i></span>Archivo</p><br>
            <small><?php echo trans('genre_country_icon_note');?></small>
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-md-3">Premium</label>
        <div class="col-sm-12">
            <select class="form-control m-bot15" name="featured">
                <option value="1" <?php if ($row['featured'] == '1') {
                                            echo 'selected';
                                        } ?>>Pro</option>
                <option value="0" <?php if ($row['featured'] == '0') {
                                            echo 'selected';
                                        } ?>>NULL XD</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3">Publicacion</label>
        <div class="col-sm-12">
            <select class="form-control m-bot15" name="publication">
                <option value="1" <?php if ($row['publication'] == '1') {
                                            echo 'selected';
                                        } ?>>Publicado</option>
                <option value="0" <?php if ($row['publication'] == '0') {
                                            echo 'selected';
                                        } ?>>No Publicado</option>
            </select>
        </div>
    </div>

<?php endforeach; ?>
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-9 m-t-15">
        <button type="submit" class="btn btn-sm btn-primary waves-effect"> <span class="btn-label"><i class="fa fa-floppy-o"></i></span>Guardar </button>
        <button type="" class="btn btn-sm btn-white m-l-5 waves-effect" data-dismiss="modal">Cerrar </button>
    </div>
</div>
</form>
<script>
    jQuery(document).ready(function() {
        $('form').parsley();

    });
</script>

<script>
  jQuery(document).ready(function(){
    $('#thumb_link').click(function(){
      $('#thumbnail_content').html('<input type="text" name="image_link" class="form-control">');
    });

    $('#thumb_file').click(function(){
      $('#thumbnail_content').html('<input type="file" id="thumbnail_file" onchange="showImg(this);" name="image" class="filestyle" data-input="false" accept="image/*"></div>');
    });

  });
</script>

<!--instant image display--> 
<script type="text/javascript">
 function showImg(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#thumb_image')
                .attr('src', e.target.result)                        
        };
        reader.readAsDataURL(input.files[0]);
      }
  }
</script> 
<!--end instant image display--> 
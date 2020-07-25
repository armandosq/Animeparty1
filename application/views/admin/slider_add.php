<style type="text/css">
  span.select2.select2-container.select2-container--default.select2-container--below,span.select2.select2-container.select2-container--default.select2-container--focus,span.select2.select2-container.select2-container--default.select2-container--open,span.select2.select2-container.select2-container--default {
      width: 100% !important;
  }
</style>

<?php echo form_open(base_url() . 'admin/slider/add/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?>

<h4 class="text-center">Nuevo Slider</h4>
<hr>

<div class="form-group">
  <label class=" col-sm-12 control-label">Titulo</label>
  <div class="col-sm-12">
      <input type="text" name="title" class="form-control" required>
  </div>
</div>

<div class="form-group">
  <label class="control-label col-md-12">Descripcion</label>
  <div class="col-sm-12">
      <textarea class="wysihtml5 form-control" name="description" rows="10"></textarea>
  </div>
</div>

<div class="form-group">
  <label class="control-label col-md-12">Orden</label>
  <div class="col-sm-12">
      <input type="number" name="order" value="0" class="form-control" required>
  </div>
</div>

<div class="form-group">
  <label class="control-label col-sm-12">Imagen</label>
  <div class="col-sm-12" >
    <div class="profile-info-name text-center"> <img id="thumb_image" src="<?php echo base_url('uploads/default_image/slide.jpg'); ?>" class="img-thumbnail" alt="" > </div>
    <br>
    <div id="thumbnail_content">
    <input type="file" id="thumbnail_file" onchange="showImg(this);" name="image" class="filestyle" data-input="false" accept="image/*"></div><br>
    <p class="btn btn-white" id="thumb_link" href="#"><span class="btn-label"><i class="fa fa-link"></i></span>Link</p>
    <p class="btn btn-white" id="thumb_file" href="#"><span class="btn-label"><i class="fa fa-file-o"></i></span>Archivo</p>
  </div>
</div>

<div class="form-group">
    <label class="control-label col-md-12" >Accion</label>
    <div class="col-sm-12">
        <select class="form-control m-bot15" name="action_type" id="action_type">
          <option value="movie">Pelicula</option>
          <option value="tvseries">Animes</option>
        </select>
    </div>
</div>

<div class="form-group" id="movie" style="display: none;">
  <label class="control-label col-md-12">Pelicula</label>
  <div class="col-sm-12">
    <select class="form-control" name="movie_id" id="select_movie"></select>
  </div>
</div>

<div class="form-group" id="tvseries" style="display: none;">
  <label class="control-label col-md-12">Animes</label>
  <div class="col-sm-12">
    <select class="form-control" name="tvseries_id" id="select_tvseries"></select>
  </div>
</div>
<div id="url">
  <div class="form-group">
    <label class=" col-sm-12 control-label">URL</label>
    <div class="col-sm-12">
        <input type="url" name="action_url" class="form-control">
    </div>
  </div>
</div>

<div class="form-group">
  <label class=" col-sm-12 control-label">Accion</label>
  <div class="col-sm-12">
      <input type="text" name="action_btn_text" value="Play" class="form-control" required>
  </div>
</div>

                    
<div class="form-group">
    <label class="control-label col-md-12">Publicacion</label>
    <div class="col-sm-12">
        <select class="form-control m-bot15" name="publication">
        <option value="1">Publicado</option>
        <option value="0">No Publicado</option>
        </select>
    </div>
</div>

<div class="form-group">
  <div class="col-sm-offset-3 col-sm-9 m-t-15">
    <button type="submit" class="btn btn-sm btn-primary waves-effect"> <span class="btn-label"><i class="fa fa-plus"></i></span>Crear </button>
    <button type="" class="btn btn-sm btn-white m-l-5 waves-effect" data-dismiss="modal">Cerrar </button>
  </div>
</div>
</form>
<script>
  jQuery(document).ready(function() {
    $('#action_type').on('change', function() {
      if( this.value == 'movie'){
        $("#movie").show();
        $("#tvseries").hide();
        $("#tv").hide();
        $("#url").hide();
      }else if(this.value == 'tvseries'){
        $("#movie").hide();
        $("#tvseries").show();
        $("#tv").hide();
        $("#url").hide();
      }else if(this.value == 'tv'){
        $("#movie").hide();
        $("#tvseries").hide();
        $("#tv").show();
        $("#url").hide();
      }else if(this.value == 'external_browser' || this.value == 'webview'){
        $("#movie").hide();
        $("#tvseries").hide();
        $("#tv").hide();
        $("#url").show();
      }
    });

    $('form').parsley(); 
  });
</script>
<script src="<?php echo base_url() ?>assets/plugins/select2/select2.min.js" type="text/javascript"></script>
<script type="text/javascript">
  $('#select_movie').select2({
    placeholder: 'Select Movie',
    minimumInputLength: 2,
    ajax: {
      url: '<?=base_url('admin/load_movie')?>',
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results: data
        };
      },
      cache: true
    }
  });
</script>

<script type="text/javascript">
  $('#select_tvseries').select2({
    placeholder: 'Select TVSeries',
    minimumInputLength: 2,
    ajax: {
      url: '<?=base_url('admin/load_tvseries')?>',
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results: data
        };
      },
      cache: true
    }
  });
</script>

<script type="text/javascript">
  $('#select_tv').select2({
    placeholder: 'Select TV Channel',
    minimumInputLength: 2,
    ajax: {
      url: '<?=base_url('admin/get_live_tv_by_search_title')?>',
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results: data
        };
      },
      cache: true
    }
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

<!--instant image dispaly--> 
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
<!--end instant image dispaly--> 

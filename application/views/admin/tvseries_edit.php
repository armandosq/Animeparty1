<style type="text/css">
    .p-a {
        padding: 10px;
    }

    .bootstrap-tagsinput .badge {
        ;
        background-color: #009688;
        border: 1px solid #035d54;
    }

    button.close {
        padding: 0px;
    }
</style>

<?php
$videos   = $this->db->get_where('videos', array('videos_id' => $param1))->result_array();
foreach ($videos as $video) :
    echo form_open(base_url() . 'admin/tvseries/update/' . $param1, array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));
    ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card cta cta--featured p-a">
                <div class="card-block">
                    <h3 class="card-title no-margin-top">Informacion</h3>
                </div>
                <span class="header-line"></span>
                <div class="card-block">
                    <input type="hidden" name="imdbid" id="imdbid">
                    <div class="form-group">
                        <label class=" control-label">Titulo</label>
                        <input type="text" name="title" value="<?php echo $video['title'] ?>" id="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Slug (<?php echo base_url(); ?>)</label>
                        <input type="text" id="slug" name="slug" value="<?php echo $video['slug'] ?>" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Descripcion</label>
                        <textarea class="wysihtml5 form-control" name="description" id="description" rows="10"><?php echo $video['description'] ?></textarea>
                    </div>
                   
                    <div class="form-group">
                        <label class="control-label">Emision</label>
                        <input type="text" name="rating" value='<?php echo $video['imdb_rating']; ?>' id="rating" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Fecha de Estreno</label>
                        <input  class="wysihtml5 form-control" name="meta_description" id="meta_description" rows="8">
                <?php echo $video['meta_description']; ?>
            
                    </div>

                    <div class="form-group">
                        <label class="control-label">Año</label>
                        <div class="input-group">
                            <input type="text" name="release" id="release_date" class="form-control" value="<?php echo $video['release']; ?>">
                            <span class="input-group-addon bg-custom b-0 text-white"><i class="fa fa-calendar" aria-hidden="true"></i></span> </div>
                        <!-- input-group -->
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">Genero</label>
                        <select class="form-control select2" name="genre[]" multiple="multiple" id="genre">
                            <?php $genre = $this->db->get('genre')->result_array();
                                foreach ($genre as $v_genre) : ?>
                                <option value="<?php echo $v_genre['genre_id']; ?>" <?php if (preg_match('/\b' . $v_genre['genre_id'] . '\b/', $video['genre'])) {
                                                                                                echo "selected";
                                                                                            } ?>><?php echo $v_genre['name']; ?></option>
                                <option value="<?php echo $v_genre['genre_id']; ?>"><?php echo $v_genre['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                   
                    
                    <div class="form-group">
                        <label class="control-label">Calidad</label>
                        <select class="form-control m-bot15" name="video_quality">
                            <?php $quality = $this->db->get_where('quality', array('status' => '1'))->result_array();
                                foreach ($quality as $quality) : ?>
                                <option value="<?php echo $quality['quality'] ?>" <?php if ($quality['quality'] == $video['video_quality']) {
                                                                                                echo 'selected';
                                                                                            } ?>><?php echo $quality['quality'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Publicar?</label>
                        <div class="toggle">
                            <label>
                                <input type="checkbox" name="publication" <?php if ($video['publication'] == '1') {
                                                                                    echo 'checked';
                                                                                } ?>><span class="button-indecator"></span>
                            </label>
                        </div>
                    </div>

                   <div class="form-group">
                        <label class="control-label">Activar Descargas</label>
                        <div class="toggle">
                            <label>
                                <input type="checkbox" name="enable_download" <?php if ($video['enable_download'] == '1') {
                                                                                        echo 'checked';
                                                                                    } ?>><span class="button-indecator"></span>
                            </label>
                        </div>
                    </div> 
                    <div class="form-group">
                      <label class="control-label">Gratis/Pago</label>
                        <select  class="form-control"  name="is_paid">
                          <option value="0"  <?php if($video['is_paid'] =='0'){ echo "selected";} ?>>Gratis</option>
                          <option value="1" <?php if($video['is_paid'] =='1'){ echo "selected";} ?>>Pago</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 pull-left">
                            <a href="<?php echo base_url() . 'admin/videos/#' . $param1 ?>" class="link m-l-15 text-left">Atras</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card cta cta--featured p-a">
                <div class="card-block">
                    <h3 class="card-title no-margin-top">Poster</h3>
                </div>
                <span class="header-line"></span>
                <div class="card-block">
                    <div class="form-group">
                        <label class="control-label"></label>
                        <div class="profile-info-name text-center"> <img id="thumb_image" src="<?php echo $this->common_model->get_video_thumb_url($param1) . '?' . time(); ?>" width="150" class="img-thumbnail" alt=""> </div>
                        <br>
                        <div id="thumbnail_content">
                            <input type="file" id="thumbnail_file" onchange="showImg(this);" name="thumbnail" class="filestyle" data-input="false" accept="image/*"></div><br>
                        <p class="btn btn-white" id="thumb_link" href="#"><span class="btn-label"><i class="fa fa-link"></i></span>
                            <?php echo trans('link') ?>
                        </p>
                        <p class="btn btn-white" id="thumb_file" href="#"><span class="btn-label"><i class="fa fa-file-o"></i></span>
                            <?php echo trans('file') ?>
                        </p>

                    </div>

                    <div class="form-group">
                        <label class="control-label">Poster</label>
                        <div class="profile-info-name text-center"> <img id="poster_image" src="<?php echo $this->common_model->get_video_poster_admin_url($param1) . '?' . time(); ?>" width="350" class="img-thumbnail" alt=""> </div>
                        <br>
                        <div id="poster_content">
                            <input type="file" id="poster_file" onchange="showImg2(this);" name="poster_file" class="filestyle" data-input="false" accept="image/*"></div><br>
                        <p class="btn btn-white" id="poster_link" href="#"><span class="btn-label"><i class="fa fa-link"></i></span>
                            <?php echo trans('link') ?>
                        </p>
                        <p class="btn btn-white" id="poster_file_btn" href="#"><span class="btn-label"><i class="fa fa-file-o"></i></span>
                            <?php echo trans('file') ?>
                        </p>

                    </div>
                  
                    <br>
                    <div class="row">
                        <div class="col-sm-6 pull-right">
                            <button type="submit" class="btn btn-primary pull-right waves-effect"> <span class="btn-label"><i class="fa fa-floppy-o"></i></span>Guardar</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <?php echo form_close(); ?>
<?php endforeach; ?>

<!-- <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.form.min.js"></script>
<script>
    jQuery(document).ready(function() {
        $(".select2").select2();
        $('form').parsley();
        $('#release_date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });
        $(":file").filestyle({
            input: false
        });
    });
</script>
<!--instant image dispaly-->
<script type="text/javascript">
    function showImg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#thumb_image')
                    .attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script type="text/javascript">
    function showImg2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#poster_image')
                    .attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<!--end instant image dispaly-->

<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/parsleyjs/dist/parsley.min.js"></script>


<script src="<?php echo base_url() ?>assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/typeahead.js/bloodhound.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/typeahead.js/typeahead.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/typeahead.js/typeahead.jquery.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/moment/moment.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/select2/select2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/summernote/dist/summernote.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/date.js"></script>

<script>
    jQuery(document).ready(function() {
        $('#focus_keyword').tagsinput();
        $('#tags').tagsinput({
            typeahead: {
                source: ['Amsterdam', 'Washington', 'Sydney', 'Beijing', 'Cairo']
            }
        });
        $('#thumb_link').click(function() {
            $('#thumbnail_content').html('<input type="text" name="thumb_link" class="form-control">');
        });
        $('#thumb_file').click(function() {
            $('#thumbnail_content').html('<input type="file" id="thumbnail_file" onchange="showImg(this);" name="thumbnail" class="filestyle" data-input="false" accept="image/*"></div>');
            $(":file").filestyle({
                input: false
            });
        });

        $('#poster_link').click(function() {
            $('#poster_content').html('<input type="text" name="poster_link" class="form-control">');
        });
        $('#poster_file_btn').click(function() {
            $('#poster_content').html('<input type="file" id="poster_file" onchange="showImg2(this);" name="poster_file" class="filestyle" data-input="false" accept="image/*"></div>');
            $(":file").filestyle({
                input: false
            });
        });

        $('#description').summernote({
            height: 200, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

    });
</script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        $(document).on('click', '#import_btn', function() {
            $('#result').html('');
            var from = $("#from").val();
            var id = $("#imdb_id").val();
            if (from != '' && id != '') {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url() . "admin/import_movie"; ?>',
                    data: "id=" + encodeURIComponent(id) + "&from=" + encodeURIComponent(from),
                    dataType: 'json',
                    beforeSend: function() {
                        $("#import_btn").html('Fetching...');
                    },
                    success: function(response) {
                        var imdb_status = response.imdb_status;
                        var imdbid = response.imdbid;
                        var title = response.title;
                        var plot = response.plot;
                        var runtime = response.runtime;
                        var actor = JSON.parse("[" + response.actor + "]");
                        var director = JSON.parse("[" + response.director + "]");
                        var writer = JSON.parse("[" + response.writer + "]");
                        var country = JSON.parse("[" + response.country + "]");
                        var genre = JSON.parse("[" + response.genre + "]");
                        var rating = response.rating;;
                        var release = new Date(response.release).toString('yyyy-MM-dd');
                        var poster = response.poster;
                        if (imdb_status == 'success') {
                            $('#result').html('<div class="alert alert-success alert-dismissable m-t-15"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data imported successfully.</div>');
                            $("#title").val(title);
                            //slug
                            title = title.toLowerCase();
                            title = title.replace(/[^\w ]+/g, '');
                            title = title.replace(/ +/g, '-');
                            $("#slug").val(title);
                            $("#imdbid").val(imdbid);
                            $("#description").code('<p>' + plot + '</p>');
                            $("#runtime").val(runtime);
                            $('#actor').val(actor).trigger('change');
                            $("#director").val(director).trigger('change');
                            $("#writer").val(writer).trigger('change');
                            $("#country").val(country).trigger('change');
                            $("#genre").val(genre).trigger('change');
                            $("#rating").val(rating);
                            $("#release_date").datepicker("setDate", release);
                            $('#thumbnail_content').html('<input type="text" name="thumb_link" value="' + poster + '" class="form-control">');
                            $('#thumb_image').attr('src', poster);
                            $('#import_btn').html('Fetch');
                        } else {
                            $('#result').html('<div class="alert alert-danger alert-dismissable m-t-15"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No data found in database..</div>');
                            $('#import_btn').html('Fetch');
                        }
                    }
                });
            } else {
                alert('Please input IMDb/TMDB ID');
            }
        });
    });
</script>

<script>
    $("#title").keyup(function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^\w ]+/g, '');
        Text = Text.replace(/ +/g, '-');
        $("#slug").val(Text);
    });
</script>

<script>
    $(document).ready(function() {
        $("#add-sourch").click(function() {
            if ($('#source1').length > 0) {
                var main_content = $('div[id^="source"]:last');
                var num = parseInt(main_content.prop("id").match(/\d+/g), 10) + 1;
                var clone_content = main_content.clone().prop('id', 'source' + num);
                clone_content.insertAfter(main_content);
            } else {
                $('<div class="form-inline m-t-15" id="source1"><div class="form-group" id="_source1"><label class="control-label" id="sourcelabel1">Title</label>&nbsp;&nbsp;<input type="text" name="source_name[]" id="embed_link" class="form-control" placeholder="Name ex: server-2" required>&nbsp;&nbsp;<label class="control-label" id="sourcelabel1">URL</label>&nbsp;&nbsp;<input type="url" name="embed_link[]" id="embed_link" class="form-control" placeholder="http://server-2.com/movies/titalic.mp4" required>&nbsp;&nbsp;<button onClick="$(this).parent().parent().remove();" id="remove_btn" class="btn btn-danger" id="add-sourch"><i class="fa fa-close"></i></button></div><br><br>').insertAfter("#video-source");
            }
        });
    });
</script>
<script type="text/javascript">
    function loadAllActor() {
        var returnArray = [];
        var types = 'actor';
        $.ajax({
            url: '<?= base_url('admin/load_stars') ?>',
            type: 'post',
            data: {
                types: types
            },
            dataType: 'json',
            success: function(response) {
                var len = response.length;
                for (var i = 0; i < len; i++) {
                    var id = JSON.parse(response[i]['id']);
                    var name = response[i]['name'];
                    $("#actor").append("<option value='" + item + "'>" + item + "</option>");
                    returnArray[i]["id"] = id;
                    returnArray[i]["name"] = name;
                }
            }
        });
        return returnArray;
    }

    function load_actor() {
        $.get('<?php echo base_url() . "admin/load_stars2"; ?>', function(data) {
            $("#actor").html('');
            $("#actor").empty('');
            $('#actor').val('');
            $("#actor").html(data);
            console.log(data);
            $("#actor").select2("destroy");
            $("#actor").select2().trigger('change');
        });
    }

    function load_star() {
        var types = 'actor';
        $.ajax({
            url: '<?php echo base_url() . "admin/load_stars"; ?>',
            type: 'post',
            data: {
                types: types
            },
            dataType: 'json',
            success: function(response) {
                var len = response.length;
                $("#actor").empty();
                for (var i = 0; i < len; i++) {
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    $("#actor").append("<option value='" + id + "'>" + name + "</option>");
                    console.log(id + name);
                }
                $("#actor").select2("destroy").select2();
                $("#actor").trigger('change');
            }
        });
    }
</script>
</script>
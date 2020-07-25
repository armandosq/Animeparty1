<?php echo form_open(base_url() . 'admin/comments_setting/update/', array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data')); ?>
<div class="card">
    <div class="row">
        <!-- panel  -->
        <div class="col-md-12">
            <div class="panel panel-border panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                      Configuracion
                    </h3>
                </div>
                <div class="panel-body">
                    <!-- panel  -->
                    <div class="form-group">
                        <label class="control-label col-md-3">Metodo de Comentarios</label>
                        <div class="col-sm-6">
                            <select class="form-control m-bot15" id="comments_method" name="comments_method">
                                <option value="0" <?php if ($this->db->get_where('config', array('title' => 'comments_method'))->row()->value == '0') {
                                                        echo 'selected';
                                                    } ?>>Desactivado</option>
                                <option value="both" <?php if ($this->db->get_where('config', array('title' => 'comments_method'))->row()->value == 'both') {
                                                            echo 'selected';
                                                        } ?>>Both</option>
                                <option value="disqus" <?php if ($this->db->get_where('config', array('title' => 'comments_method'))->row()->value == 'disqus') {
                                                            echo 'selected';
                                                        } ?>>Disqus</option>
                                <option value="facebook" <?php if ($this->db->get_where('config', array('title' => 'comments_method'))->row()->value == 'facebook') {
                                                                echo 'selected';
                                                            } ?>>Facebook</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">/</label>
                        <div class="col-sm-6">
                            <select class="form-control m-bot15" id="comments_approval" name="comments_approval">
                                <option value="0" <?php if ($this->db->get_where('config', array('title' => 'comments_approval'))->row()->value == '0') {
                                                        echo 'selected';
                                                    } ?>>Manual</option>
                                <option value="1" <?php if ($this->db->get_where('config', array('title' => 'comments_approval'))->row()->value == '1') {
                                                        echo 'selected';
                                                    } ?>>Automatico</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Nombre de Disqus</label>
                        <div class="col-sm-6">
                            <input type="text" name="disqus_short_name" class="form-control" value="<?php echo $this->db->get_where('config', array('title' => 'disqus_short_name'))->row()->value; ?>">
                            <small><a href="https://disqus.com/admin/create/" target="_blank">Crear Nuevo</a> O <a href="https://disqus.com/admin/settings/general/" target="_blank">Encontrar</a></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Id De Comentarios Facebook</label>
                        <div class="col-sm-6">
                            <input type="text" name="facebook_comment_appid" class="form-control" value="<?php echo $this->db->get_where('config', array('title' => 'facebook_comment_appid'))->row()->value; ?>">
                        </div>
                    </div>
                    <div class="col-sm-offset-3 col-sm-9 m-t-15">
                        <button type="submit" class="btn btn-sm btn-primary"><span class="btn-label"><i class="fa fa-floppy-o"></i></span>Guardar </button>
                    </div>
                    </form>
                </div>
                <!--end panel body -->
            </div>
            <!--end panel -->
        </div>
        <!--end col-6 -->
    </div>
</div>
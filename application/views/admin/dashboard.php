<div class="row">
  <div class="col-md-3">
    <div class="widget-small primary"><i class="icon fa fa-video-camera fa-3x"></i>
      <div class="info">
        <h4>Peliculas</h4>
        <p><b class="counter"><?php echo $this->db->get_where('videos', array('publication' => '1', 'is_tvseries' => '0'))->num_rows(); ?></b></p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="widget-small info"><i class="icon fa fa-video-camera fa-3x"></i>
      <div class="info">
        <h4>Series</h4>
        <p><b class="counter"><?php echo $this->db->get_where('videos', array('publication' => '1', 'is_tvseries' => '1'))->num_rows(); ?></b></p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
   
  </div>
  <div class="col-md-3">
    <div class="widget-small danger"><i class="icon fa fa-star fa-3x"></i>
      <div class="info">
        <h4>Estrellas</h4>
        <p><b class="counter"><?php echo $this->db->get('star')->num_rows(); ?></b></p>
      </div>
    </div>
  </div>
</div>

<div class="row">
  
  <div class="col-md-3">
    <div class="widget-small info coloured-icon"><i class="icon fa fa-file-text-o fa-3x"></i>
      <div class="info">
        <h4>Paginas</h4>
        <p><b class="counter"><?php echo $this->db->get_where('page', array('publication' => '1'))->num_rows(); ?></b></p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="widget-small warning coloured-icon"><i class="icon fa fa-pencil-square-o fa-3x"></i>
      <div class="info">
        <h4>Post</h4>
        <p><b class="counter"><?php echo $this->db->get_where('posts', array('publication' => '1'))->num_rows(); ?></b></p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="widget-small danger coloured-icon"><i class="icon fa fa-users fa-3x"></i>
      <div class="info">
        <h4>Usuarios Registrados</h4>
        <p><b class="counter"><?php echo $this->db->get('user')->num_rows(); ?></b></p>
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-border panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Comentarios Recientes</h3>
        </div>
        <div class="panel-body">
          <table id="datatable-fixed-header" class="table table-striped table-bordered success">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Video</th>
                <th>Comentarios</th>
                <th>Comentado por</th>
              </tr>
            </thead>
            <tbody>
              <?php


              $this->db->LIMIT('5');
              $this->db->order_by('comment_at', 'desc');
              $comments = $this->db->get('comments')->result_array();
              foreach ($comments as $comment) : ?>
                <tr>
                  <td><?php echo $this->common_model->get_name_by_id($comment['user_id']); ?></td>
                  <td><?php echo $this->common_model->get_video_title_by_id($comment['video_id']); ?></td>
                  <td><?php echo $comment['comment']; ?></td>
                  <td><?php echo $comment['comment_at']; ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="panel panel-border panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Videos populares</h3>
        </div>
        <div class="panel-body">
          <table id="datatable-fixed-header" class="table table-striped table-bordered success">
            <thead>
              <tr>
                <th>Titulo</th>
                <th>Año</th>
                <th>Vistas Totales</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $this->db->LIMIT('5');
              $this->db->order_by('total_view', 'desc');
              $videos = $this->db->get('videos')->result_array();
              foreach ($videos as $video) : ?>
                <tr>
                  <td><a href="<?php echo base_url() . 'watch/' . $video['slug']  ?>" target="_blank"><?php echo $video['title']; ?></a></td>
                  <td><a href="<?php echo base_url() . 'watch/' . $video['slug'] ; ?>" target="_blank"><?php echo $video['release']; ?></a></td>
                  <td><a href="<?php echo base_url() . 'watch/' . $video['slug'] ; ?>" target="_blank"><?php echo $video['total_view']; ?></a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="panel panel-border panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Top Videos</h3>
        </div>
        <div class="panel-body">
          <table id="datatable-fixed-header" class="table table-striped table-bordered success">
            <thead>
              <tr>
                <th>Titulo</th>
                <th>Año</th>
                <th>Total de Vistos</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $this->db->LIMIT('5');
              $this->db->order_by('total_rating', 'desc');
              $videos = $this->db->get('videos')->result_array();
              foreach ($videos as $video) : ?>
                <tr>
                  <td><a href="<?php echo base_url() . 'watch/' . $video['slug'] ; ?>" target="_blank"><?php echo $video['title']; ?></a></td>
                  <td><a href="<?php echo base_url() . 'watch/' . $video['slug'] ; ?>" target="_blank"><?php echo $video['release']; ?></a></td>
                  <td><a href="<?php echo base_url() . 'watch/' . $video['slug'] ; ?>" target="_blank"><?php echo $video['total_rating']; ?></a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6">
      <div class="panel panel-border panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Posteos Recientes</h3>
        </div>
        <div class="panel-body">
          <table id="datatable-fixed-header" class="table table-striped table-bordered success">
            <thead>
              <tr>
                <th>Titulo</th>
                <th>Posteado por</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $this->db->LIMIT('5');
              $this->db->order_by('posts_id', 'desc');
              $posts = $this->db->get('posts')->result_array();
              foreach ($posts as $post) : ?>
                <tr>
                  <td><?php echo substr($post['post_title'], 0, 45) . '..'; ?></td>
                  <td><?php echo $post['post_at']; ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="panel panel-border panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Suscrito Recientemente</h3>
        </div>
        <div class="panel-body">
          <table id="datatable-fixed-header" class="table table-striped table-bordered success">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Suscribido</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $this->db->LIMIT('5');
              $this->db->order_by('user_id', 'desc');
              $subscribers = $this->db->get('user')->result_array();
              foreach ($subscribers as $subscriber) : ?>
                <tr>
                  <td><?php echo $subscriber['name']; ?></td>
                  <td><?php echo $subscriber['email']; ?></td>
                  <td><?php echo $subscriber['join_date']; ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div>

    <script src="<?php echo base_url(); ?>assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/counterup/jquery.counterup.min.js"></script>
    <script type="text/javascript">
      jQuery(document).ready(function($) {
        $('.counter').counterUp({
          delay: 10,
          time: 1000
        });
      });
    </script>
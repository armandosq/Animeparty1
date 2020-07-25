

<?php $theme_dir                      =   'theme/default/'; ?>
<?php if($this->common_model->get_ads_status('home_header')=='1'): ?>
<!-- header ads -->
<div id="ads" style="padding: 20px 0px;text-align: center;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <?php echo $this->common_model->get_ads('home_header'); ?>
            </div>
        </div>
    </div>
</div>
<!-- header ads -->
<?php endif; ?>
<?php 
    $live_tv_publish    =   $this->db->get_where('config' , array('title' =>'live_tv_publish'))->row()->value;
    if($this->live_tv_model->get_featured_tv_status() && $live_tv_publish =='1'):
?>
<!-- live tv section -->

       
<?php endif; ?>


<div id="section-opt">
    <div class="container">
        <div class="movies-list-wrap mlw-latestmovie">
            <div class="ml-title">
                <span class="pull-left title">Peliculas</span>
                <a href="<?php echo base_url(); ?>movies" class="pull-right cat-more">Ver Mas »</a>
                <ul role="tablist" class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" role="tab" href="#hot" aria-expanded="true">Populares</a></li>
                    <li><a data-toggle="tab" role="tab" href="#top-weekly" aria-expanded="false">Top de Vistos</a></li>
                    <li class=""><a data-toggle="tab" role="tab" href="#top-rating" aria-expanded="false">Mas Votados </a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="tab-content">
                <!-- hot -->
                <div id="hot" class="movies-list movies-list-full tab-pane fade active in">
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php $hot_videos = $this->common_model->get_hot_videos(); ?>
                            <?php foreach ($hot_videos as $videos) :?>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <?php include('thumbnail.php'); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>


                <!-- top-today -->
                <div id="top-today" class="movies-list movies-list-full tab-pane fade in">
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php $top_today = $this->common_model->get_today_hot_videos(); ?>
                            <?php foreach ($top_today as $videos) :?>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <?php include('thumbnail.php'); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- top-weekly -->
                <div id="top-weekly" class="movies-list movies-list-full tab-pane fade in">
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php $top_rated_videos = $this->common_model->get_weekly_hot_videos(); ?>
                            <?php foreach ($top_rated_videos as $videos) :?>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <?php include('thumbnail.php'); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>


                <!-- top-rated -->
                <div id="top-rating" class="movies-list movies-list-full tab-pane fade in">
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php $top_rated_videos = $this->common_model->get_top_rated_videos(); ?>
                            <?php foreach ($top_rated_videos as $videos) :?>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <?php include('thumbnail.php'); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<div id="section-opt">
    <div class="container">
        <div class="movies-list-wrap mlw-latestmovie">
            <div class="ml-title m-b-10">
                <span class="pull-left title">Peliculas Agregadas Recientemente</span>
                <a href="<?php echo base_url('movies') ?>" class="pull-right cat-more">Ver Mas »</a>
                <ul role="tablist" class="nav nav-tabs">
                    
                    <li class="active">
                        <a data-toggle="tab" role="tab" href="#latest-all" aria-expanded="true">Todos</a>
                    </li>
                    <?php
                        $featured_genres = $this->common_model->get_features_genres(6);
                        foreach ($featured_genres as $genre) :
                    ?>
                    <li class="">
                        <a data-toggle="tab" role="tab" href="#<?php echo $genre['slug']; ?>" aria-expanded="false"><?php echo $genre['name'] ?></a>
                    </li>
                <?php endforeach; ?>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="tab-content">
                <div id="latest-all" class="movies-list movies-list-full tab-pane fade active in">
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php
                                $latest_published_videos = $this->common_model->latest_published_videos();
                                foreach ($latest_published_videos as $videos) :
                            ?>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <?php include('thumbnail.php'); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <?php
                    $featured_genres = $this->common_model->get_features_genres(6);
                    foreach ($featured_genres as $genre) :
                ?>
                <div id="<?php echo $genre['slug']; ?>" class="movies-list movies-list-full tab-pane fade">
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php
                                $genre_videos = $this->genre_model->get_video_by_genre_id($genre['genre_id']);
                                foreach ($genre_videos as $videos) :
                            ?>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <?php include('thumbnail.php'); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


<?php 
  $tv_series_publish          = $this->db->get_where('config',array('title'=>'tv_series_publish'))->row()->value;
  if($tv_series_publish =='1'):
?>

<div id="section-opt">
    <div class="container">
        <div class="movies-list-wrap mlw-latestmovie">
            <div class="ml-title">
                <span class="pull-left title">Puede Gustarte</span>
                <a href="<?php echo base_url(); ?>tv-series" class="pull-right cat-more">Ver Mas »</a>
                <ul role="tablist" class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" role="tab" href="#hot-tvseries" aria-expanded="true">Populares</a></li>
                    <li><a data-toggle="tab" role="tab" href="#top-weekly-tvseries" aria-expanded="false">Top Vistos</a></li>
                    <li class=""><a data-toggle="tab" role="tab" href="#top-rating-tvseries" aria-expanded="false">Mas Votados</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="tab-content">
                <!-- hot -->
                <div id="hot-tvseries" class="movies-list movies-list-full tab-pane fade active in">
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php $hot_videos = $this->common_model->get_hot_tvseries(); ?>
                            <?php foreach ($hot_videos as $videos) :?>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <?php include('thumbnail.php'); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>


                <!-- top-today -->
                <div id="top-today-tvseries" class="movies-list movies-list-full tab-pane fade in">
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php $top_today = $this->common_model->get_today_hot_tvseries(); ?>
                            <?php foreach ($top_today as $videos) :?>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <?php include('thumbnail.php'); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- top-today -->
                <div id="top-weekly-tvseries" class="movies-list movies-list-full tab-pane fade in">
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php $top_rated_videos = $this->common_model->get_weekly_hot_tvseries(); ?>
                            <?php foreach ($top_rated_videos as $videos) :?>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <?php include('thumbnail.php'); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>


                <!-- top-today -->
                <div id="top-rating-tvseries" class="movies-list movies-list-full tab-pane fade in">
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php $top_rated_videos = $this->common_model->get_top_rated_tvseries(); ?>
                            <?php foreach ($top_rated_videos as $videos) :?>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <?php include('thumbnail.php'); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>


<div id="section-opt">
    <div class="container">
        <div class="movies-list-wrap mlw-latestmovie">
            <div class="ml-title">
                <span class="pull-left title">Emision</span>
               
                <ul role="tablist" class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" role="tab" href="#lunes" aria-expanded="true">Lunes</a></li>
                    <li class=""><a data-toggle="tab" role="tab" href="#martes" aria-expanded="false">Martes</a></li>
                    <li><a data-toggle="tab" role="tab" href="#miercoles" aria-expanded="false">Miercoles</a></li>
                    <li class=""><a data-toggle="tab" role="tab" href="#jueves" aria-expanded="false">Jueves</a></li>
                      <li><a data-toggle="tab" role="tab" href="#viernes" aria-expanded="false">Viernes</a></li>
                    <li class=""><a data-toggle="tab" role="tab" href="#sabado" aria-expanded="false">Sabado</a></li>
                      <li><a data-toggle="tab" role="tab" href="#domingo" aria-expanded="false">Domingo</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="tab-content">
                <!-- hot -->
                <div id="lunes" class="movies-list movies-list-full tab-pane fade active in">
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php $latest_published_imd_Lunes = $this->common_model->latest_published_imd_Lunes(); ?>
                            <?php foreach ($latest_published_imd_Lunes as $videos) :?>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <?php include('thumbnail.php'); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>


                <!-- top-today -->
                <div id="martes" class="movies-list movies-list-full tab-pane fade in">
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php $latest_published_imd_Martes = $this->common_model->latest_published_imd_Martes(12); ?>
                            <?php foreach ($latest_published_imd_Martes as $videos) :?>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <?php include('thumbnail.php'); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- top-today -->
                <div id="miercoles" class="movies-list movies-list-full tab-pane fade in">
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php $latest_published_imd_Miercoles = $this->common_model->latest_published_imd_Miercoles(12); ?>
                            <?php foreach ($latest_published_imd_Miercoles as $videos) :?>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <?php include('thumbnail.php'); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>


                <!-- top-today -->
                <div id="jueves" class="movies-list movies-list-full tab-pane fade in">
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php $latest_published_imd_Jueves = $this->common_model->latest_published_imd_Jueves(12); ?>
                            <?php foreach ($latest_published_imd_Jueves as $videos) :?>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <?php include('thumbnail.php'); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                 <div id="viernes" class="movies-list movies-list-full tab-pane fade in">
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php $latest_published_imd_Viernes = $this->common_model->latest_published_imd_Viernes(12); ?>
                            <?php foreach ($latest_published_imd_Viernes as $videos) :?>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <?php include('thumbnail.php'); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>


                 <div id="sabado" class="movies-list movies-list-full tab-pane fade in">
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php $latest_published_imd_Sabados = $this->common_model->latest_published_imd_Sabados(12); ?>
                            <?php foreach ($latest_published_imd_Sabados as $videos) :?>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <?php include('thumbnail.php'); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div id="domingo" class="movies-list movies-list-full tab-pane fade in">
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php $latest_published_imd_Domingo = $this->common_model->latest_published_imd_Domingo(12); ?>
                            <?php foreach ($latest_published_imd_Domingo as $videos) :?>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <?php include('thumbnail.php'); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="section-opt">
    <div class="container">
        <div class="movies-list-wrap mlw-latestmovie">
            <div class="ml-title m-b-10">
                <span class="pull-left title">Animes Recientemente Agregados</span>
                <a href="<?php echo base_url('tv-series') ?>" class="pull-right cat-more">Ver Mas »</a>
                <ul role="tablist" class="nav nav-tabs">
                    
                    <li class="active">
                        <a data-toggle="tab" role="tab" href="#latest-all-tvseries" aria-expanded="true">Todos</a>
                    </li>
                    <?php
                        $featured_genres = $this->common_model->get_features_genres(6);
                        foreach ($featured_genres as $genre) :
                    ?>
                    <li class="">
                        <a data-toggle="tab" role="tab" href="#<?php echo $genre['slug']; ?>-tvseries" aria-expanded="false"><?php echo $genre['name'] ?></a>
                    </li>
                <?php endforeach; ?>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="tab-content">
                <div id="latest-all-tvseries" class="movies-list movies-list-full tab-pane fade active in">
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php
                                $latest_published_videos = $this->common_model->latest_published_tv_series();
                                foreach ($latest_published_videos as $videos) :
                            ?>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <?php include('thumbnail.php'); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <?php
                    $featured_genres = $this->common_model->get_features_genres(6);
                    foreach ($featured_genres as $genre) :
                ?>
                <div id="<?php echo $genre['slug']; ?>-tvseries" class="movies-list movies-list-full tab-pane fade">
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php
                                $genre_videos = $this->genre_model->get_tvseries_by_genre_id($genre['genre_id']);
                                foreach ($genre_videos as $videos) :
                            ?>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <?php include('thumbnail.php'); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

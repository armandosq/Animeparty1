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

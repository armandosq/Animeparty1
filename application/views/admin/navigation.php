<?php $active_menu = $this->session->userdata('active_menu'); ?>
<!-- Side-Nav-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item <?php if ($active_menu == 1) { echo " active "; } ?>" href="<?php echo base_url() . "admin/dashboard "; ?>">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Menu</span>
            </a>
        </li>
        <li class="treeview <?php if ($active_menu == 6 || $active_menu == 8 || $active_menu == 9) { echo " is-expanded "; } ?>">
            <a href="#" class="app-menu__item" data-toggle="treeview">
                <i class="app-menu__icon fa fa-video-camera" aria-hidden="true"></i>
                <span class="app-menu__label">Peliculas // Video </span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item <?php if ($active_menu == 6) {  echo " active "; } ?>" href="<?php echo base_url() . 'admin/videos_add/' ?>">
                        <i class="app-menu__icon fa fa-plus"></i>
                        Nuevo</span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 8) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/videos/' ?>">
                        <i class="app-menu__icon fa fa-list"></i>
                        Todas las Peliculas</span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 9) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/video_type/' ?>">
                        <i class="app-menu__icon fa fa-tags"></i>
                        Tipo de video </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview <?php if ($active_menu == 28 || $active_menu == 29 || $active_menu == 30) { echo " is-expanded "; } ?>">
            <a href="#" class="app-menu__item" data-toggle="treeview">
                <i class="app-menu__icon fa fa-film" aria-hidden="true"></i>
                <span class="app-menu__label">Animes</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item <?php if ($active_menu == 29) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/tvseries_add/' ?>">
                        <i class="app-menu__icon fa fa-plus" aria-hidden="true"></i>
                       Nuevo</span>
                    </a>
                </li>
                <li><a class="treeview-item <?php if ($active_menu == 30) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/tvseries/' ?>">
                        <i class="app-menu__icon fa fa-list" aria-hidden="true"></i>
                        Todos Los Animes </span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 28) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/tv_series_setting/' ?>">
                        <i class="app-menu__icon fa fa-gear" aria-hidden="true"></i>
                        Configuracion</span>
                    </a>
                </li>
            </ul>
        </li>
        
            <a class="app-menu__item <?php if ($active_menu == 3) { echo " active "; } ?>" href="<?php echo base_url(); ?>admin/genre">
                <i class="app-menu__icon fa fa-archive"></i>
                <span class="app-menu__label">Genero</span>
            </a>
        </li>
        <li class="treeview <?php if ($active_menu == 4 || $active_menu == 5) { echo " is-expanded "; } ?>">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-stack-overflow"></i>
                <span class="app-menu__label">Slider</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item <?php if ($active_menu == 4) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/slider/' ?>">
                        <i class="app-menu__icon fa fa-stack-overflow"></i>
                        Imagen Del Slider</span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 5) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/slider_setting/' ?>">
                        <i class="app-menu__icon fa fa-gears" aria-hidden="true"></i>
                       Configuracion</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview <?php if ($active_menu == 31 || $active_menu == 32 || $active_menu == 33) { echo " is-expanded "; } ?>">
            <a href="#" class="app-menu__item" data-toggle="treeview"><i class="app-menu__icon fa fa-comment"></i>
                <span class="app-menu__label">Comentarios</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item <?php if ($active_menu == 31) {
                        echo " active ";
                    } ?>" href="<?php echo base_url() . 'admin/comments/' ?>"><i
                                class="app-menu__icon fa fa-comments"></i>Comentarios de Peliculas o Animes</span>
                    </a>
                </li>
                <li>
                    
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 32) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/comments_setting/' ?>">
                        <i class="app-menu__icon fa fa-gears"></i>
                        Configuracion</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <li>
            <a class="app-menu__item <?php if ($active_menu == 15) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/manage_user' ?>">
                <i class="app-menu__icon fa fa-user"></i>
                <span class="app-menu__label">Usuarios</span>
            </a>
        </li>
        <li class="treeview <?php if ($active_menu == 16 || $active_menu == 17 || $active_menu == 18 || $active_menu == 19 || $active_menu == 20 || $active_menu == 21 || $active_menu == 22 || $active_menu == 24 || $active_menu == 34 || $active_menu == 350 || $active_menu == 78 || $active_menu == 79 || $active_menu == 80 || $active_menu == 160 || $active_menu == 161 || $active_menu == 162 || $active_menu == 40) {echo " is-expanded "; } ?>">
            <a href="#" class="app-menu__item" data-toggle="treeview">
                <i class="app-menu__icon fa fa-gears" aria-hidden="true"></i>
                <span class="app-menu__label">Configuracion</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item <?php if ($active_menu == 160) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/system_setting/' ?>">
                        <i class="app-menu__icon fa fa-gear" aria-hidden="true"></i>
                       Configuracion del Sistema</span>
                    </a>
                </li>
                
                
                <li>
                    <a class="treeview-item <?php if ($active_menu == 17) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/email_setting/' ?>">
                        <i class="app-menu__icon fa fa-envelope" aria-hidden="true"></i>
                        Email</span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 18) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/logo_setting/' ?>">
                        <i class="app-menu__icon fa fa-picture-o"  aria-hidden="true"></i>
                       Logos</span>
                    </a>
                </li>
                
                
                <li>
                    <a class="treeview-item <?php if ($active_menu == 21) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/ad_setting/' ?>">
                        <i class="app-menu__icon fa fa-dollar" aria-hidden="true"></i>
                        ADS</span>
                    </a>
                </li>
                
                <li>
                    <a class="treeview-item <?php if ($active_menu == 22) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/social_login_setting/' ?>">
                        <i class="app-menu__icon fa fa-dollar" aria-hidden="true"></i>
                       Social Login</span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 24) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/video_quality/' ?>">
                        <i class="app-menu__icon fa fa-signal" aria-hidden="true"></i>
                        Calidades </span>
                    </a>
                </li>
               
                <li>
                    <a class="treeview-item <?php if ($active_menu == 161) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/update/' ?>">
                        <i class="app-menu__icon fa fa-upload" aria-hidden="true"></i>
                       Actualizar</span>
                    </a>
                </li>
            </ul>
        </li>
       
        
        <li>
            <a class="app-menu__item <?php if ($active_menu == 23) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/backup_restore' ?>">
                <i class="app-menu__icon fa fa-database"></i>
                <span class="app-menu__label">BACKUP</span>
            </a>
        </li>
        
    </ul>
</aside>
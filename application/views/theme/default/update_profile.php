<?php 
$success_msg    =   $this->session->flashdata('success');
$error_msg      =   $this->session->flashdata('error');  
?>

<!-- Breadcrumb -->
<div id="title-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="page-title">
                    <h1 class="text-uppercase">
                        Informacion del Perfil
                    </h1>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 text-right">
                <ul class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url();?>"><i class="fi ion-ios-home"></i>Inicio</a>
                    </li>
                    <li class="active">Actualizar Perfil</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->


<!-- Profile Section -->
<div id="section-opt">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="profiles-wrap">
                    <div class="sidebar col-md-3 col-sm-3">
                        <div class="sidebar-menu">
                            <div class="sb-title"><i class="fa fa-navicon mr5"></i>Menu</div>
                            <ul>
                                <li class="">
                                    <a href="<?php echo base_url('my-account/profile'); ?>">
                                        <i class="fi ion-ios-person-outline m-r-10"></i> Perfil
                                    </a>
                                </li>
                                
                                <li class="">
                                    <a href="<?php echo base_url('my-account/favorite'); ?>">
                                        <i class="fi ion-ios-heart-outline m-r-10"></i>Favoritos
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?php echo base_url('my-account/watch-later'); ?>">
                                        <i class="fi ion-ios-clock-outline m-r-10"></i>Ver Despues
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="<?php echo base_url('my-account/update'); ?>">
                                        <i class="fi ion-edit m-r-10"></i>Actualizar Perfil
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?php echo base_url('my-account/change-password'); ?>">
                                        <i class="fi ion-key m-r-10"></i> Cambiar Contraseña
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="pp-main col-md-9 col-sm-9">
                        <div class="ppm-head">
                            <div class="ppmh-title"><i class="fa fa-user mr5"></i>Actualizar Perfil</div>
                        </div>
                        <div class="ppm-content update-content">
                            <div class="uc-form">
                                <form id="profile-form" action="<?php echo base_url().'user/profile/update'; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">

                                <?php 
                                    if($success_msg !=''){
                                    echo '<div class="alert alert-success">'.$success_msg.'.</div>';
                                    }
                                    if($error_msg !=''){
                                    echo '<div class="alert alert-danger">'.$error_msg.'.</div>';
                                    }
                                ?> 
                                    <div class="form-group">
                                        <label for="avatar" class="col-sm-4 control-label">Avatar</label>

                                        <div class="col-sm-8">
                                            <div class="block avatar mb10">
                                                <img class="img img-circle m-b-10" width="180" alt="Abdul Mannan" src="<?php echo $this->common_model->get_img('user', $profile_info->user_id).'?'.time(); ?>">
                                            </div>
                                            <input name="photo" type="file" id="avatar">

                                            <p class="help-block small">Limite de 2Mb</p>
                                            
                                            <span id="error-avatar" class="help-block error-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-4 control-label">Nombre Completo</label>

                                        <div class="col-sm-8">
                                            <input name="name" type="text" class="form-control" id="full_name" value="<?php echo $profile_info->name; ?>">

                                            <span id="error-full_name" class="help-block error-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-4 control-label">Email</label>

                                        <div class="col-sm-8">
                                            <input readonly="" type="email" class="form-control" id="email" value="<?php echo $profile_info->email; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-4 control-label">Telefono</label>

                                        <div class="col-sm-8">
                                            <input name="phone" type="text" class="form-control" id="phone" value="<?php echo $profile_info->phone; ?>">

                                            <span id="error-phone" class="help-block error-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-4 control-label">Cumpleaños</label>

                                        <div class="col-sm-8">
                                            <input name="dob" type="text" class="form-control" id="dob" value="<?php echo date("Y-m-d",strtotime($profile_info->dob)); ?>">

                                            <span id="error-dob" class="help-block error-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="gender" class="col-sm-4 control-label">Genero</label>

                                        <div class="col-sm-3">
                                            <select name="gender" class="form-control" id="gender">
                                            <option value="1" <?php if($profile_info->gender =='1'){echo 'selected';}  ?>>Masculino</option>
                                            <option value="2" <?php if($profile_info->gender =='2'){echo 'selected';}  ?>>Femenino</option>
                                            <option value="0" <?php if($profile_info->gender =='0'){echo 'selected';}  ?>>Alien XD</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="col-sm-4 control-label"></label>

                                        <div class="col-sm-2">
                                            <button type="submit" value="submit" class="btn btn-success btn-sm m-t-20"> <span class="btn-label"><i class="fa fa-floppy-o"></i></span>Guardar </button>
                                            <div style="display: none;" id="submit-loading" class="cssload-center">
                                                <div class="cssload"><span></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!--
                        <div class="ppm-content user-content">
                            <div class="uct-avatar">
                                <img src="<?php echo $this->common_model->get_img('user', $profile_info->user_id).'?'.time(); ?>" title="<?php echo $profile_info->name; ?>" alt="<?php echo $profile_info->name; ?>">
                            </div>
                            <div class="uct-info">
                                <div class="block">
                                    <label>Full name:</label> <?php echo $profile_info->name; ?></div>
                                <div class="block">
                                    <label>Username:</label> <?php echo $profile_info->username; ?> </div>
                                <div class="block">
                                    <label>Account ID:</label> <?php echo $profile_info->user_id; ?> </div>
                                <div class="block">
                                    <label>Email:</label> <?php echo $profile_info->email; ?> </div>
                                <div class="block">
                                    <label>Join date:</label> <?php echo date('d M Y',strtotime($profile_info->join_date)); ?></div>
                                <div class="block">
                                    <label>Last login:</label> <?php echo date('Y-m-d H:i:s',strtotime($profile_info->last_login)); ?> </div>
                                <div class="mt20">
                                    <a href="<?php echo base_url('user/update_profile'); ?>" class="btn btn-success" title="">Edit
                                    account info</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>-->
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Profile Section -->


<script src="<?php echo base_url() ?>assets/theme/default/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
    jQuery(document).ready(function() {
        $('#dob').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });
    });
</script>
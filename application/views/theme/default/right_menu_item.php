<?php
  $registration_enable            =   ovoo_config('registration_enable');    
  $frontend_login_enable          =   ovoo_config('frontend_login_enable');
?>

<ul class="nav navbar-nav navbar-right">

<?php if($this->session->userdata('login_status') == 1):?>
  <li class="dropdown"> <a href="#" class="dropdown-toggle"
   style="
    background-color: #232323;
" data-toggle="dropdown"><img class="img img-circle" src="<?php echo $this->common_model->get_img('user', $this->session->userdata('user_id'));?>" height="20" style="
    width: 75px;
    height: 75px;
 
"> </a>

      <ul class="dropdown-menu" role="menu">
      <?php 
          if($this->session->userdata('admin_is_login') == 1):
              echo '<li><a href="'.base_url().'admin"><i class="fi ion-ios-speedometer-outline m-r-10"></i>'.trans('control_panel').'</a></li>';
          endif; 
      ?>
      <li><a href="<?php echo base_url('my-account/profile'); ?>"><i class="fi ion-ios-person-outline m-r-10"></i>Perfil</a></li>

      <li><a href="<?php echo base_url('my-account/favorite'); ?>"><i class="fi ion-ios-heart-outline m-r-10"></i>Favoritos</a></li>
      <li><a href="<?php echo base_url('my-account/watch-later'); ?>"><i class="fi ion-ios-clock-outline m-r-10"></i>Lista de Deseos</a></li>
      <li><a href="<?php echo base_url('my-account/update'); ?>"><i class="fi ion-edit m-r-10"></i>Actualizar Perfil</a></li>
      <li><a href="<?php echo base_url('my-account/change-password'); ?>"><i class="fi ion-key m-r-10"></i>Cambiar Contraseña</a></li>
      <li><a href="<?php echo base_url('login/logout'); ?>"><i class="fi ion-log-out m-r-10"></i>Salir</a></li>
      </ul>
  </li>
<?php else: ?>
  <?php if($frontend_login_enable =='1'): ?>
    <li class="hidden-xs-down"><a href="<?php echo base_url('user/login'); ?>">Iniciar</a></li>
  <?php endif; ?>
  <?php if($registration_enable =='1'): ?>
    <li class="hidden-xs-down"><a href="<?php echo base_url('user/login'); ?>">Crear Cuenta</a></li>
  <?php endif; ?>
<?php endif; ?>          

</ul>


  
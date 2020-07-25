<?php if($this->common_model->get_ads_status('tv_header')=='1'): ?>
<!-- header ads -->
<div id="ads" style="padding: 20px 0px;text-align: center;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <?php echo $this->common_model->get_ads('tv_header'); ?>
            </div>
        </div>
    </div>
</div>
<!-- header ads -->
<?php endif; ?>
<!-- Breadcrumb -->
<div id="title-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="page-title">
                    <h1 class="text-uppercase"><span>Series Anime</span></h1>
                </div>
            </div>
            <div class="col-md-6 col-sm-6col-xs-12 text-right">
                <ul class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url();?>"><i class="fi ion-ios-home"></i><?php echo trans('home'); ?></a>
                    </li>
                    <li><a href="<?php echo base_url('tv-series');?>"></a><?php echo trans('tv_series'); ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
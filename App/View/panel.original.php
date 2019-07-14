
<div class="hero-thumbnail equalize bg-img" style="background-image: url(<?php $this->asset('img/tes.jpg') ?>); height: 32vh!important;"></div>
<div class="container">
    <div class="row">
    <!-- item -->
    <?php 
        
        foreach($this->acciones as $accion)
        {
            
            if( $this->usuario->can(($accion->clave)))
            {
    ?>
    
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 box-wrapper">
            <div class="box-part text-center">    
                <i class="fa fa-instagram fa-3x" aria-hidden="true"></i>
                <div class="title">
                    <h4> <?= $accion->nombre ?></h4>
                </div>
                <div class="text">
                    <span><?= $accion->descripcion ?></span>
                </div>
                <a href="<?= '../'.$accion->action ?>">Haz click aqui para <?=$accion->nombre ?>  </a>
            </div>
        </div>	
    <?php } }?>
    <!-- /item -->
    </div>
</div>

<style>
.box-wrapper 
{
  z-index:99!important;
  padding:50px!important;
  
}
.container{
    background-color:white!important;
}
</style>
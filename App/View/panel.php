
<div class="hero-thumbnail equalize bg-img" style="background-image: url(<?php $this->asset('img/tes.jpg') ?>); height: 32vh!important;"></div>
<div class="container">
<div class="row box-wrapper ">
    
    <?php 
    if(count($this->grupos))
    {
    foreach($this->grupos as $k => $grupo)
        {
            
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6">
<div class="image-flip" ontouchstart="this.classList.toggle('hover');">
    <div class="mainflip">

        <div class="frontside">
            <div class="card">
                <div class="card-body text-center">
                    <p><img class=" img-fluid" src="https://sunlimetech.com/portfolio/boot4menu/assets/imgs/team/img_01.png" alt="card image"></p>
                    <h4 class="card-title"><?= $grupo->nombre ?></h4>
                    <p class="card-text"><?= $grupo->descripcion ?></p>
                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="backside">
            <div class="card">
                <div class="card-body text-center mt-4">
                    <h4 class="card-title"></h4>
                        <p class="card-text">Usted esta habilitado para: </p>
                    <div class="row">
                    <?php
                        foreach(array_unique($grupo->acciones(),SORT_REGULAR) as $k => $accion)
                        {
                    ?>
                    <div class="col-md-4">
                    <div><?= $accion->nombre ?></div>
                    
                    <a class="iconxxx"  href="<?='../'.$accion->action?>">
                        <span><i class="<?= ($accion->icon) ? $accion->icon : 'fa fa-address-book' ?>"></i></span>
                    </a>
                    </div>
                    <?php } ?>
                    </div>
                    
                    <ul class="list-inline">
                        <li class="list-inline-item">
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

    <?php 
        
        }}else {
            {
        ?>
        <div class="card-body text-center mt-4">
            <p class="center">no tienes grupos asignados aun</p>        
        </div>
    
    <?php 
        }}
    ?>
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

.btn-primary:hover,
.btn-primary:focus {
    background-color: #108d6f;
    border-color: #108d6f;
    box-shadow: none;
    outline: none;
}

.btn-primary {
    color: #fff;
    background-color: #007b5e;
    border-color: #007b5e;
}

section {
    padding: 60px 0;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}

#team .card {
    border: none;
    background: #ffffff;
}

.image-flip:hover .backside,
.image-flip.hover .backside {
    -webkit-transform: rotateY(0deg);
    -moz-transform: rotateY(0deg);
    -o-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    transform: rotateY(0deg);
    border-radius: .25rem;
}

.image-flip:hover .frontside,
.image-flip.hover .frontside {
    -webkit-transform: rotateY(180deg);
    -moz-transform: rotateY(180deg);
    -o-transform: rotateY(180deg);
    transform: rotateY(180deg);
}
.iconxxx{
    min-width:50px!important;
    min-height:50px!important;
    color:orange!important;
}
.mainflip {
    -webkit-transition: 1s;
    -webkit-transform-style: preserve-3d;
    -ms-transition: 1s;
    -moz-transition: 1s;
    -moz-transform: perspective(1000px);
    -moz-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    transition: 1s;
    transform-style: preserve-3d;
    position: relative;
}

.frontside {
    position: relative;
    -webkit-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    z-index: 2;
    margin-bottom: 30px;
}

.backside {
    position: absolute;
    top: 0;
    left: 0;
    background: white;
    -webkit-transform: rotateY(-180deg);
    -moz-transform: rotateY(-180deg);
    -o-transform: rotateY(-180deg);
    -ms-transform: rotateY(-180deg);
    transform: rotateY(-180deg);
    -webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
}

.frontside,
.backside {
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    -ms-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transition: 1s;
    -webkit-transform-style: preserve-3d;
    -moz-transition: 1s;
    -moz-transform-style: preserve-3d;
    -o-transition: 1s;
    -o-transform-style: preserve-3d;
    -ms-transition: 1s;
    -ms-transform-style: preserve-3d;
    transition: 1s;
    transform-style: preserve-3d;
}

.frontside .card,
.backside .card {
    min-height: 312px;
}

.backside .card a {
    font-size: 18px;
    color: #007b5e !important;
}

.frontside .card .card-title,
.backside .card .card-title {
    color: #007b5e !important;
}

.frontside .card .card-body img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
}
</style>
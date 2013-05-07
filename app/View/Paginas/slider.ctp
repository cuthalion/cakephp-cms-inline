<div id="carousel" class="carousel slide">
  <!-- Carousel items -->
  <div class="carousel-inner">
<?php
$i=0;
foreach($conteudo['Slider'] as $value):
?>
    <div class="<?php if($i==0):?>active <?php endif;?>item">
        <?php echo $this->Html->image($authUser['id'].'/slider/'.$value['arquivo']);?>
        <?php if($value['titulo']!='' and $value['descricao']!=''): ?>
            <div class="container">
                <div class="carousel-caption">
                    <h1><?php echo $value['titulo'];?></h1>
                    <p class="lead"><?php echo $value['descricao'];?></p>
                    <?php /*<a class="btn btn-large btn-primary" href="#">Sign up today</a>*/ ?>
                </div>
            </div>
        <?php endif;?>
    </div>
<?php
$i++;
endforeach;
?>
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#carousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#carousel" data-slide="next">&rsaquo;</a>
</div>

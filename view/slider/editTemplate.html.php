<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $slider2 = sliderImageTableClass::NOMBRE ?>
<?php view::includePartial('usuario/menuPrincipal')?>
<div class="container container-fluid">
<div class="panel panel-primary">
  <div class="panel-heading">
    
      <h1 class="glyphicon glyphicon-user"> <?php echo i18n::__('editUser')?> <?php echo $objSlider[0]->$slider2 ?></h1>
  </div>

<?php view::includePartial('slider/formUser', array('objSlider' => $objSlider,'$slider2' => $slider2 )) ?>
</div>

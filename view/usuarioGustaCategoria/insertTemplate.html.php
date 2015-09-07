<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>

<?php view::includePartial('usuarioGustaCategoria/menuPrincipal')?>

<div class="container container-fluid">
<div class="panel panel-primary">
  <div class="panel-heading">
    
     <h1 class="glyphicon glyphicon-tasks"> <?php echo i18n::__('new_events_like_me')?> </h1>
  </div>
<?php view::includePartial('usuarioGustaCategoria/formUser', array('objusuarios' => $objusuarios, 'objcategoria' => $objcategoria)) ?>

</div>






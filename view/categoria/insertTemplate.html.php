<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php view::includePartial('categoria/menuPrincipal')?>

<div class="container container-fluid">
<div class="panel panel-primary">
  <div class="panel-heading">
    
      <h1 class="glyphicon glyphicon-cog"> <?php echo i18n::__('createCategory')?>
  </div>
    
<?php view::includePartial('categoria/formUser') ?>
</div>





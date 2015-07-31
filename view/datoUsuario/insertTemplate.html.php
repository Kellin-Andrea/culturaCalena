<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php view::includePartial('datoUsuario/menuPrincipal')?>

<div class="container container-fluid">
<div class="panel panel-primary">
  <div class="panel-heading">
    
      <h1 class="glyphicon glyphicon-log-in"> <?php echo i18n::__('new_user')?>
  </div>
    

<?php view::includePartial('datoUsuario/formUser', array('objlocal'=> $objlocal, 'objtipoDocumento'=> $objtipoDocumento, 'objorganizacion'=> $objorganizacion, 'objusuarios'=> $objusuarios)) ?>
</div>




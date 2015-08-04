<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $usgusca = usuarioGustaCategoriaTableClass::USUARIO_ID ?>
<?php $categoria = categoriaTableClass::ID ?>
<?php $usuario = usuarioTableClass::ID ?>
<?php view::includePartial('usuarioGustaCategoria/menuPrincipal')?>

<div class="container container-fluid">
<div class="panel panel-primary">
  <div class="panel-heading">
    
     <h1 class="glyphicon glyphicon-tasks"><?php echo i18n::__('edit_events_like_me')?> <?php echo $objusgusca[0]->$usgusca ?></</h1>
  </div>
<?php view::includePartial('usuarioGustaCategoria/formUser', array('objusgusca' => $objusgusca, 'usgusca' => $usgusca, 'objusuarios' => $objusuarios, 'usuario' => $usuario, 'objcategoria' => $objcategoria, 'categoria' => $categoria)) ?>

</div>


